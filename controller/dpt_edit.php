<?php 

require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$edit_pT = $_POST['editT'];

$editDPT = new TempDonorAdd();
$typeT = "team";
$DPeditT = $editDPT -> editDonorPerson($edit_pT,$typeT);
//var_dump($DPeditT);
echo "<br>";
$again = new TempDonorAdd();
$secnd = $again->membernum($edit_pT);

//var_dump($secnd);
foreach ($DPeditT as $kT) {


if(!empty($DPeditT))
{
	?>

<form  method="post" id = "editdonorRteam" >
			
			<div id="showresult"></div>
			
			<div class="labelfield">
				<p>
				<label for=""> Team Name: </label>
				</p>
				<br>
				<p>
				<label for=""> Name: </label>
				</p>
				<br>
				<p>
				<label for=""> NIC: </label>
				</p>
				<br> 
				<p>
				<label for=""> Address-L1: </label>
				</p> <br>
				<p>
				<label for=""> Address-L2: </label>
				</p>
				<br> 
				<p>
					<label for="">Contact:</label>
				</p>
				<br> <br> <br> 
				<p>
					<label for="">Email:</label>
				</p>
				<br>
				
				<br>
			</div>  <!-- labelfield -->

				
			<div class="inputfield" id="ff">
			<input type="hidden" name="hidden_id"  id="edit_idTR" value="<?php echo $kT['donor_id'];?>">

				<p>
				<input type="text" name="donor_team_name"  id="edit_teamName" value="<?php echo $kT['don_team_name'];?>" readonly style = "text-transform:uppercase">
				</p>
				
	
				<p>
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="edit_donorName" value="<?php echo $kT['member_name'];?>" style = "text-transform:uppercase"></p>
				
				<p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="edit_donorNic" value="<?php echo $kT['national_id'];?>" style = "text-transform:uppercase">
                <span id="editnic"></span>
				</p>
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="edit_addressLine1" value="<?php echo $kT['address_line1'];?>" style = "text-transform:uppercase"> 
				<br><br>
				<input type="text" name="donor_address2" placeholder="Enter Address Line2" id="edit_addressLine2" value="<?php echo $kT['address_line2'];?>" style = "text-transform:uppercase">
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="edit_donorMobile" value="<?php echo $kT['contact_no'];?>" maxlength=10 style = "text-transform:uppercase">
                <span id="editspnPhoneStatus"></span>
				<br> <br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="edit_donorMobile2" value="<?php echo $kT['contact_no2'];?>" maxlength=10 style = "text-transform:uppercase">
                <span id="editspnPhoneStatus2"></span>
				</p>
				
				<p>
				<input type="email" name="donor_email" placeholder="Enter Email" id="edit_donorEmail" value="<?php echo $kT['email'];?>" style = "text-transform:uppercase">
                <span id = "editemailMsg"></span>
				</p>
				
				
				
		</div>  <!-- inputfield -->

		</form>
	<?php
}
}
?>
<script src="/HospitalDonation/assets/js/script.js"> </script>