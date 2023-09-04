<?php include_once("config.php"); 
$project->bouncer_manager();
if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
    $list=$project->db->query("SELECT * FROM users WHERE type<9 AND supervisor=0");
    if($list->num_rows<1){
        $project->set_alert("success", "There are no students to allocate <br>");
        die(header("Location: home.php" ));
    }
}else{
    $project->set_alert("success", "Staff not Found");
    die(header("Location: home.php" ));
}

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Create Spaces</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="add_student_action.php">
                  <input type="hidden" name="supervisor" value="<?=$uid?>">
                  <div class="form-group">
                    <label class="sr-only" for="student">Student</label>
                    <select class="form-control" id="student" name="student"  required="required" data-validation-required-message="Please enter your entry student.">
                        <option value="">Select Student</option>
                        <?php while($row=$list->fetch_assoc()):?>
                        <option value="<?= $row['uid']?>"><?=ucwords($row['fullname'])?></option>
                        <?php endwhile; ?>
                    </select>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Allocate</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
        <?php include_once("footer.php"); ?>