<?php 

// require_once('../../model/Reservation/ReserveDonation.php');

require_once('../../model/DBcontroller.php');
require_once('../../model/Donation/DonationAdd.php');
require_once('../../header.php');

 //connection object
//$con = $db_handle->connectDB();


function getsc()
{
	$output ='';
	$sccode="SC";
	$db_handle = new DBController();
	$con = $db_handle->connectDB();
	
	$data=  "SELECT * FROM `item_name` WHERE `type_cd`='$sccode' AND `delete_name`=0" ;
	$result = mysqli_query($con,$data);
	foreach($result as $row)
{
	
	$output .= '<option value = "'.$row['code'].'"> '.$row['itemname'].'  </option>';
}
return $output;
}

function getsi()
{
	$output2 ='';
	$db_handle = new DBController();
	$con = $db_handle->connectDB();
	$data=  "SELECT * FROM `item_name` WHERE `type_cd`='SI' AND `delete_name`=0" ;
	$result = mysqli_query($con,$data);
	foreach($result as $row)
{
	
	
	$output2 .= '<option value = "'.$row['code'].'">  '.$row['itemname'].' </option>';
}
return $output2;
}

function getci()
{
	$output3 ='';
	$db_handle = new DBController();
	$con = $db_handle->connectDB();
	$data=  "SELECT * FROM `item_name` WHERE `type_cd`='CI' AND `delete_name`=0" ;
	$result = mysqli_query($con,$data);
	foreach($result as $row)
{
	$output3 .= '<option value = "'.$row['code'].'">'.$row['itemname'].' </option>';
}
return $output3;
}

function getdr()
{
	$output4 ='';
	$db_handle = new DBController();
	$con = $db_handle->connectDB();
	$data=  "SELECT * FROM `item_name` WHERE `type_cd`='DR' AND `delete_name`=0" ;
	$result = mysqli_query($con,$data);
	foreach($result as $row)
{

	$output4 .= '<option value = "'.$row['code'].'"> '.$row['itemname'].' </option>';
}
return $output4;
}

function getgi()
{
	$output5 ='';
	$db_handle = new DBController();
	$con = $db_handle->connectDB();
	$data=  "SELECT * FROM `item_name` WHERE `type_cd`='GI' AND `delete_name`=0" ;
	$result = mysqli_query($con,$data);
	foreach($result as $row)
{

	$output5 .= '<option value = "'.$row['code'].'"> '.$row['itemname'].' </option>';
}
return $output5;
}

function getfd()
{
	$output6 ='';
	$db_handle = new DBController();
	$con = $db_handle->connectDB();
	$data =  "SELECT * FROM `item_name` WHERE `type_cd`='FD' AND `delete_name`=0" ;
	$result = mysqli_query($con,$data);
	foreach($result as $row)
{

	$output6 .= '<option value = "'.$row['code'].'">  '.$row['itemname'].' </option>';
}
return $output6;
}

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Donors Management</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.css"> <!--bootstrap css-->
	<link rel="stylesheet" href="../../assets/DataTables/datatables.min.css"> <!--datatables css for datepicker-->
	<link rel="stylesheet" href="../../assets/css/jquery-ui.min.css">  <!--jquery ui css-->
	<link rel="stylesheet" href="../../assets/css/menu.css">  <!-- main css -->
	<link rel="stylesheet" href="../../fontawesome/css/all.css">   <!-- fontawesome css -->
	<link rel="stylesheet" href="../../assets/css/select2.css"> <!--select2plugun css -->
	
	 <link rel="stylesheet" href="../../assets/css/select2-bootstrap4.css"> 
	 
	<script src="../../assets/js/jquery-3.6.0.js" type="text/javascript"></script>  <!--jquery min js-->
	<script src="../../assets/js/select2.js"></script>
	<script src="../../assets/js/bootstrap.js"></script> <!--bootstrap js-->
	<script src="../../assets/DataTables/datatables.min.js"></script>  <!--datatables js-->
	<script src="../../assets/js/jquery-ui.min.js"></script>  <!--jquery ui min js-->
	
	
	
