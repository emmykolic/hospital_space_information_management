<?php
include_once("config.php");
$project->bouncer_manager();
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $departments = $project->post("departments");
    $facilitator = $project->post("facilitator");

    if ($departments == "" || $facilitator == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

if ($error == 0) {
    $project->db->query("UPDATE spaces SET departments='$departments' WHERE sid='$facilitator'");
    $project->set_alert("success", "A Ward was successfully Allocated To A Department");
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
