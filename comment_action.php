<?php
include_once("config.php");
$project->bouncer_editor();
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $student = $project->post("student");
    $week = $project->post("week");
    $comment = $project->post("comment");

    if ($student == "" || $week == "" || $comment == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

if ($error == 0) {
    $project->db->query("UPDATE logbook SET comment='$comment' WHERE week='$week' AND uid='$student'");
    $project->set_alert("success", " Comment was successfully added");
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
