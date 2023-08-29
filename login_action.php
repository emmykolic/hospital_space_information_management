<?php
include_once("config.php");
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $staff_no = $project->post("staff_no");
    $password = $project->post("password");

    if ($staff_no == "" || $password == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    } else {

        $password = sha1(md5($password));
        $check = $project->db->query("SELECT * FROM users WHERE (staff_no='$staff_no' AND password='$password') OR  (email='$staff_no' AND password='$password') ");
        if ($check->num_rows < 1) {
            $error = 1;
            $error_msg .= "Invalid Login Credentials <br>";
        } else {
            $check = $check->fetch_assoc();
            $email = $check['email'];
        }
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

if ($error == 0) {
    $_SESSION['auth'] = $email;
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:login.php");
}
