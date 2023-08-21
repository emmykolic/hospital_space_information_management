<?php
include_once("config.php");
$project->bouncer_admin();
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $student = $project->post("student");
    $supervisor = $project->post("supervisor");

    if ($student == "" || $supervisor == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

if ($error == 0) {
    $project->db->query("UPDATE users SET company='$supervisor' WHERE uid='$student'");
    $project->set_alert("success", "Supervisor account was successfully created");
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
