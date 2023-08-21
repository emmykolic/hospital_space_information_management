<?php 
include_once("config.php");
$project->bouncer();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $uid=$project->uid;
    $entry_date=$project->post("entry_date");
    $week=$project->post("week");
    $entry=$project->post("entry");

    if($entry=="" || $entry_date=="" || $week=="" ){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }
    
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("INSERT INTO logbook (entry, entry_date, week, uid) VALUES ('$entry','$entry_date','$week','$uid')");
    $project->set_alert("success", "your entry was successful");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:add_entry.php");
}
?>