<?php
include_once("config.php");
$project->bouncer();
?>
<?php include_once("header.php"); ?>
<div class="main">

  <section class="module mb-5 pb-0">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="font-alt"><span class=" icon-profile-male"></span> Name: <?= $project->fullname ?></h6>
          <h6 class="font-alt"><span class="icon-envelope"></span> Email:<?= $project->email ?></h6>
          <?php if ($project->type < 5) : ?>
            <h6 class="font-alt"><span class="icon-target"></span> Score:<?= $project->score ?></h6>
            <h6 class="font-alt"><span class="icon-toolbox"></span> Matriculation Number: <?= $project->mat_no ?></h6>
            <h6 class="font-alt"><span class=" icon-map"></span> IT Place Address: <?= $project->placement ?></h6>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="module mt-0 pt-0" style="min-height:60vh ;">
    <div class="container">
      <?php $project->get_alert(); ?>
      <?php if ($project->type == 1) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>My Log Book Entries <a href="add_entry.php" class="btn btn-primary">Add Log Book Entry</a></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <?php $uid = $project->uid; ?>

            <?php $weeks = $project->db->query("SELECT week,comment FROM logbook WHERE uid='$uid' GROUP BY WEEK ORDER BY week ASC"); ?>
            <?php if ($weeks->num_rows > 0) : ?>
              <?php while ($row = $weeks->fetch_assoc()) : ?>
                <?php
                $current_week = $row['week'];
                $current_comment = $row['comment'];
                ?>
                <?php $list = $project->db->query("SELECT * FROM logbook WHERE uid='$uid' AND week='$current_week' ORDER BY entry_date DESC"); ?>

                <table class="table table-striped table-border checkout-table table-responsive">
                  <tbody>
                    <?php while ($row = $list->fetch_assoc()) : ?>
                      <tr>
                        <td><b>WEEK <?= $row['week'] ?>, <?= $row['entry_date'] ?></b></td>
                        <td> <?= $row['entry'] ?></td>
                        <td> <a href="delete_entry.php?lid=<?= $row['lid'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                      </tr>
                    <?php endwhile; ?>
                    <tr>
                      <td colspan="3"><b>WEEK <?= $current_week ?> COMMENT </b><br><?= $current_comment ?> </td>
                    </tr>
                  </tbody>
                </table>
              <?php endwhile; ?>
            <?php else : ?>
              <div class="alert alert-warning">NO activity logged </div>
            <?php endif; ?>

          </div>
        </div>
      <?php elseif ($project->type == 5) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>IT/SIWES Students</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <?php
            $uid = $project->uid;
            $list = $project->db->query("SELECT * FROM users WHERE supervisor='$uid'");
            if ($list->num_rows > 0) :
            ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td><b>Staff ID: <?= $row['mat_no'] ?>, <?= $row['email'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-success">CURRENT SCORE: <?= $row['score'] ?></span></b> <br>
                        <?= ucwords($row['fullname']) ?>
                        <a href="view_log.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills">View Log</a>
                        <a href="score.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills">Score</a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No Students</div>
            <?php endif; ?>

          </div>
        </div>

      <?php elseif ($project->type == 7) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>IT/SIWES Students</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <?php
            $uid = $project->uid;
            $list = $project->db->query("SELECT * FROM users WHERE company='$uid'");
            if ($list->num_rows > 0) :
            ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td><b>Staff ID: <?= $row['mat_no'] ?>, <?= $row['email'] ?></b> <br>
                        <?= ucwords($row['fullname']) ?>
                        <a href="view_log.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills">View Log</a>
                        <a href="comment.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills">Add comment</a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No Students</div>
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