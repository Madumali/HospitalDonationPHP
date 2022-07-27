<?php
session_start();
include 'modeld.php';

$arraydd = array();
$model = new Model();

if (isset($_POST['start_dated']) && isset($_POST['end_dated'])) {
    $start_dated = $_POST['start_dated'];
    $end_dated = $_POST['end_dated'];

    $rowsd = $model->date_ranged($start_dated, $end_dated);
    foreach($rowsd as $rowd)
    {
        $idd = $rowd['donor_id'];
        $type = $rowd['donor_type'];
        $title = $rowd['title'];
        $donname = $rowd['donor_name'];
        $id = $rowd['national_id'];
        $address1 = $rowd['address_line1'];
        $address2 = $rowd['address_line2'];
        $email = $rowd['email'];
        $contact = $rowd['contact_no'];
        $date = $rowd['reg_date'];
        if($type=="team")
        {
            $id = "";
           
        } else {
            $id = $rowd['national_id'];
           
        }
        $arraydd[] = array("donor_id" => $idd,"title" => $title, "donor_name" => $donname, "national_id"=>$id, "address_line1"=>$address1, "address_line2"=>$address2, "email"=>$email, "contact_no"=>$contact, "reg_date"=>$date); 
    }
} else {
    $rowsd = $model->fetchd();
    foreach($rowsd as $rowd)
    {
        $idd = $rowd['donor_id'];
        $type = $rowd['donor_type'];
        $title = $rowd['title'];
        $donname = $rowd['donor_name'];
        $id = $rowd['national_id'];
        $address1 = $rowd['address_line1'];
        $address2 = $rowd['address_line2'];
        $email = $rowd['email'];
        $contact = $rowd['contact_no'];
        $date = $rowd['reg_date'];
        if($type=="team")
        {
            $id = "";
           
        } else {
            $id = $rowd['national_id'];
            
        }
        $arraydd[] = array("donor_id" => $idd,"title" => $title, "donor_name" => $donname, "national_id"=>$id, "address_line1"=>$address1, "address_line2"=>$address2, "email"=>$email, "contact_no"=>$contact, "reg_date"=>$date); 
    }
}

echo json_encode($arraydd);



?>