<?php 
include_once("config.php");
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $fullname=$project->post("fullname");
    $email=$project->post("email");
    $staff_no=$project->post("staff_no");
    $password=$project->post("password");
    $cpassword=$project->post("cpassword");

    if($fullname=="" || $email=="" || $staff_no=="" || $password==""){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }else{
        if($password!=$cpassword){
            $error=1;
            $error_msg.="your password and confirm password dont match <br>";
        }else{
            $password=sha1(md5($password));
        }
    
        $check=$project->db->query("SELECT * FROM users WHERE email='$email' OR staff_no='$staff_no'");
        if($check->num_rows>0){
            $error=1;
            $error_msg.="your email or Staff Number is already in use <br>"; 
        }
    }
    
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("INSERT INTO users (fullname, staff_no, email,password) VALUES ('$fullname','$staff_no','$email','$password')");
    $project->set_alert("success", "your registration was successful please login");
   header("location:login.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:register.php");
}
?>