<?php
include_once("config.php");
$project->bouncer_manager();
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $sid = $project->post("sid");
    $ward_number = $project->post("ward_number");
    $bed_ward_by_ward = $project->post("bed_ward_by_ward");

    if ($sid == "" || $ward_number == "" || $bed_ward_by_ward == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

// $uid = $project->uid;

if ($error == 0) {
    $project->db->query("UPDATE spaces SET ward_number='$ward_number', bed_ward_by_ward='$bed_ward_by_ward' WHERE sid='$sid'");
    $project->set_alert("success", "A Space Was Successfully Updated");
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