</head>
<body>
	<header>
	 <!-- <div class="appname"> Donor Management </div>    appname -->	

	</header>
	<div class="wrap clearfix">
		<!-- <div class="COMMON clearfix"> -->
		<p class="check">
						
						<input divChange = "active" type="checkbox" name="active" id="active" value="active" >
						<label for="active">Donor Team/Company</label>

						
		</p>     <!-- if not one person tick checkbox -->

	<!-- for a single person -->
	<div class="donorinfo clearfix" id="donorinfo" style="display:block ;" >
		<form  method="post" id="addPerson">
			<div id="resultP1"></div>
			
		<fieldset class="dperson">
			<legend>Donor Information</legend>

			<div class="labelfield">
				<p>
				<label > Title: </label>
				</p>
				<br>
				<p>
				<label > Name: </label>
				</p>
				<br>
				<p>
				<label > NIC: </label>
				</p>
				<br> 
				<p>
				<label> Address-L1: </label>
				</p> <br>
				<p>
				<label> Address-L2: </label>
				</p>
				<br> 
				<p>
					<label>Contact:</label>
				</p>
				<br> <br> <br> 
				<p>
					<label>Email:</label>
				</p>
				<br>
				
				<br>
			</div>  <!-- labelfield -->

				
			<div class="inputfield" id="person">
			<p><label for="thero">
				<input type="radio" name = "title" value ="THERO"  id="thero" class = "title" style = "width:12px">Thero.</label>
				<label for="rev">
				<input type="radio" name = "title" value ="REV"  id="rev" class = "title" style = "width:12px">Rev.</label>
				<label for="mr">
				<input type="radio" name = "title" value ="MR"  id="mr" class = "title" style = "width:12px">Mr.</label>
				<label for="mrs">
				<input type="radio" name = "title" value ="MRS"  id="mrs" class = "title" style = "width:12px">Mrs.</label>
				<label for="ms">
				<input type="radio" name = "title" value ="MS"  id="ms" class = "title" style = "width:12px">Ms.</label>
				<label for="dr">
				<input type="radio" name = "title" value ="DR"  id="dr" class = "title" style = "width:12px">Dr.</label>
				<label for="prof">
				<input type="radio" name = "title" value ="PROF"  id="prof" class = "title" style = "width:12px">Prof.</label>
				</p>
				<p>
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="donorName" onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
				<p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="donorNic" onkeyup="this.value=this.value.toUpperCase();">
				<span id="nic"></span>
				</p>
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="addressLine1" onkeyup="this.value=this.value.toUpperCase();">
				<br><br>
				<input type="text" name="donor_address2" placeholder="Enter Address Line2" id="addressLine2" onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="donorMobile" maxlength = 10 >
				<span id="spnPhoneStatus"></span>
				<br><br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="donorMobile2" maxlength = 10 >
				<span id="spnPhoneStatus2"></span>
				</p>
				
				<p>
				<input type="email" name="donor_email" placeholder="Enter Email" id="donorEmail" onkeyup="this.value=this.value.toUpperCase();">
				<span id = "emailMsg"></span>
				</p>
				<br>
				
				<br>
				<p>
				<button type="submit" name="submit1" class="sub" id="subD1" ><i class="fas fa-clipboard-list"></i> Add Donation</button>
					
					
					<!-- <i class="fas fa-clipboard-list"></i>
					<i class="fas fa-pen"></i> -->
					<!-- <i class="fas fa-list"></i> -->
					<!-- <i class="fas fa-plus-circle"></i> -->
					
					
					
				</p>
				
		</div>  <!-- inputfield -->

		</fieldset>
		</form>
	</div>      <!-- donorinfo for a single person -->

	<!-- FORM FOR DONOR TEAM,DEFAULT HIDDEN-ONLY DISPLAY WHEN CHECKBOX IS CHECKED -->

