<?php
session_start();

$con = new PDO("mysql:host=localhost; dbname=db_hospital", "root", "");

if(isset($_POST["selct_new"]) && isset($_POST["typecd"]))

$type = $_POST["typecd"];
// echo "done";


{
   $DM = $_POST["selct_new"];
   $select_new = preg_replace('#[^a-zA-Z0-9_-]#s', $_POST["selct_new"], $DM);
   
   // $new_opt =  $_POST["selct_new"];
   $data = array(
        ':selct_new' =>  $select_new,
        ':typecd' => $type

   );
   
   $query =  "SELECT * FROM `item_name` WHERE `name` = :selct_new AND `type_cd` = :typecd  ";
//    $stmnt = mysqli_query($con,$query);
$stmnt = $con->prepare($query);
   // $stmnt->bindParam(":selct_new", $_POST["selct_new"]);

$stmnt->execute($data);

   if($stmnt->rowCount() == 0)
   {
       $query = "INSERT INTO `item_name`(`type_cd`,`name`) VALUES (:typecd , :selct_new)";
    //    $stmnt = mysqli_query($con,$query);
       $stmnt = $con->prepare($query);
       $stmnt->execute($data);

       echo 'yes'; 
   }

}



?>