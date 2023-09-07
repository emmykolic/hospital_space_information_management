<?php 
include_once("config.php");
$project->bouncer_manager();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $ward_number=$project->post("ward_number");
    $bed_ward_by_ward=$project->post("bed_ward_by_ward");
    // $departments = $project->post("departments");

    if($ward_number=="" || $bed_ward_by_ward==""){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}
$uid = $project->uid;
$dash = date('d/m/Y');

if($error==0){
    $project->db->query("INSERT INTO spaces(uid, ward_number, bed_ward_by_ward, date_created) VALUES('$uid', '$ward_number', '$bed_ward_by_ward', '$dash') ");
    $project->set_alert("success", "Hospital Space Was successfully created");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>