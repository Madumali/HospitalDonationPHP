<?php
session_start();
include 'modeld.php';

$arraydd = array();
$model = new Model();


    $rowsd = $model->fetch_user();
    foreach($rowsd as $rowd)
    {
        $idd = $rowd['uid'];
       
        $username = $rowd['user_full_name'];
        $id = $rowd['user_nic'];
        $designation = $rowd['designation'];
        $department = $rowd['user_department'];
        $email = $rowd['user_email'];
        $uname = $rowd['username'];
       
        $arraydd[] = array("uid" => $idd, "user_full_name" => $username, "user_nic"=>$id, "designation"=>$designation, "user_department"=>$department, "user_email"=>$email, "username"=>$uname); 
    }


echo json_encode($arraydd);



?>