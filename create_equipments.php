<?php include_once("config.php"); 
$project->bouncer_admin();
// if(isset($_GET['uid'])){
//     $uid=$_GET['uid'];
//     $list=$project->db->query("SELECT * FROM users WHERE type==9");
//     if($list->num_rows<1){
//         $project->set_alert("success", "There are no students to allocate <br>");
//         die(header("Location: home.php" ));
//     }
// }else{
//     $project->set_alert("success", "Staff not Found");
//     die(header("Location: home.php" ));
// }

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module" style="height: 89vh;">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Create Hospital Equipments</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="create_equipments_action.php">
                  <input type="hidden" name="admin" value="<?=$uid?>">
                  <div class="form-group">
                    <label class="sr-only" for="hospital_equipments">Hospital Equipments</label>
                    <input type="text" class="form-control" id="hospitalEquipments" name="equipment_name" required="required" data-validation-required-message="Please enter your Ward Number." />
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