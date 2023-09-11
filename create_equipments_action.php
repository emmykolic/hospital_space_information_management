<?php 
include_once("config.php");
$project->bouncer_admin();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $equipment_name=$project->post("equipment_name");

    if($equipment_name=="" ){ 
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}
$uid = $project->uid;
$dash = time();

if($error==0){
    $project->db->query("INSERT INTO equipment_location(uid, equipment_name, date_created) VALUES('$uid', '$equipment_name', '$dash') ");
    $project->set_alert("success", "An Equipment Was successfully created");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>