<div class="donorTeamInfo" id="donorTeamInfo" style ="display:none ;">
	<form action="" method="post" id="addTeam" class="teamForm">
		<div id="resultT1"></div>
		
	<fieldset class="team">
		<legend>Donor Team/Company</legend>
		<div class="first" id="first">
			<p>
			<label for="">T/C Name:</label>
			<input type="text" name="teamName" placeholder="Enter Team Name"  id="teamName" onkeyup="this.value=this.value.toUpperCase();">

			<label for="">Address:</label>
			<input type="text" name="teamaddress" placeholder="Enter Adress"  id="teamAddress" onkeyup="this.value=this.value.toUpperCase();">
<br> <br>

			<label for="">Contact:</label>
			<input type="text" name="contactno" placeholder="Enter contact"  id="teamcontact" onkeyup="this.value=this.value.toUpperCase();">

			<label for="">Email:</label>
			<input type="email" name="teamemail" placeholder="Enter Email"  id="teamemail" onkeyup="this.value=this.value.toUpperCase();">
			
			<label for="">No Of Members:</label>
			<input type="number" name="memberQty" class="qty" id="qty"><span><button type="button" name="addMember" id="add" style="border-radius: 6px"><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button> </span>
			</p>
			<!-- <div id="hiddeninput"></div> -->
			<br>
			<div class="second" id="teamTable">
				<table class="teamT" id="teamT">
					<thead>
						<tr><th>title</th><th>Name</th><th>NIC</th><th>Address1</th><th>Address2</th><th>Mobile</th><th>Email</th></tr>
					</thead>
					<tbody id="teamTbody">
						
					</tbody>

				 </table>

			</div>  <!-- 2nd -->
			<br>

			
<br>	</div> <!-- 1st -->
		
					<p>			
					<button type="submit" name="submit2" class="sub x" id="subD" ><i class="fas fa-clipboard-list"></i><!-- a href="../donationManagement/donation_add.php"> --> Add Donation </button>
					
					</p>

			

		
	</fieldset>
	</form>
</div>  <!-- donorTeamInfo -->

<!-- </div> COMMON DIV -->


<!-- Modal -->
<div class="modal fade" id="exampleModald1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit Donor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_viewd"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update1">Update</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModald2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit Donor Team</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_viewdT"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update2">Update</button>
      </div>
    </div>
  </div>
</div>




	<div class="reserveinfo clearfix" id = "donation">

	<form action="" method="post" id = "itemlistd">
	<div id = "mainFormResultD"></div>
		<fieldset class="reserve">
			<legend>Donations</legend>
			<div class="reservation " id="donation">
				<br>
			<div class="donorDetailfirst" id="donorDetailfirst" style="display:block ;">
				
				<table class="teamTDm">
					<thead>
					<tr> <th>Name</th><th>NIC</th> <th>Address-L1</th><th>Address-L2</th> <th>Contact</th><th>Email</th><th></th></tr>
					
					</thead>
					<tbody id="append">
						

					</tbody>
					<tr></tr>
					

				</table> <!-- persontable -->
				
			</div> <!-- donordetailfirst -->

			<div class="teamDetails" id="teamDetails" style="display:none;">
				
				<table class="teamTDm" id="teamDetail">
					
					<!-- <thead> <tr>  <th>Team Name:</th>  </tr></thead> -->
						<thead><tr><th style="display: none;">ID</th><th>Mem Name</th> <th>NIC</th>  <th>Contact</th>  <th> Email</th> <th>Address-L1</th> <th>Address-L2</th> </tr>
					 </thead> 
					<tbody id="appendTeam"> </tbody><!-- display data -->
						<tr></tr>

				</table> <!-- teamtable -->
				
			</div> <!-- teamDetails -->
