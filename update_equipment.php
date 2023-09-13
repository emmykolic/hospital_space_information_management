<?php include_once("config.php"); 
$project->bouncer_admin();
if(isset($_GET['el_id'])){
    $el_id=$_GET['el_id']; 
}else{
    $project->set_alert("success", "Equipment not Found");
    die(header("Location: home.php" ));
}

$get_equip = $project->db->query("SELECT * FROM equipment_location WHERE el_id = '$el_id' ");
$get_equip = $get_equip->fetch_assoc();

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module" style="height: 89vh;">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Update Hospital Equipments</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="update_equipment_action.php">
                  <input type="hidden" name="el_id" value="<?=$el_id?>">
                  <div class="form-group">
                    <label class="sr-only" for="hospital_equipments">Hospital Equipments</label>
                    <input type="text" class="form-control" id="hospitalEquipments" name="equipment_name" value="<?=$get_equip['equipment_name']?>" required="required" data-validation-required-message="Please enter your Ward Number." />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Update</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
        <?php include_once("footer.php"); ?>