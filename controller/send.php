<?php
session_start();
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


$sendid2 = $_POST['my2'];
$editDPT2 = new DonorAdd();
$reslt2 = $editDPT2 -> editDonorPersonA($sendid2,"PERSON");

if(!empty($reslt2))
foreach($reslt2 as $rowR2)
	$type = $rowR2['donor_type'];
	
		
{
	
	?>

<tr>
						 
						  <td id =donName><?php echo $rowR2['don_team_name'];?></td>
						  <td><?php echo $rowR2['national_id'];?></td>
						  <td><?php echo $rowR2['address_line1'];?></td>
						  <td><?php echo $rowR2['address_line2'];?></td>
						  <td><?php echo $rowR2['contact_no'];?></td>
						  <td><?php echo $rowR2['email'];?></td>
						 
						  </tr>



<!-- </div>  reserveinfo -->
<?php
}
?>