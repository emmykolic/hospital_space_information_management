<?php include_once("config.php");
$project->bouncer_editor();
if (isset($_GET['uid'])) {
  $uid = $_GET['uid'];
  $student = $project->db->query("SELECT * FROM users WHERE uid='$uid' ");
  $student = $student->fetch_assoc();
} else {
  $project->set_alert("success", "Student not Found");
  die(header("Location: home.php"));
}

?>
<?php include_once("header.php"); ?>
<div class="main">

  <section class="module">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <h2><?= ucwords($student['fullname']) ?> Log Book Entries
            <?php if ($project->type == 5) : ?>
              <a href="score.php?uid=<?= $uid ?>" class="btn btn-primary">Enter score</a>
            <?php elseif ($project->type == 7) : ?>
              <a href="comment.php?uid=<?= $uid ?>" class="btn btn-primary">Add Comments</a>
            <?php endif; ?>

          </h2>

        </div>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <?php $weeks = $project->db->query("SELECT week,comment FROM logbook WHERE uid=$uid GROUP BY WEEK ORDER BY week ASC"); ?>
          <?php if ($weeks->num_rows > 0): ?>
            <?php while ($row = $weeks->fetch_assoc()) : ?>
              <?php
              $current_week = $row['week'];
              $current_comment = $row['comment'];
              ?>
              <?php $list = $project->db->query("SELECT * FROM logbook WHERE uid='$uid' AND week='$current_week' ORDER BY entry_date DESC"); ?>

              <table class="table table-striped table-border checkout-table table-responsive">
                <tbody>
                  <?php while ($prow = $list->fetch_assoc()): ?>
                    <tr>
                      <td><b>WEEK <?= $prow['week'] ?>, <?= $prow['entry_date'] ?></b><br>
                        <?= $prow['entry'] ?></td>
                    </tr>
                  <?php endwhile; ?>
                  <tr>
                    <td><b>WEEK <?= $row['week'] ?> COMMENT </b><?= $current_comment ?> </td>
                  </tr>
                </tbody>
              </table>
            <?php endwhile; ?>
          <?php else : ?>
            <div class="alert alert-warning">NO activity logged </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </section>


  <?php include_once("footer.php"); ?>