<?php
session_start();
include 'modeld.php';


$arrayd = array();


$model = new Model();
$type="";
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $rows = $model->date_range($start_date, $end_date);
    foreach($rows as $row)
    {
        $idd = $row['item_id'];
        $type = $row['donor_type'];
        $namet = $row['donor_name'];
        $id = $row['national_id'];
        $typecode = $row['type_code'];
        $itmname = $row['itemname'];
        $qty = $row['item_qty'];
        $date = $row['receive_date'];
        $add1 = $row['address_line1'];
        $add2 = $row['address_line2'];
        $contact = $row['contact_no'];
        // if($type=="team")
        // {
        //     $new = $model->teamname();
        //     foreach($new as $row)
        //     {

        //         $namet = $row['donor_name'];
        //     }
        //     $id = "";
        
        //     $namet = $row['donor_name'];
            
          
        //    } else {
        //     $id = $row['national_id'];
        //     $namet = $row['donor_name'];
        //     // $donname = $row['donor_name'];
        // }
        $arrayd[] = array("item_id" => $idd,"donor_name" => $namet, "national_id"=>$id, "type_code"=>$typecode, "itemname"=>$itmname, "item_qty"=>$qty, "receive_date"=>$date, "address_line1"=>$add1,"address_line2"=>$add2,"contact_no"=>$contact); 
    }
} else {
    $rows = $model->fetch();
    foreach($rows as $row)
    {
        $idd = $row['item_id'];
        $type = $row['donor_type'];
        $namet = $row['donor_name'];
        $id = $row['national_id'];
        $typecode = $row['type_code'];
        $itmname = $row['itemname'];
        $qty = $row['item_qty'];
        $date = $row['receive_date'];
        $add1 = $row['address_line1'];
        $add2 = $row['address_line2'];
        $contact = $row['contact_no'];
        // if($type =="team")
        // {
        //     $new = $model->teamname($type);
        //     foreach($new as $row)
        //     {
        //         $id = ""; 
        //         $namet = $row['donor_name'];
        //     }
          
            
          
        //    }
          
        //    else {
        //     $id = $row['national_id'];
        //     $namet = $row['donor_name'];
        //     // $donname = $row['donor_name'];
        // }
        $arrayd[] = array("item_id" => $idd,"donor_name" => $namet, "national_id"=>$id, "type_code"=>$typecode, "itemname"=>$itmname, "item_qty"=>$qty, "receive_date"=>$date, "address_line1"=>$add1,"address_line2"=>$add2,"contact_no"=>$contact); 
    }
}

echo json_encode($arrayd);




// DONOR LIST



?>