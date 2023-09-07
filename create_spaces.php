<?php include_once("config.php"); 
$project->bouncer_manager();
if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
    $list=$project->db->query("SELECT * FROM users WHERE type<=7 AND supervisor=5");
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
        
        <section class="module" style="height: 89vh;">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Create Spaces</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="create_spaces_action.php">
                  <input type="hidden" name="supervisor" value="<?=$uid?>">
                  <div class="form-group">
                    <label class="sr-only" for="Number_Of_Ward">Ward Number</label>
                    <input type="text" class="form-control" id="numberOfWard" name="ward_number" placeholder="Eg: Ward12"  required="required" data-validation-required-message="Please enter your Ward Number." />
                    <p class="help-block text-danger"></p>
                  </div>
                  <!-- Under ward12 you'll register 6beds -->
                  <div class="form-group">
                    <label class="sr-only" for="BedWardByWard">Number OF Bed Ward By Ward</label>
                    <input type="text" class="form-control" id="BedWardByWard" name="bed_ward_by_ward" placeholder="Ward12 6" required="required" data-validation-required-message="Please Enter The Number Of Bed Ward By Ward." />
                    <p class="help-block text-danger"></p>
                  </div>
                  <!-- <div class="form-group">
                    <label class="sr-only" for="departments">departments</label>
                    <select class="form-control" id="departments" name="departments" required="required" data-validation-required-message="Please enter your entry departments.">
                      <option value="">Select Departments</option>
                      <option>Gynacologist</option>
                      <option>Maternity</option>
                      <option>Surgeons</option>
                      <option>Psychiatrist</option>
                      <option>Internal Mediicine</option>
                    </select>
                    <p class="help-block text-danger"></p>
                  </div> -->
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