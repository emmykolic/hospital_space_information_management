<?php
include_once("config.php");
$project->bouncer_admin();
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $el_id = $project->post("el_id");
    $equipment_name = $project->post("equipment_name");
    $bed_ward_by_ward = $project->post("bed_ward_by_ward");

    if ($el_id == "" || $equipment_name == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

// $uid = $project->uid;

if ($error == 0) {
    $project->db->query("UPDATE equipment_location SET equipment_name='$equipment_name' WHERE el_id='$el_id'");
    $project->set_alert("success", "An Equipment Was Successfully Updated");
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
