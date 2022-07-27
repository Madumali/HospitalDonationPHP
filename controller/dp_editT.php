<?php
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$edit_pT = $_POST['editdT'];

$editDPT = new DonorAdd();
$typeT = "team";
$DPeditT = $editDPT -> editDonorPersonA($edit_pT);


foreach ($DPeditT as $kT) {
	$title = $kT['title'];

if(!empty($DPeditT))
{
	?>

<form  method="post" id = "editdonorRteam" >
			
			<div id="showresultT"></div>
			
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
				<br> <br>  
				<p>
					<label for="">Email:</label>
				</p>
				<br>
				
				<br>
			</div>  <!-- labelfield -->

				
			<div class="inputfield" id="ff">
			<input type="hidden" name="hidden_id"  id="edit_idT" value="<?php echo $kT['teamid'];?>">

				<p>
				<input type="text" name="donor_team_name"  id="edit_teamNameT" value="<?php echo $kT['donor_name'];?>" readonly onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
	
				<p>
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="edit_donorNameT" value="<?php echo $title. ".". $kT['membername'];?>" onkeyup="this.value=this.value.toUpperCase();"></p>
				
				<p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="edit_donorNicT" value="<?php echo $kT['national_idt'];?>" onkeyup="this.value=this.value.toUpperCase();">
                <span id="editnicT"></span>
				</p>
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="edit_addressLine1T" value="<?php echo $kT['address_line1t'];?>" onkeyup="this.value=this.value.toUpperCase();">
				<br><br>
				<input type="text" name="donor_address2" placeholder="Enter Address Line2" id="edit_addressLine2T" value="<?php echo $kT['address_line2t'];?>" onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="edit_donorMobileT" value="<?php echo $kT['contact_not'];?>" maxlength=10>
                <span id="editspnPhoneStatusT"></span>
				<!-- <br> <br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="edit_donorMobile2T" value=""  maxlength=10>
                <span id="editspnPhoneStatus2T"></span> -->
				</p>
				<br>
				<p>
				<input type="email" name="donor_email" placeholder="Enter Email" id="edit_donorEmailT" value="<?php echo $kT['emailt'];?>" onkeyup="this.value=this.value.toUpperCase();">
                <span id = "editemailMsgT"></span>
				</p>
				
				
				
		</div>  <!-- inputfield -->

		</form>
	<?php
}
}
?>
<script src="/HospitalDonation/assets/js/scriptD.js"> </script>   
