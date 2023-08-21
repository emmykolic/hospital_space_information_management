<?php 
include_once("config.php");
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $fullname=$project->post("fullname");
    $email=$project->post("email");
    $mat_no=$project->post("mat_no");
    $placement=$project->post("placement");
    $placement_address=$project->post("placement_address");
    $password=$project->post("password");
    $cpassword=$project->post("cpassword");

    if($fullname=="" || $email=="" || $mat_no=="" ||  $placement=="" || $placement_address="" || $password==""){
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
            $error_msg.="your email or matriculation number is already in use <br>"; 
        }
    }
    
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("INSERT INTO users (fullname, mat_no, email,password, placement,placement_address) VALUES ('$fullname','$mat_no','$email','$password','$placement','$placement_address')");
    $project->set_alert("success", "your registration was successful please login");
   header("location:login.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:register.php");
}
?>