<br><br>

			<div class="selectBox" onclick="showCheckboxes()">
				<label>Item Type:</label>
     				<select name="type[]"  id="ItemType2" class="ItemType" >
        				<option>Select an option</option>
      				</select>
      				<div class="overSelect"></div>	
   			</div>				
   						
			   <div id="checkboxes">
      						<label for="SC">
        						<input type="checkbox" class="SelectItem" id="SC" data-bs-toggle="modal" data-bs-target="#modalDialog" name ="sc"/>Surgical Consum:</label>
     						 <label for="SI">
        						<input type="checkbox" class="SelectItem" id="SI" data-bs-toggle="modal" data-bs-target="#modalDialog1" name ="si" />Surgical Items</label>
      						<label for="CI">
       						 <input type="checkbox" class="SelectItem" id="CI"  data-bs-toggle="modal" data-bs-target="#modalDialog2" name ="ci"/>Consumable Items</label>
       						 <label for="DR">
       						 <input type="checkbox" class="SelectItem" id="DR" data-bs-toggle="modal" data-bs-target="#modalDialog3" name ="dr"/>Drugs</label>
       						 <label for="GI">
       						 <input type="checkbox"  class="SelectItem"id="GI" data-bs-toggle="modal" data-bs-target="#modalDialog4" name ="gi" />General Items</label>
       						 <label for="FD">
       						 <input type="checkbox" class="SelectItem" id="FD"  data-bs-toggle="modal" data-bs-target="#modalDialog5" name ="fd"/>Foods</label>
    						</div>
			</p>
			
		<div class=" itemTypeWrapper" >
			<div id="modalDialog" class="modal hide fade" role="dialog" aria-hidden="true" >
				<div class="modal-dialog">
					<div class="modal-content animate-top Items" id="SCDIV">
						<div class="modal-header">
							<h4 class="modal-title"> Surgical Consumable</h4>
								<button type="button" class="btn btn-danger btn-xs" id="c1" data-dismiss="modal" aria-label="Close"> 
									<i class="fas fa-times"></i></button>
						</div>
						<div class="modal-body" >
								<div id="sc">
							<form action="" method="post" id="SCFRM">
								<div id="response1"></div>
								
								<table class="ItemTw" id="all">
									<tr>
									<td>	
									<p>
									
									<!-- <label for="" class="numbr">No Of Items:</label>
									<input type="number" name="Items" class="qty" id="qtyI">
									<button type="button"  name="add" id="addI" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br> -->
									<table class="table table-bordered ItemT" id="ItemT">
									<thead>
									<!-- <select class="select2" name="itemsc" id ="itemselectsc" onkeyup="this.value=this.value.toUpperCase();" multiple="multiple" onchange="selectitemname();"> <?php echo getsc();?> </select> -->
									<!-- <br> -->
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI" class="addI" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									<!-- multiple="multiple" -->
									<tbody id="ItemTbody">
									
									</tbody>
										
									 </table>
									
				 					</td></tr>
									 <a  href="../addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i> Add New Item</a>
				 					</table>
								</div></div>
								<div id="scdv" ></div>
								<div class="modal-footer">
									<input type="hidden" name="row_id" id="hidden_row_id" value="hidden_row_id" class="testing">
									<button type="button"  id="item_save1" class="sub T" name="scbtn">add to list
									</button>
								</div>
							</form>  <!--  SCFRM -->
						</div>
				</div>
			</div>
			


	<div id="modalDialog1" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content Items" id="SIDIV">
				<div class="modal-header">
					<h4 class="modal-title"> Surgical Items</h4>
					<button type="button" class="btn btn-danger btn-xs" id="c2" data-dismiss="modal" aria-label="Close"> 
						<i class="fas fa-times"></i></button>
				</div>
				
					<div class="modal-body" >
					
					<div id="si" style = "display:block;">
						<form method="post" id="SIFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
			 
				<table class="table table-bordered ItemT" id="ItemT1">
									<thead>
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI1" class="addI1" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									
									<tbody id="ItemTbody1">
									
									</tbody>
										
									 </table>
				 </td></tr>
				 <a  href="../addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i>Add New Item</a>
				 </table>

					</div></div>
					<div id="sidv" ></div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id2" value="hidden_row_id2" class="testing2">
						<button type="button" id="item_save2" class="sub x">add to list</button></div>
				</form>  <!--  SIFRM -->
			</div>
			</div>
		</div>
			


		 <div id="modalDialog2" class="modal fade" >
			<div class="modal-dialog">
			<div class="modal-content animate-top Items" id="CIDIV">
				<div class="modal-header">
					<h4 class="modal-title"> Consumable Items</h4>
					<button type="button" class="btn btn-danger btn-xs" id="c3" data-dismiss="modal" aria-label="Close"> 
						<i class="fas fa-times"></i></button>
				</div>
				
					<div class="modal-body" >
					<div id="ci">
						<form action="" method="post" id="CIFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
				
				<table class="table table-bordered ItemT" id="ItemT2">
									<thead>
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI" class="addI2" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									
									<tbody id="ItemTbody2">
									
									</tbody>
										
									 </table>
				 </td></tr>
				 <a  href="../addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i></a>
				 </table>
					</div></div>
					<div id="cidv" ></div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id3" value="hidden_row_id3" class="testing3">
						<button type="button" id="item_save3" class="sub x">add to list</button></div>
				</form>   
			</div>
		</div>
	</div> 

		<div id="modalDialog3" class="modal fade" >
			<div class="modal-dialog">
			<div class="modal-content animate-top Items" id="DRDIV">
				<div class="modal-header">
					<h4 class="modal-title"> Drugs</h4>
					<button type="button" class="btn btn-danger btn-xs" id="c4" data-dismiss="modal" aria-label="Close"> 
						<i class="fas fa-times"></i></button>
				</div>
				
					<div class="modal-body">
					<div id="dr">
						<form method="post" id="DRFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
						<table class="table table-bordered ItemT" id="ItemT3">
									<thead>
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI" class="addI3" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									
									<tbody id="ItemTbody3">
									
									</tbody>
										
									 </table>
				 </td></tr>
				 <a  href="../addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i>Add New Item</a>
				 </table>
					</div></div>
					<div id="drdv" ></div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id4" value="hidden_row_id4" class="testing4">
						<button type="button" id="item_save4" class="sub x">add to list</button></div>
				</form>  <!--  DRFRM -->
			</div>
		</div>
	</div>

		<div id="modalDialog4" class="modal fade">
			<div class="modal-dialog">
			<div class="modal-content animate-top Items" id="GIDIV">
				<div class="modal-header">
					<h4 class="modal-title"> General Items</h4>
					<button type="button" class="btn btn-danger btn-xs" id="c5" data-dismiss="modal" aria-label="Close"> 
						<i class="fas fa-times"></i></button>
				</div>
				
					<div class="modal-body">
					<div id="gi">
						<form action="" method="post" id="GIFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
						<table class="table table-bordered ItemT" id="ItemT4">
									<thead>
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI" class="addI4" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									
									<tbody id="ItemTbody4">
									
									</tbody>
										
									 </table>
				 </td></tr>
				 <a  href="../addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i>Add New Item</a>
				 </table>
					</div></div>
					<div id="gidv" ></div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id5" value="hidden_row_id5" class="testing5">
						<button type="button" id="item_save5" class="sub x">add to list</button></div>
				</form>  <!--  GIFRM -->
			</div>
		</div>
	</div>
			

			<div id="modalDialog5" class="modal fade" >
				<div class="modal-dialog">
			<div class="modal-content animate-top Items" id="FDDIV">
				<div class="modal-header">
					<h4 class="modal-title">Foods</h4>
					<button type="button" class="btn btn-danger btn-xs" id="c6" data-dismiss="modal" aria-label="Close"> 
						<i class="fas fa-times"></i></button>
				</div>
				
					<div class="modal-body" >
					<div id="fd">
						<form action="" method="post" id="FDFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
						<table class="table table-bordered ItemT" id="ItemT5">
									<thead>
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI" class="addI5" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									
									<tbody id="ItemTbody5">
								
									</tbody>
										
									 </table>
				 </td></tr>
				 <a  href="../addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i>Add New Item</a>
				 </table>
					</div></div>
					<div id="fddv"></div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id6" value="hidden_row_id6" class="testing6">
						<button type="button" id="item_save6" class="sub x">add to list</button></div>
				</form>  <!--  FDFRM -->
			</div>
		</div>
	</div>
