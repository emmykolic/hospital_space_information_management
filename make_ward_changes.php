<?php include_once("config.php"); 
$project->bouncer_editor();
// if(isset($_GET['sid'])){
//     $sid=$_GET['sid'];
// }else{
//     $project->set_alert("success", "You Have Nothing To Update!");
//     // die(header("Location: home.php" ));
// }

$spaces = $project->db->query("SELECT * FROM spaces ");
$spaces = $spaces->fetch_assoc();

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module" style="height: 89vh;">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Make Ward Changes</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="update_spaces_action.php">
                  <input type="hidden" name="sid" value="<?=$sid?>">
                  <div class="form-group">
                    <label class="sr-only" for="Number_Of_Ward">Ward Number</label>
                    <input type="text" class="form-control" id="numberOfWard" name="ward_number" value="<?=$spaces['ward_number']?>"  required="required" data-validation-required-message="Please enter your Ward Number." />
                    <p class="help-block text-danger"></p>
                  </div>
                  <!-- Under ward12 you'll register 6beds -->
                  <div class="form-group">
                    <label class="sr-only" for="BedWardByWard">Number OF Bed Ward By Ward</label>
                    <input type="text" class="form-control" id="BedWardByWard" name="bed_ward_by_ward" value="<?=$spaces['bed_ward_by_ward']?>" required="required" data-validation-required-message="Please Enter The Number Of Bed Ward By Ward." />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="BedWardByWard">Departments</label>
                    <input type="text" class="form-control" id="BedWardByWard" name="bed_ward_by_ward" value="<?=$spaces['bed_ward_by_ward']?>" required="required" data-validation-required-message="Please Enter The Number Of Bed Ward By Ward." />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Create</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
        <?php include_once("footer.php"); ?>