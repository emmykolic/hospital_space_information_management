<?php 
include_once("config.php");
$project->bouncer_admin();
$error=0;
$error_msg="";
if(isset($_GET['el_id'])){
    $uid=$project->uid;
    $el_id=$_GET['el_id'];
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("DELETE FROM equipment_location WHERE el_id='$el_id' ");
    $project->set_alert("danger", "This Equipment Has Been Deleted");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>