<?php include_once("config.php"); 
$project->bouncer_editor();
$el_id_query = $project->db->query("SELECT el_id FROM equipment_location ");
if ($el_id_query) {
  $el_row = $el_id_query->fetch_assoc();
  $el_id = $el_row['el_id'];

  // $get_equip = $project->db->query("SELECT * FROM equipment_location WHERE el_id = '$el_id' ORDER BY DESC LIMIT 5 ");
  $get_equip = $project->db->query("SELECT * FROM equipment_location ORDER BY date_created ASC LIMIT 10");
}else {
  $project->set_alert("success", "Trying To Access An Invalid Page");
  die(header("Location: home.php" ));
}

//$get_equip = $get_equip->fetch_assoc();

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module" style="height: 89vh;">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Available Equipment</h2> 
                <?php $project->get_alert(); ?>
                <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>S/No</th>
                  <th>Equipment Name</th>
                  <th>Date</th>
                </thead>
                <tbody>
                    <?php while ($row = $get_equip->fetch_assoc()): ?>
                    <tr>
                      <td><b><?=$row['el_id']?></b></td> 
                      <td><?=$row['equipment_name']?></td>
                      <td><b><span class="text-success"><?=date('m/d/Y',$row['date_created'])?> </span></b></td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
              </table>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
      <?php include_once("footer.php"); ?>
