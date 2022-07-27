<?php
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$edit_p = $_POST['editp'];

$editDP = new DonorAdd();
$type = "person";
$DPedit = $editDP -> editDonorPersonAP($edit_p,$type);
foreach ($DPedit as $k) {
	$title = $k['title'];

if(!empty($DPedit))
{
	?>

<form  method="post" id = "editdonor" >
			
			<div id="showresult"></div>
			
			<div class="labelfield">
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
			<input type="hidden" name="donor_name"  id="edit_id" value="<?php echo $k['donor_id'];?>">
				<p>
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="edit_donorName" value="<?php echo $title. ".". $k['donor_name'];?>" onkeyup="this.value=this.value.toUpperCase();"></p>
				
				<p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="edit_donorNic" value="<?php echo $k['national_id'];?>" onkeyup="this.value=this.value.toUpperCase();">
                <span id="editnic"></span>
				</p>
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="edit_addressLine1" value="<?php echo $k['address_line1'];?>" onkeyup="this.value=this.value.toUpperCase();">
				<br><br>
				<input type="text" name="donor_address2" placeholder="Enter Address Line2" id="edit_addressLine2" value="<?php echo $k['address_line2'];?>" onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="edit_donorMobile" value="<?php echo $k['contact_no'];?>"  maxlength=10 >
                <span id="editspnPhoneStatus"></span>
				<br> <br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="edit_donorMobile2" value="<?php echo $k['contact_no2'];?>"  maxlength=10 >
                <span id="editspnPhoneStatus2"></span>
				</p>
				
				<p>
				<input type="email" name="donor_email" placeholder="Enter Email" id="edit_donorEmail" value="<?php echo $k['email'];?>" onkeyup="this.value=this.value.toUpperCase();">
                <span id = "editemailMsg"></span>
				</p>
				
				
				
		</div>  <!-- inputfield -->

		</form>
		<?php
	}

}
?>
<script src="../../assets/js/scriptD.js"></script>