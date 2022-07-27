<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Issuance/IssuanceAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


if(isset($_POST['buttonissue']))
{
    if(isset($_POST['type']) && isset($_POST['itmname']) && isset($_POST['qty']) && isset($_POST['towhom']) && isset($_POST['dep']))
    {
        if(!empty($_POST['type']) && !empty($_POST['itmname']) && !empty($_POST['qty']) && !empty($_POST['dep']) )
        {
            $issuearray=array();
            $type = $_POST['type'];
            $itmname = $_POST['itmname'];
            $qty = $_POST['qty'];
            $towhom = $_POST['towhom'];
            $dep = $_POST['dep'];
            $date = date('Y-m-d H:i:s');
            $delet = 0;
            $status = 0;
            $username = $_SESSION['username'];

         
            // $issue = new IssuanceAdd();
            // $result1 = $issue -> Issueadd($issuearray);

            $sqlIssue = 'INSERT INTO `issuance`(`issued_by`,`issue_type`, `issue_item`, `issue_itemqty`, `issue_dep`, `to_whom`, `issue_date`, `issue_delet`) VALUES
            ("'.$username.'","'.$type.'", "'.$itmname.'", "'.$qty.'", "'.$dep.'", "'.$towhom.'", "'.$date.'", "'.$delet.'"); INSERT INTO `stock`(`enteredBy`, `codeid`, `codename`, `item_qty_in`, `item_qty_out`, `date`, `status`, `delete_stk`) VALUES ("'.$username.'","'.$type.'","'.$itmname.'","'.$status.'", "'.$qty.'", "'.$date.'","0", "0");';


if($sqlIssue!='')
{ 
    if(mysqli_multi_query($con,$sqlIssue))
    
    {
        // var_dump($sqlIssue);
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Record successfully Inserted
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Please Enter Details!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    
}	

        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Please Enter Details!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
        } 
    }
}


// if(isset($_POST['buttonissue']))
// {
//     if(isset($_POST['qty']) && isset($_POST['itmname']))
//     {

//         $data = $_POST['itmname'];
//         $qty = $_POST['qty'];

//         // $personU = new IssuanceAdd();
//         // $resultU = $personU -> updateIssueview($data);
//         $upd =  "UPDATE `item_sum` SET `total`= total-'$qty'  WHERE `item_sum_name`= '$data' AND `total`> 0  " ;
// 		$queryU =mysqli_query($con,$upd);

//         echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//         Data decrement Successfully!
//         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
//       </div>";


// } else {
// echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
//         Please Enter Details!
//         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
//       </div>";
// } 


// }
?>