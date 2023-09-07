<?php 
include_once("config.php");
$project->bouncer_manager();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $name_of_department = $project->post("name_of_department");

    if($name_of_department==""){
        $error=1;
        $error_msg.="This fields is compulsary <br>";
    }
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}
// $uid = $project->uid;
// $dash = date('d/m/Y');

if($error==0){
    $project->db->query("INSERT INTO departments(name_of_department) VALUES('$name_of_department') ");
    $project->set_alert("success", "Hospital Department Was successfully created");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>