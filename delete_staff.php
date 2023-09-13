<?php 
include_once("config.php");
$project->bouncer_admin();
$error=0;
$error_msg="";
if(isset($_GET['uid'])){
    $uid=$project->uid;
    $uid=$_GET['uid'];
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("DELETE FROM users WHERE uid='$uid' ");
    $project->set_alert("danger", "This Staff Has Been Removed");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>