<?php include_once("config.php"); 
$project->bouncer_editor();
if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
}else{
    $project->set_alert("warning", "student not Found");
    die(header("Location: home.php" ));
}

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Score Student</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="score_action.php">
                  <input type="hidden" name="student" value="<?=$uid?>">
                  <div class="form-group">
                    <label class="sr-only" for="student">Score</label>
                    <input class="form-control" id="score" name="score" type="number" required="required" data-validation-required-message="Please enter score.">
                        
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Allocate Score</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
       

        <?php include_once("footer.php"); ?>