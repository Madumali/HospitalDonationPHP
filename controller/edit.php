<?php
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$editL = $_POST['my2'];
$newC = new DonorAdd();
$reslt = $newC -> listDonorPersonAA($editL);

if(!empty($reslt))
foreach($reslt as $rowL)
	$type = $rowL['donor_type'];
	$title = $rowL['title'];
		
{
	if($type == "team")
	{
		// $name = $rowL['member_name'];
		$teamnm =$rowL['donor_name'];
		//echo "ok";
	?>	


			
			<div id="showresultT"><?php echo $rowL['donor_type'];?></div>
			
			<div class="labelfield">
				<p>
				<label> Team Name: </label>
				</p>
				<br>
				<!-- <p>
				<label for> Name: </label>
				</p> -->
				
				<p>
				<label for> Address-L1: </label>
				</p> 
				<br> 
				<p>
					<label for>Contact:</label>
				</p>
				<br> 
				<p>
					<label for>Email:</label>
				</p>
				<br>
				
				<br>
			</div>  <!-- labelfield -->

				
			<div class="inputfield" id="ff">
			<input type="hidden" name="hidden_id"  id="edit_idT" value="<?php echo $rowL['donor_id'];?>">
            <input type="hidden" name="hidden_type"  id="edit_typeT" value="<?php echo $rowL['donor_type'];?>">

				<p>
				<input type="text" name="donor_team_name"  id="edit_teamNameT" value="<?php echo $teamnm;?>" readonly onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
	
				<!-- <p>
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="edit_donorNameT" value="<?php echo $name;?>" onkeyup="this.value=this.value.toUpperCase();"></p> -->
				
				<!-- <p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="edit_donorNicT" value="<?php echo $rowL['national_id'];?>" onkeyup="this.value=this.value.toUpperCase();">
                <span id="editnicT"></span>
				</p> -->
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="edit_addressLine1T" value="<?php echo $rowL['address_line1'];?>" onkeyup="this.value=this.value.toUpperCase();">
				<br>
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="edit_donorMobileT" value="<?php echo $rowL['contact_no'];?>"   maxlength=10 >
                <span id="editspnPhoneStatusT"></span>
				<br>
                 <!-- <br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="edit_donorMobile2T" value="<?php echo $rowL['contact_no2'];?>"  maxlength=10 >
                <span id="editspnPhoneStatus2T"></span> -->
				</p>
				
				<p>
				<input type="email" name="donor_email" placeholder="Enter Email" id="edit_donorEmailT" value="<?php echo $rowL['email'];?>" onkeyup="this.value=this.value.toUpperCase();">
                <span id = "editemailMsgT"></span>
				</p>
				
				
				
		</div>  <!-- inputfield -->

		



<?php 
   } else {
    ?>
    
  
			
    <div id="showresult"> <?php echo $rowL['donor_type'];?></div>
    
    <div class="labelfield">
        <p>
        <label> Name: </label>
        </p>
        <br>
        <p>
        <label> NIC: </label>
        </p>
        <br> 
        <p>
        <label> Address-L1: </label>
        </p> <br>
        <p>
        <label > Address-L2: </label>
        </p>
        <br> 
        <p>
            <label >Contact:</label>
        </p>
        <br> <br> <br> 
        <p>
            <label >Email:</label>
        </p>
        <br>
        
        <br>
    </div>  <!-- labelfield -->

        
    <div class="inputfield" id="ff">
    <input type="hidden" name="donor_name"  id="edit_id" value="<?php echo $rowL['donor_id'];?>">
    <input type="hidden" name="donor_name"  id="edit_type" value="<?php echo $rowL['donor_type'];?>">
        <p>
        <input type="text" name="donor_name" placeholder="Enter Donor Name" id="edit_donorName" value="<?php echo $title.".". $rowL['donor_name'];?>" onkeyup="this.value=this.value.toUpperCase();"></p>
        
        <p>
        <input type="text" name="donor_nic" placeholder="Enter National Identity " id="edit_donorNic" value="<?php echo $rowL['national_id'];?>" onkeyup="this.value=this.value.toUpperCase();">
        <span id="editnic"></span>
        </p>
        
        <p>
        <input type="text" name="donor_address1" placeholder="Enter Address Line1" id="edit_addressLine1" value="<?php echo $rowL['address_line1'];?>" onkeyup="this.value=this.value.toUpperCase();">
        <br><br>
        <input type="text" name="donor_address2" placeholder="Enter Address Line2" id="edit_addressLine2" value="<?php echo $rowL['address_line2'];?>" onkeyup="this.value=this.value.toUpperCase();">
        </p>
        
        
        <p>
        <input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="edit_donorMobile" value="<?php echo $rowL['contact_no'];?>" maxlength=10 >
        <span id="editspnPhoneStatus"></span>
        <br> <br>
        <input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="edit_donorMobile2" value="<?php echo $rowL['contact_no2'];?>" maxlength=10 >
        <span id="editspnPhoneStatus2"></span>
        </p>
        
        <p>
        <input type="email" name="donor_email" placeholder="Enter Email" id="edit_donorEmail" value="<?php echo $rowL['email'];?>" onkeyup="this.value=this.value.toUpperCase();">
        <span id = "editemailMsg"></span>
        </p>
        
        
        
</div>  <!-- inputfield -->


<?php
   }
}
?>

<script src="/HospitalDonation/assets/js/scriptD.js"> </script> 