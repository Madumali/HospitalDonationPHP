<?php
session_start();
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


if(isset($_POST['my']))
{
$sendid = $_POST['my'];
$editDPT = new DonorAdd();
$reslt = $editDPT -> listDonorPersonA($sendid);

if(!empty($reslt))
{
foreach($reslt as $rowR)
	$type = $rowR['donor_type'];
	$name = $rowR['donor_id'];
	
		
{
	if($type == "team")
	{
		$editDPT1 = new DonorAdd();
		$reslt1 = $editDPT1 -> getDonor($name);
		if(!empty($reslt1))
		{
			
	?>	

	<table>
	<tr>
	<th>Team Name: </th>
	<td ><input type="text" value ="<?php echo $rowR['donor_name'];?>"/></td>
	<td style="display:none";><input type="text" value ="<?php echo $rowR['donor_id'];?>" id = "donnameL"/></td>
	</tr>
	</table>
	<?php foreach($reslt1 as $rowD)
			{
		
		?>

						<tr>
						 
						  <td><input type="text" value ="<?php echo $rowD['membername'];?>"/></td>
						  <td><input type="text" value ="<?php echo $rowD['national_idt'];?>"/></td>
						  <td><input type="text" value ="<?php echo $rowD['address_line1t'];?>"/></td>
						  <td><input type="text" value ="<?php echo $rowD['address_line2t'];?>"/></td>
						  <td><input type="text" value ="<?php echo $rowD['contact_not'];?>"/></td>
						  <td><input type="text" value ="<?php echo $rowD['emailt'];?>"/></td>
						 
						  </tr>



<!-- </div>  reserveinfo -->
<?php
		
	}
}
}
else{
	// $name = $rowR['member_name'];
	// $teamnm =$rowR['don_team_name'];


?>
<tr>
						 
						 <td ><input type="text" value ="<?php echo $rowR['donor_name'];?>" id = "donnameL"/></td>
						 <td><input type="text" value ="<?php echo $rowR['national_id'];?>"/></td>
						 <td><input type="text" value ="<?php echo $rowR['address_line1'];?>"/></td>
						 <td><input type="text" value ="<?php echo $rowR['address_line2'];?>"/></td>
						 <td><input type="text" value ="<?php echo $rowR['contact_no'];?>"/></td>
						 <td><input type="text" value ="<?php echo $rowR['email'];?>"/></td>
						
						 </tr>

		<?php
}
}
}
}
?>



 