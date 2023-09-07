<?php 
include_once("config.php");
$project->bouncer_manager();
$error=0;
$error_msg="";
if(isset($_GET['sid'])){
    $uid=$project->uid;
    $sid=$_GET['sid'];
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("DELETE FROM spaces WHERE sid='$sid' AND uid='$uid' ");
    $project->set_alert("success", "A Space Was Deleted");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>