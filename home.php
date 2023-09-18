<?php
include_once("config.php");
$project->bouncer();
include_once("header.php");
$uid = $project->uid;
$prow = $project->db->query("SELECT * FROM users WHERE uid='$uid' ");
$prow = $prow->fetch_assoc();
?>
<div class="main">

  <section class="module mb-5 pb-0">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="font-alt"><span class=" icon-profile-male"></span> Name: <?= $project->fullname ?></h6>
          <h6 class="font-alt"><span class="icon-envelope"></span> Email:<?= $project->email ?></h6>
          <?php if (isset($project->type)) : ?>
            <h6 class="font-alt"><span class="icon-toolbox"></span> Hospital Number: <?= $project->staff_no ?></h6>
            <h6 class="font-alt"><span class="icon-target"></span> Status:  <?= $project->status ?></h6>
          <?php endif; ?>
          <?php if($project->type == 1): ?>
          <a href="equipment_availabilty.php" class="patient_button btn btn-primary">Check Available Equipment</a>
          <?php endif;?>
          <?php if($project->type == 7 && $project->supervisor == 5): ?>
          <a href="allocate_spaces.php" class="patient_button btn btn-primary">Allocates Spaces To Department</a>
          <?php endif;?>
        </div>
        <?php if($project->type == 7 && $project->supervisor == 5): ?>
        <a href="create_spaces.php?uid=<?= $prow['uid']?>" class="spaces_button btn btn-primary">Create Spaces</a>
        <?php endif;?>
      </div>
    </div>
  </section>
  <section class="module mt-0 pt-0" style="min-height:60vh ;">
    <div class="container">
      <?php $project->get_alert(); ?>
      <?php if ($project->type == 1) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>View Assigned Spaces</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-11 offset-sm-1">
            <?php
            // $uid = $project->uid;
            $get_values_query = $project->db->query("SELECT * FROM spaces ");
            if ($get_values_query) { //Check If The Query Is Executed Successfully
              ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>Ward Number</th>
                  <th>Bed Ward By Ward</th>
                  <th>Departments</th>
                  <th>Date</th>
                  </thead>
                <tbody>
                  <?php while ($row = $get_values_query->fetch_assoc()) : ?>
                    <tr>
                      <td> <b>Ward</b> <?= $row['ward_number'] ?></td>
                      <td> <b><?= $row['bed_ward_by_ward'] ?></b> Bed's</td>
                      <td><b><?=$row['departments']?></b></td>
                      <td> <b><?= $row['date_created'] ?></b></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <?php
            }else{
              ?>
              <div class="alert alert-warning">No Ward Has Been Assigned!</div>
              <?php
            }
            ?>
          </div>
        </div>

      <?php elseif ($project->type == 7) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>Facilitator Administrator</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <?php
            $uid = $project->uid;
            $list = $project->db->query("SELECT * FROM spaces");
            if ($list->num_rows > 0) :
            ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>Ward Number</th>
                  <th>Bed Ward By Ward</th>
                  <th>Departments</th>
                  <th>Date</th>
                  <th>Action</th>
                  </thead>
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td> <b>Ward</b> <?= $row['ward_number'] ?></td>
                      <td> <b><?= $row['bed_ward_by_ward'] ?></b> Bed's</td>
                      <td><b><?=$row['departments']?></b></td>
                      <td> <b><?= $row['date_created'] ?></b></td>
                      <td>
                        <a href="update_spaces.php?sid=<?= $row['sid'] ?>" class="text-white badge bg-info badge-pills"><i class="fa fa-edit"></i></a>
                        <a href="delete_spaces.php?sid=<?= $row['sid'] ?>" class="text-white badge bg-danger badge-pills"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have Not Created Any Space</div>
            <?php endif; ?>

          </div>
        </div>
      <?php elseif ($project->type == 9) : ?>
        <?php 
        $users = $project->db->query("SELECT * FROM users");
        $users_num = $users->num_rows;
        $spaces = $project->db->query("SELECT * FROM spaces");
        $spaces_num = $spaces->num_rows;
        $available = $project->db->query("SELECT * FROM equipment_location");
        $available_num = $available->num_rows;
        $departments = $project->db->query("SELECT * FROM departments");
        $departments_num = $departments->num_rows;
        ?>
         <!-- Sale & Revenue Start -->
         <div class="container-fluid pt-4">
            <div class="row">
                <div class="col-sm-6 col-md-3 mt-2">
                    <div class="bg-white shadow mt-3 rounded text-center">
                        <i class="glyphicon glyphicon-user text-primary" style="font-size: 3em;"></i>
                        <div class="mt-3">
                            <p class="mb-2">Users</p>
                            <h6 class="mb-0"><?=$users_num?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-2">
                    <div class="bg-white shadow mt-3 rounded text-center">
                        <i class="glyphicon glyphicon-stats text-primary" style="font-size: 3em;"></i>
                        <div class="mt-3">
                            <p class="mb-2">Number Of Spaces Created</p>
                            <h6 class="mb-0"><?=$spaces_num?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-2">
                    <div class="bg-white shadow mt-3 rounded text-center">
                        <i class="glyphicon glyphicon-stats text-primary" style="font-size: 3em;"></i>
                        <div class="mt-3">
                            <p class="mb-2">Available Equipment</p>
                            <h6 class="mb-0"><?=$available_num?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-2">
                    <div class="bg-white shadow mt-3 rounded text-center">
                        <i class="glyphicon glyphicon-stats text-primary" style="font-size: 3em;"></i>
                        <div class="mt-3">
                            <p class="mb-2">Number Of Departments</p>
                            <h6 class="mb-0"><?=$departments_num?></h6>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <!-- Sale & Revenue End -->

        <div class="row">
          <div class="col-sm-6">
            <h2><b>Available Equipment </b></h2>
            <?php
            $list_equipment = $project->db->query("SELECT * FROM equipment_location ORDER BY el_id DESC LIMIT 5");
            $equipments_num = $project->db->query("SELECT * FROM equipment_location");
            $equipments_num = $equipments_num->num_rows;
            if ($list_equipment->num_rows > 0) :
            ?>
              <?php if ($equipments_num > 0) : ?>
                <div class="alert alert-warning">You have <?= $equipments_num ?> Available Equipment </div>
              <?php else : ?>
                <div class="alert alert-success">You Don't </div>
              <?php endif; ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>S/N</th>
                  <th>Equipment Name</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php while ($row = $list_equipment->fetch_assoc()) : ?>
                    <tr>
                      <td><b><?= $row['el_id'] ?></b></td>
                      <td><?= $row['equipment_name'] ?></td>
                      <td><?= date('d/m/Y',$row['date_created']) ?></td>
                      <td>
                        <a href="delete_equipment.php?el_id=<?= $row['el_id']?>" class="badge bg-danger badge-pills"><i class="fa fa-trash"></i></a>
                        <a href="update_equipment.php?el_id=<?= $row['el_id'] ?>" class="badge bg-danger badge-pills"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No Available Equipment</div>
            <?php endif; ?>
          </div>
          <div class="col-sm-6">
            <h2 class="mt-5"><b>Hospital Staff</b></h2>
            <?php

            $staffs = $project->db->query("SELECT * FROM users WHERE type=5 OR type=7 OR type=9 ORDER BY status DESC LIMIT 5");
            $staff_num = $project->db->query("SELECT * FROM users WHERE type=5 OR type=7 OR type=9 ");
            $staff_num = $staff_num->num_rows;
            if ($staffs->num_rows > 0) :

            ?>
              <?php if ($staff_num > 0) : ?>
                <div class="alert alert-warning">You have <?= $staff_num ?> Staff's In Your Hospital
              </div>
              <?php else : ?>
                <div class="alert alert-success">You Don't Have Any Staff In Your Hospital</div>
              <?php endif; ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>S/N</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php while ($row = $staffs->fetch_assoc()) : ?>
                    <tr>
                      <td><b><?= $row['uid'] ?></b></td> 
                      <td><b><?= ucwords($row['fullname']) ?></b></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['status']?></td>
                      <td>
                        <a href="delete_staff.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-danger badge-pills"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No industry Supervisors</div>
            <?php endif; ?>

          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>


  <?php include_once("footer.php"); ?>