</div>


	
	<br>
	
		
			<!-- <p class="res">
				<label for="">Resr. Date:</label>
				<input type="date" name="donate">
			</p> -->
			</div>	
			<!-- listsecnd -->

		<table class="Itemlist" id = "listtable" >
			<thead>
			<tr> 
				<th>code</th>
				<th style ="display:none ;">item code</td>
				<th>item name</td>
				<th>item qty</td>
				<th>description</td>
			</tr></thead>
			<tbody id="itemTable">		
			</tbody>
			<tbody id="itemTable1">		
			</tbody>
			<tbody id="itemTable2">		
			</tbody>
			<tbody id="itemTable3">		
			</tbody>
			<tbody id="itemTable4">		
			</tbody>
			<tbody id="itemTable5">		
			</tbody>	
		</table>
		<br>
<p>
<button Type="submit" id="Lsaved" class="sub" name = "submit" value = "submit">Save</button>
</p>


			</div>  <!-- reservation -->
			<br>
			
		</fieldset>
		</form>
	</div>  <!-- reserveinfo -->
	
					
	</div>  <!-- wrap -->	
	


</body>
</html>
<!-- adding input fields according to input number -->



<!-- check for donor team -->
<script>
	// $(".select2").select2();
	$(document).ready(function(){
		
		var count = 0;
		$(document).on('click', '.addI', function(){
count = count + 1;
var html ='';
html += '<tr id = "row'+count+'">';
html += '<td><select class="ItemTinput sty " name="itemsc" id ="itemsc'+count+'">  <option>Select Item</option> <?php echo getsc();?>  </select> </td> 	';
html += '<td><input class="ItemTinputQ qty" type="number" name="qtyn[]" min=0/></td>';
html += '<td class="itemDes"><input class="ItemTdes sty" name="des[]"  onkeyup="this.value=this.value.toUpperCase();"/></td>';
html += '<td><button type="button" name="remove"  class="btn btn-danger btn-sm btn_removeI">X</button><span class="glyphicon glyphicon-minus></span></td></tr>';

$('#ItemTbody').append(html);
	
});

// $('.sselect2').select2();

$(document).on('click', '.btn_removeI', function(){
	$(this).closest('tr').remove();
});

// SURGICAL ITEM ADDING

$(document).on('click', '.addI1', function(){
	var html ='';
	html += '<tr>';
	html += '<td><select class="ItemTinput2 sty" name="item[]"><option value ="">Select Item</option> <?php echo getsi();?> </select></td>';
	html += '<td><input class="ItemTinputQ2 qty" type="number" name="qtyn[]" min=0/></td>';
	html += '<td class="itemDes"><input class="ItemTdes2 sty" name="des[]"  onkeyup="this.value=this.value.toUpperCase();"/></td>';
	html += '<td><button type="button" name="remove"  class="btn btn-danger btn-sm btn_removeI2">X</button><span class="glyphicon glyphicon-minus></span></td></tr>';
	$('#ItemTbody1').append(html);
	});
	
	
	
	$(document).on('click', '.btn_removeI2', function(){
		$(this).closest('tr').remove();
	});
	



// CONSUMABLE ITEM ADDING
$(document).on('click', '.addI2', function(){
	var html ='';
	html += '<tr>';
	html += '<td><select class="ItemTinput3 sty" name="item[]"><option value ="">Select Item</option> <?php echo getci();?> </select></td>';
	html += '<td><input class="ItemTinputQ3 qty" type="number" name="qtyn[]" min=0/></td>';
	html += '<td class="itemDes"><input class="ItemTdes3 sty" name="des[]"  onkeyup="this.value=this.value.toUpperCase();"/></td>';
	html += '<td><button type="button" name="remove"  class="btn btn-danger btn-sm btn_removeI3">X</button><span class="glyphicon glyphicon-minus></span></td></tr>';
	$('#ItemTbody2').append(html);
	});
	
	
	
	$(document).on('click', '.btn_removeI3', function(){
		$(this).closest('tr').remove();
	});
	



// DRUGS ADDING
$(document).on('click', '.addI3', function(){
	var html ='';
	html += '<tr>';
	html += '<td><select class="ItemTinput4 sty" name="item[]"> <option value ="">Select Item</option> <?php echo getdr();?> </select></td>';
	html += '<td><input class="ItemTinputQ4 qty" type="number" name="qtyn[]" min=0/></td>';
	html += '<td class="itemDes"><input class="ItemTdes4 sty" name="des[]"  onkeyup="this.value=this.value.toUpperCase();"/></td>';
	html += '<td><button type="button" name="remove"  class="btn btn-danger btn-sm btn_removeI4">X</button><span class="glyphicon glyphicon-minus></span></td></tr>';
	$('#ItemTbody3').append(html);
	});
	
	
	
	$(document).on('click', '.btn_removeI4', function(){
		$(this).closest('tr').remove();
	});
	

// GENERAL ITEM ADDING
$(document).on('click', '.addI4', function(){
	var html ='';
	html += '<tr>';
	html += '<td><select class="ItemTinput5 sty" name="item[]"><option value ="">Select Item</option> <?php echo getgi();?> </select></td>';
	html += '<td><input class="ItemTinputQ5 qty" type="number" name="qtyn[]" min=0/></td>';
	html += '<td class="itemDes"><input class="ItemTdes5 sty" name="des[]"  onkeyup="this.value=this.value.toUpperCase();"/></td>';
	html += '<td><button type="button" name="remove"  class="btn btn-danger btn-sm btn_removeI5">X</button><span class="glyphicon glyphicon-minus></span></td></tr>';
	$('#ItemTbody4').append(html);
	});
	
	
	
	$(document).on('click', '.btn_removeI5', function(){
		$(this).closest('tr').remove();
	});
	


// FOODS ADDING
$(document).on('click', '.addI5', function(){
	var html ='';
	html += '<tr>';
	html += '<td><select class="ItemTinput6 sty" name="item[]"><option value ="">Select Item</option> <?php echo getfd();?> </select></td>';
	html += '<td><input class="ItemTinputQ6 qty" type="number" name="qtyn[]" min=0/></td>';
	html += '<td class="itemDes"><input class="ItemTdes6 sty" name="des[]"  onkeyup="this.value=this.value.toUpperCase();"/></td>';
	html += '<td><button type="button" name="remove"  class="btn btn-danger btn-sm btn_removeI6">X</button><span class="glyphicon glyphicon-minus></span></td></tr>';
	$('#ItemTbody5').append(html);
	});
	
	
	
	$(document).on('click', '.btn_removeI6', function(){
		$(this).closest('tr').remove();
	});
	
	//$.fn.modal.Constructor.prototype.enforceFocus = $.noop;

	$(".select2").select2({
		// placeholder: 'Select Item Name',
		dropdownParnt: $("#modalDialog"),
		width:'100%',
		
		theme: 'bootstrap4',
		tags: true
		
	}).on('select2:close', function(){
		var element = $(this);
		var new_opt = $.trim(element.val());
		var type = "SC";

		if(new_opt != '')
		{
			$.ajax({
				url:"/HospitalDonation/controller/selectitem.php",	
				method:"POST",
				data:{selct_new:new_opt,
					typecd:type},
				success: function(data)
				{
					if(data == 'yes')
					{
						element.append('<option value = "'+new_opt+'">'+new_opt+'</option>').val(new_opt);
					}
				}
			});
		}
	});

});

</script>


		
<script src="../../assets/js/scriptD.js"></script> 
<script src="../../assets/js/script2.js"></script> 




