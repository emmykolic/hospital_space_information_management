<?php
include_once("config.php");
$project->bouncer();
// include_once("header.php");
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
          <?php if($project->type == 5 && $project->clinical_staff == 2): ?>
          <a href="make_ward_changes.php" class="patient_button btn btn-primary">Make Ward Changes</a>
          <?php endif;?>
          <?php if($project->type == 7 && $project->supervisor == 5): ?>
          <a href="allocate_spaces.php" class="patient_button btn btn-primary">Allocates Spaces To Department</a>
          <?php endif;?>
        </div>
        <?php if($project->type == 7 && $project->supervisor == 5): ?>
        <a href="create_spaces.php?uid=<?= $prow['uid'] ?>" class="spaces_button btn btn-primary">Create Spaces</a>
        <?php endif;?>
        <?php if($project->type == 5 && $project->clinical_staff == 2): ?>
        <a href="equipment_availabilty.php" class="spaces_button btn btn-primary">Check Equipment Availabilty</a>
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
            <h3>My Hospital Space Management Entry! <a href="add_entry.php" class="btn btn-primary">Check For Spaces</a></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <?php $uid = $project->uid; ?>

            <?php //$weeks = $project->db->query("SELECT week,comment FROM logbook WHERE uid='$uid' GROUP BY WEEK ORDER BY week ASC"); ?>
            <?php //if ($weeks->num_rows > 0) : ?>
              <?php //while ($row = $weeks->fetch_assoc()) : ?>
                <?php
                // $current_week = $row['week'];
                // $current_comment = $row['comment'];
                ?>
                <?php //$list = $project->db->query("SELECT * FROM logbook WHERE uid='$uid' AND week='$current_week' ORDER BY entry_date DESC"); ?>

                <table class="table table-striped table-border checkout-table table-responsive">
                  <tbody>
                    <?php //while ($row = $list->fetch_assoc()) : ?>
                      <tr>
                        
                      </tr>
                    <?php //endwhile; ?>
                    <tr>
                      <td><b>WEEK <?=$row['week'] ?>, <?= $row['entry_date'] ?></b></td>
                        <td> <?= $row['entry'] ?></td>
                        <td> <a href="delete_entry.php?lid=<?= $row['lid'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                      <td colspan="3"><b>WEEK <?= $current_week ?> COMMENT </b><br><?= $current_comment ?> </td>
                    </tr>
                  </tbody>
                </table>
              <?php //endwhile; ?>
            <?php //else : ?>
              <div class="alert alert-warning">NO activity logged </div>
            <?php //endif; ?>

          </div>
        </div>
      <?php elseif ($project->type == 5) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>View Assigned Spaces</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-11 offset-sm-2">
            <?php
            // $uid = $project->uid;
            $get_value = $project->db->query("SELECT departments FROM spaces ");
            $get_values = $get_value->fetch_assoc();
            $list = $project->db->query("SELECT * FROM spaces WHERE departments = '$get_values' ");
            if ($list->num_rows > 0) :
            ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>Gynacologist</th>
                  <th>Maternity</th>
                  <th>Surgeons</th>
                  <th>Psychiatrist</th>
                  <th>Internal Mediicine</th>
                </thead>
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td><b>Ward: <?= $row['ward_number'] ?></b></td> 
                      <td></td>
                      <td><b><span class="text-success">CURRENT SCORE: </span></b></td>
                      <td></td>
                      <td></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">No Ward Has Been Assigned!</div>
            <?php endif; ?>

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

        <div class="row">
          <div class="col-sm-6">
            <h2>IT/SIWES Supervisors <a href="add_supervisor.php" class="btn btn-primary btn-sm">Add Supervisors</a> </h2>
            <?php
            $uid = $project->uid;
            $list = $project->db->query("SELECT * FROM users WHERE type=5 ORDER BY uid DESC");
            $unallocted = $project->db->query("SELECT * FROM users WHERE type<5 AND supervisor=0");
            $unallocted = $unallocted->num_rows;
            if ($list->num_rows > 0) :
            ?>
              <?php if ($unallocted > 0) : ?>
                <div class="alert alert-warning">You have <?= $unallocted ?> unallocated students please allocate</div>
              <?php else : ?>
                <div class="alert alert-success">You have allocated all you students welldone!</div>
              <?php endif; ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td><b>Staff ID: <?= $row['mat_no'] ?>, <?= $row['email'] ?></b> <br>
                        <?= ucwords($row['fullname']) ?> <a href="add_student.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills"><i class="fa fa-wrench"></i> Allocate to supervisor</a></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No Supervisors</div>
            <?php endif; ?>
          </div>
          <div class="col-sm-6">
            <h2 class="mt-5">Industry Supervisors <a href="add_company.php" class="btn btn-primary btn-sm">Add Industry Supervisors</a></h2>
            <?php

            $list = $project->db->query("SELECT * FROM users WHERE type=7 ORDER BY uid DESC");
            $unallocted = $project->db->query("SELECT * FROM users WHERE type=1 AND company=0");
            $unallocted = $unallocted->num_rows;
            if ($list->num_rows > 0) :

            ?>
              <?php if ($unallocted > 0) : ?>
                <div class="alert alert-warning">You have <?= $unallocted ?> unallocated students please allocate</div>
              <?php else : ?>
                <div class="alert alert-success">You have allocated all you students welldone!</div>
              <?php endif; ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td><b>Staff ID: <?= $row['mat_no'] ?>, <?= $row['email'] ?></b> <br>
                        <?= ucwords($row['fullname']) ?> <a href="add_ind_student.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills"><i class="fa fa-wrench"></i> Allocate to supervisor</a></td>
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