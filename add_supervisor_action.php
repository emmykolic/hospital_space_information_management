<?php 
include_once("config.php");
$project->bouncer_admin();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $fullname=$project->post("fullname");
    $email=$project->post("email");
    $mat_no=$project->post("mat_no");
    $password=$project->post("password");
    $cpassword=$project->post("cpassword");

    if($fullname=="" || $email=="" || $mat_no=="" || $password==""){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }else{
        if($password!=$cpassword){
            $error=1;
            $error_msg.="your password and confirm password dont match <br>";
        }else{
            $password=sha1(md5($password));
        }
    
        $check=$project->db->query("SELECT * FROM users WHERE email='$email' OR mat_no='$mat_no'");
        if($check->num_rows>0){
            $error=1;
            $error_msg.="your email or Staff ID is already in use <br>"; 
        }
    }
    
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("INSERT INTO users (fullname, mat_no, email,password, type) VALUES ('$fullname','$mat_no','$email','$password','5')");
    $project->set_alert("success", "Supervisor account was successfully created");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:add_supervisor.php");
}
?>