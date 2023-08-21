<?php 
include_once("config.php");
$project->bouncer();
$error=0;
$error_msg="";
if(isset($_GET['lid'])){
    $uid=$project->uid;
    $lid=$_GET['lid'];
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("DELETE FROM logbook WHERE lid='$lid' AND uid='$uid' ");
    $project->set_alert("success", "your entry was deleted");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>