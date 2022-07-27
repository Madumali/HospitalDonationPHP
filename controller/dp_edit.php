<?php
require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$edit_p = $_POST['edit'];

$editDP = new TempDonorAdd();
$type = "PERSON";
$DPedit = $editDP -> editDonorPerson($edit_p,$type);
foreach ($DPedit as $k) {


if(!empty($DPedit))
{
	?>

<form action="" method="post" id="">
			
			<div id="resultP2"></div>
			
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

				
			<div class="inputfield" id="Tperson">
				<p>
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="edit_tempdonorName" value="<?php echo $k['don_team_name'];?>" style = "text-transform:uppercase"></p>
				
				<p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="edit_tempdonorNic" value="<?php echo $k['national_id'];?>" style = "text-transform:uppercase">
				</p>
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="edit_tempaddressLine1" value="<?php echo $k['address_line1'];?>" style = "text-transform:uppercase">
				<br><br>
				<input type="text" name="donor_address2" placeholder="Enter Address Line2" id="edit_tempaddressLine2" value="<?php echo $k['address_line2'];?>" style = "text-transform:uppercase">
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="edit_tempdonorMobile" value="<?php echo $k['contact_no'];?>"  maxlength=10 style = "text-transform:uppercase">
				<br> <br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="edit_tempdonorMobile2" value="<?php echo $k['contact_no2'];?>" maxlength=10 style = "text-transform:uppercase">
				</p>
				
				<p>
				<input type="text" name="donor_email" placeholder="Enter Email" id="edit_tempdonorEmail" value="<?php echo $k['email'];?>" style = "text-transform:uppercase">
				</p>
				
				
				
		</div>  <!-- inputfield -->

		</form>
		<?php
	}

}
?>
