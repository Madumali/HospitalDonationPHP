<?php

require_once('../../header.php');
// require_once('../model/Donor/TempDonorAdd.php');


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reserve Donors Management</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../../assets/css/menu.css">  <!-- main css -->
	<link rel="stylesheet" href="../../fontawesome/css/all.css">   <!-- fontawesome css -->
	<script src="../../assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>
	<script src="../../assets/js/bootstrap.js"></script>
	<!-- MULTISELECT CSS N JS LIBRARY -->
	<!-- <link rel="stylesheet" href="../../assets/css/multiselect.css">
	<script src="multiselect.min.js"></script> -->
	
</head>
<body>
	<header>
	 <!-- <div class="appname"> Donor Management </div>    appname -->	

	</header>
	<div class="wrap clearfix">
		<!-- <div class="COMMON clearfix"> -->
		<p class="check">
						
						<input  type="checkbox" name="active2" id="active2" value="active2" >
						<label for="active2">Donor Team/Company</label>
		</p>     <!-- if not one person tick checkbox -->

	<!-- for a single person -->
	<div class="donorinfo clearfix" id="tempdonorinfo" style="display:block ;" >
		<form action="" method="post" id="addTempPerson">
			
			<div id="resultP2"></div>
			
		<fieldset class="dperson">
			<legend>Donor Information</legend>

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
				<input type="text" name="donor_name" placeholder="Enter Donor Name" id="tempdonorName" >
				</p>
				
				<p>
				<input type="text" name="donor_nic" placeholder="Enter National Identity " id="tempdonorNic">
				<span id = "tempnic"></span>
				</p>
				
				<p>
				<input type="text" name="donor_address1" placeholder="Enter Address Line1" id="tempaddressLine1">
				<br><br>
				<input type="text" name="donor_address2" placeholder="Enter Address Line2" id="tempaddressLine2">
				</p>
				
				
				<p>
				<input type="text" name="donor_mobile" placeholder="Enter Contact Number " id="tempdonorMobile" maxlength = 10>
				<span id = "mobile"></span>
				<br> <br>
				<input type="text" name="donor_mobile2" placeholder="Enter Contact Number " id="tempdonorMobile2"  maxlength = 10>
				<span id = "mobile2"></span>
				</p>
				
				<p>
				<input type="text" name="donor_email" placeholder="Enter Email" id="tempdonorEmail">
				<span id = "emailMsgT"></span>
				</p>
				<br>
				
				<br>
				<p>
					<button type="submit" name="submitR1" class="sub" id="subR1" ><i class="fas fa-calendar-plus"></i> Add Reservation</button>
					
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

<div class="donorTeamInfo" 	id="donorTeamInfo2" style ="display:none ;">
	<form action="" method="post" id="addTempTeam" class="teamForm">
		
		<div id="resultT2"></div>
	<fieldset class="team">
		<legend>Donor Team/Company</legend>
		<div class="first" id="firstR">
			<p>
			<label for="">T/C Name:</label>
			<input type="text" name="teamName[]" placeholder="Enter Team Name"  id="tempteamName">

			
			<label for="">No Of Members:</label>
			<input type="number" name="memberQty" class="qty" id="qtyR"><span><button type="button" name="addMember" id="addR" style="border-radius: 6px"><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button> </span>
			</p>
			<!-- <div id="hiddeninput"></div> -->
			<br>
			<div class="second" id="teamTable">
				<table class="teamT" id="teamT2">
					<thead>
						<tr><th>Name</th><th>NIC</th><th>Address1</th><th>Address2</th><th>Mobile</th><th>Email</th></tr>
					</thead>
					<tbody id="teamTbody2">
						
					</tbody>

				 </table>

			</div>  <!-- 2nd -->
			<br>

			
<br>	</div> <!-- 1st -->
		
					<p>			
		
					<button type="submit" name="submitR2" class="sub" id="subR2" value="submitR2"><i class="fas fa-calendar-plus"></i>  Add Reservation </button>
					</p>

			

		
	</fieldset>
	</form>
</div>  <!-- donorTeamInfo -->

<!-- </div> COMMON DIV -->


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit Donor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_view"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit Donor Team</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_viewT"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>



	<div class="reserveinfo clearfix" id ="reserve">

	<form action="" method="post" id = "itemlist">
	<div id = "mainFormResult"></div>
		<fieldset class="reserve">
			<legend>Donation Reservations</legend>
			<div class="reservation clearfix" id="reservation">
				<br>
			<div class="donorDetailfirst" id="donorDetailfirst2" style="display:block ;">
				
				<table class="teamTDm">
					<thead>
					<tr> <th>Name</th><th>NIC</th> <th>Address-L1</th><th>Address-L2</th> <th>Contact</th><th>Email</th></tr>
					
					</thead>
					<tbody id="appendR">
					</tbody>
					<tr></tr>
				</table> <!-- persontable -->
				
			</div> <!-- donordetailfirst -->

			<div class="teamDetails" id="teamDetails2" style="display:none;">
				<table class="teamTDm" id="teamDetail">
						<thead><tr><th>Mem Name</th> <th>NIC</th>  <th>Contact</th>  <th> Email</th> <th>Address-L1</th> <th>Address-L2</th> </tr>
					 	</thead> 
				<tbody id="appendTempTeam"> </tbody><!-- display data -->
				</table> <!-- teamtable -->	
			</div> <!-- teamDetails -->

			<p>
			
				
			<div class="selectBox" onclick="showCheckboxes()">
				<label for="">Item Type:</label>
     				<select name="type[]"  id="ItemType2" class="ItemType" >
        				<option>Select an option</option>
      				</select>
      				<div class="overSelect"></div>	
   			</div>				
   						
   						 <div id="checkboxes">
      						<label for="SC">
        						<input type="checkbox" class="SelectItem" id="SC" data-bs-toggle="modal" data-bs-target="#modalDialog"/>Surgical Consum:</label>
     						 <label for="SI">
        						<input type="checkbox" class="SelectItem" id="SI" data-bs-toggle="modal" data-bs-target="#modalDialog1" />Surgical Items</label>
      						<label for="CI">
       						 <input type="checkbox" class="SelectItem" id="CI"  data-bs-toggle="modal" data-bs-target="#modalDialog2"/>Consumable Items</label>
       						 <label for="DR">
       						 <input type="checkbox" class="SelectItem" id="DR" data-bs-toggle="modal" data-bs-target="#modalDialog3" />Drugs</label>
       						 <label for="GI">
       						 <input type="checkbox"  class="SelectItem"id="GI" data-bs-toggle="modal" data-bs-target="#modalDialog4" />General Items</label>
       						 <label for="FD">
       						 <input type="checkbox" class="SelectItem" id="FD"  data-bs-toggle="modal" data-bs-target="#modalDialog5"/>Foods</label>
    						</div>
			</p>
			
		<div class=" itemTypeWrapper" >
			<div id="modalDialog" class="modal fade" >
				<div class="modal-dialog">
					<div class="modal-content animate-top Items" id="SCDIV">
						<div class="modal-header">
							<h4 class="modal-title"> Surgical Consumable</h4>
								<button type="button" class="btn btn-danger btn-xs" id="c1" data-dismiss="modal" aria-label="Close"> 
									<i class="fas fa-times"></i></button>
						</div>
						<div class="modal-body" id="scdv">
							<form action="" method="post" id="SCFRM">
								<div id="response1"></div>

								<table class="ItemTw" id="all">
									<tr>
									<td>	
									<p>
				
									<label for="" class="numbr">No Of Items:</label>
									<input type="number" name="Items" class="qty" id="qtyI">
									<button type="button"  name="add" id="addI" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br>
									<table class="ItemT" id="ItemT">
									<thead>
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th></tr>
									</thead>
									
									<tbody id="ItemTbody">
									<tr>
							<!-- <td><input type="text"  class="ItemTinput"></td> <td><input type="number"  class="ItemTinputQ"></td> <td><input type="text" name="des[]" class="ItemDes"></td> -->
									</tr>
									</tbody>
										
									 </table>
				 					</td></tr>
				 					</table>
								</div>
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
				
					<div class="modal-body"  id="sidv">
						<form action="" method="post" id="SIFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
				<label for="" class="numbr">No Of Items:</label>
				<input type="number" name="Items" class="qty" id="qtyI1">
				<button type="button"  name="add" id="addI1" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br>
				<table class="ItemT" id="ItemT">
					<thead>
						<tr><th>Item Name</th><th>Quantity</th><th>Description</th></tr>
					</thead>
					<tbody id="ItemTbody1">
						
					</tbody>

				 </table>
				 </td></tr>
				 </table>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id2" value="hidden_row_id2">
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
				
					<div class="modal-body" id="cidv">
						<form action="" method="post" id="CIFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
				<label for="" class="numbr">No Of Items:</label>
				<input type="number" name="Items" class="qty" id="qtyI2">
				<button type="button"  name="add" id="addI2" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br>
				<table class="ItemT" id="ItemT">
					<thead>
						<tr><th>Item Name</th><th>Quantity</th><th>Description</th></tr>
					</thead>
					<tbody id="ItemTbody2">
						
					</tbody>

				 </table>
				 </td></tr>
				 </table>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id3" value="hidden_row_id3">
						<button type="button" id="item_save3" class="sub x">add to list</button></div>
				</form>  <!--  CIFRM -->
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
				
					<div class="modal-body" id="drdv">
						<form action="" method="post" id="DRFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
				<label for="" class="numbr">No Of Items:</label>
				<input type="number" name="Items" class="qty" id="qtyI3">
				<button type="button"  name="add" id="addI3" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br>
				<table class="ItemT" id="ItemT">
					<thead>
						<tr><th>Item Name</th><th>Quantity</th><th>Description</th></tr>
					</thead>
					<tbody id="ItemTbody3">
						
					</tbody>

				 </table>
				 </td></tr>
				 </table>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id4" value="hidden_row_id4">
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
				
					<div class="modal-body" id="gidv">
						<form action="" method="post" id="GIFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
				<label for="" class="numbr">No Of Items:</label>
				<input type="number" name="Items" class="qty" id="qtyI4">
				<button type="button"  name="add" id="addI4" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br>
				<table class="ItemT" id="ItemT">
					<thead>
						<tr><th>Item Name</th><th>Quantity</th><th>Description</th></tr>
					</thead>
					<tbody id="ItemTbody4">
						
					</tbody>

				 </table>
				 </td></tr>
				 </table>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id5" value="hidden_row_id5">
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
				
					<div class="modal-body" id="fddv">
						<form action="" method="post" id="FDFRM">
						<div class="response"></div>

						<table class="ItemTw">
						<tr>
						<td>	
						<p>
				
				<label for="" class="numbr">No Of Items:</label>
				<input type="number" name="Items" class="qty" id="qtyI5">
				<button type="button"  name="add" id="addI5" class="addI" style="border-radius: 6px"><i class="fas fa-plus-circle" id="addM" style="color: green"></i></button> </p><br>
				<table class="ItemT" id="ItemT">
					<thead>
						<tr><th>Item Name</th><th>Quantity</th><th>Description</th></tr>
					</thead>
					<tbody id="ItemTbody5">
						
					</tbody>

				 </table>
				 </td></tr>
				 </table>

					</div>
					<div class="modal-footer">
						<input type="hidden" name="row_id" id="hidden_row_id6" value="hidden_row_id6">
						<button type="button" id="item_save6" class="sub x">add to list</button></div>
				</form>  <!--  FDFRM -->
			</div>
		</div>
	</div>
</div>


	
	<br>
	
		
			<p class="res">
				<label for="">Resr. Date:</label>
				<input type="date" name="reserve">
			</p>
			</div>	
			<!-- listsecnd -->

		<table class="Itemlist" >
			<thead>
			<tr> 
				<th>code</th>
				<th>item name</td>
				<th>item qty</td>
				<th>description</td>
			</tr></thead>
			<tbody id="itemTable">		
			</tbody>	
		</table>
		<br>
		
		

			
	

<p>
<button Type="submit" id="Lsave" class="sub" name = "submit" value = "submit">Save</button>
</p>
</div>  <!-- reservation -->
			
</fieldset>
		</form>
	</div>  <!-- reserveinfo -->					
</div>  <!-- wrap -->	
	


</body>
</html>

<!-- donorItems -->





<script>
$(document).ready(function(){
	
	$('#addI').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyI").val(),10);

		if(requested>=count){
			$('#ItemTbody').empty();
			for(r=count;r<requested;r++){

			var $ctr=$('<tr id="rowB'+r+'"><td><input class="ItemTinput sty" name="item[]" id="Im'+r+'"/></td> <td><input class="ItemTinputQ styq" type="number" name="qtyn[]" id="Iq'+r+'"/></td> <td class="itemDes"><input class="ItemTdes sty" name="des[]" id="Id'+r+'"/></td> <td><button type="button" name="remove" id="'+r+'" class="btn btn-danger btn_removeI">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#ItemTbody').append($ctr);
				
				}

		} else if(requested<count){

			var x =requested-1;
			$('#ItemTbody input:gt("+x+")').remove();     
		}
		});
	
	$(document).on('click', '.btn_removeI', function(){
		var button_id = $(this).attr("id"); 
		$('#rowB'+button_id+'').remove();
	});

	// SURGICAL ITEM ADDING

	$('#addI1').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyI1").val(),10);

		if(requested>=count){
			$('#ItemTbody1').empty();
			for(s=count;s<requested;s++){

			var $ctr=$('<tr id="rowR'+s+'"><td><input class="ItemTinput2 sty" name="itmn[]"/></td> <td><input class="ItemTinputQ2 styq" type="number"/></td> <td><input class="ItemTdes2 sty"/></td> <td><button type="button" name="remove" id="'+s+'" class="btn btn-danger btn_remove7">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#ItemTbody1').append($ctr);
				
				}

		} else if(requested<count){

			var x =requested-1;
			$('#ItemTbody1 input:gt("+x+")').remove();     
		}
		});
	
	$(document).on('click', '.btn_remove7', function(){
		var button_id = $(this).attr("id"); 
		$('#rowR'+button_id+'').remove();
	});


// CONSUMABLE ITEM ADDING

$('#addI2').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyI2").val(),10);

		if(requested>=count){
			$('#ItemTbody2').empty();
			for(r=count;r<requested;r++){

			var $ctr=$('<tr id="rowP'+r+'"><td><input class="ItemTinput3 sty"/></td> <td><input class="ItemTinputQ3 styq" type="number"/></td> <td><input class="ItemTdes3 sty"/></td> <td><button type="button" name="remove" id="'+r+'" class="btn btn-danger btn_remove3">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#ItemTbody2').append($ctr);
				
				}

		} else if(requested<count){

			var x =requested-1;
			$('#ItemTbody2 input:gt("+x+")').remove();     
		}
		});
	
	$(document).on('click', '.btn_remove3', function(){
		var button_id = $(this).attr("id"); 
		$('#rowP'+button_id+'').remove();
	});


	// DRUGS ADDING

	$('#addI3').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyI3").val(),10);

		if(requested>=count){
			$('#ItemTbody3').empty();
			for(r=count;r<requested;r++){

			var $ctr=$('<tr id="rowY'+r+'"><td><input class="ItemTinput4 sty"/></td> <td><input class="ItemTinputQ4 styq" type="number"/></td> <td><input class="ItemTdes4 sty"/></td> <td><button type="button" name="remove" id="'+r+'" class="btn btn-danger btn_remove4">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#ItemTbody3').append($ctr);
				
				}

		} else if(requested<count){

			var x =requested-1;
			$('#ItemTbody3 input:gt("+x+")').remove();     
		}
		});
	
	$(document).on('click', '.btn_remove4', function(){
		var button_id = $(this).attr("id"); 
		$('#rowY'+button_id+'').remove();
	});

	// GENERAL ITEM ADDING

	$('#addI4').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyI4").val(),10);

		if(requested>=count){
			$('#ItemTbody4').empty();
			for(r=count;r<requested;r++){

			var $ctr=$('<tr id="rowW'+r+'"><td><input class="ItemTinput5 sty"/></td> <td><input class="ItemTinputQ5 styq" type="number"/></td> <td><input class="ItemTdes5 sty"/></td> <td><button type="button" name="remove" id="'+r+'" class="btn btn-danger btn_remove5">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#ItemTbody4').append($ctr);
				
				}

		} else if(requested<count){

			var x =requested-1;
			$('#ItemTbody4 input:gt("+x+")').remove();     
		}
		});
	
	$(document).on('click', '.btn_remove5', function(){
		var button_id = $(this).attr("id"); 
		$('#rowW'+button_id+'').remove();
	});

	// FOODS ADDING

	$('#addI5').click(function(){
		
		var count=$("#dynamicfield input").size();
		var requested=parseInt($("#qtyI5").val(),10);

		if(requested>=count){
			$('#ItemTbody5').empty();
			for(r=count;r<requested;r++){

			var $ctr=$('<tr id="rowK'+r+'"><td><input class="ItemTinput6 sty"/></td> <td><input class="ItemTinputQ6 styq" type="number"/></td> <td><input class="ItemTdes6 sty"/></td> <td><button type="button" name="remove" id="'+r+'" class="btn btn-danger btn_remove6">X</button></td></tr>').attr({
					type:'text'
				});
				
                $('#ItemTbody5').append($ctr);
				
				}

		} else if(requested<count){

			var x =requested-1;
			$('#ItemTbody5 input:gt("+x+")').remove();     
		}
		});
	
	$(document).on('click', '.btn_remove6', function(){
		var button_id = $(this).attr("id"); 
		$('#rowK'+button_id+'').remove();
	});



	//when user click outside of the popup close it
//$(document).ready(function(){

	// $('#SCDIV').dialog({
	// 	//autoOpen:false,
	// 	width:400
	// });

	// $('#SC').click(function(){
	// 	$('#user_dialog').dialog('option', 'title', 'checkboxesAdd');
	// 	$('#user_dialog').dialog('open');


	// });

	//GET THE MODAL

	// var modal = $('#modalDialog');
	// //GET THE CHECKBOX THAT OPENS MODAL
	// var chk = $('#SC');
	// //GET THE SPAN THT CLOSE MODAL
	// var span = $('#c1');									
	$('#SC').on('click', function(){
		$('#item_save1').text('save');
		$('#modalDialog').modal('show');
	});
	$('#c1').on('click', function(){
		$('#modalDialog').modal('hide');				
	});

	$('body').on('click', function(e){
		if($(e.target).hasClass("modal"))
		{
			$('#modalDialog').modal('hide');
		}
	});



	
	$('#SI').on('click', function(){
		$('#item_save2').text('save');
		$('#modalDialog1').modal('show');
	});
	$('#c2').on('click', function(){
		$('#modalDialog1').modal('hide');				
	});

	$('body').on('click', function(e){
		if($(e.target).hasClass("modal"))
		{
			$('#modalDialog1').modal('hide');
		}
	});

	var modal2 = $('#modalDialog2');
	//GET THE CHECKBOX THAT OPENS MODAL
	var chk2 = $('#CI');
	//GET THE SPAN THT CLOSE MODAL
	var span2 = $('#c3');
	$('#CI').on('click', function(){
		$('#item_save3').text('save');
		$('#modalDialog2').modal('show');
	});
	$('#c3').on('click', function(){
		$('#modalDialog2').modal('hide');				
	});


	$('body').on('click', function(e){
		if($(e.target).hasClass("modal"))
		{
			$('#modalDialog2').modal('hide');
		}
	});

	
	$('#DR').on('click', function(){
		$('#item_save4').text('save');
		$('#modalDialog3').modal('show');
	});
	$('#c4').on('click', function(){
		$('#modalDialog3').modal('hide');				
	});


	$('body').on('click', function(e){
		if($(e.target).hasClass("modal"))
		{
			$('#modalDialog3').modal('hide');
		}
	});

	
	$('#GI').on('click', function(){
		$('#item_save5').text('save');
		$('#modalDialog4').modal('show');
	});
	//WHEN USER CLICKS ON SPAN CLOSE MODAL
	$('#c5').on('click', function(){
		$('#modalDialog4').modal('hide');				
	});


	$('body').on('click', function(e){
		if($(e.target).hasClass("modal"))
		{
			$('#modalDialog4').modal('hide');
		}
	});


	
	$('#FD').on('click', function(){
		$('#item_save6').text('save');
		$('#modalDialog5').modal('show');
	});
	$('#c6').on('click', function(){
		$('#modalDialog5').modal('hide');				
	});


	$('body').on('click', function(e){
		if($(e.target).hasClass("modal"))
		{
			$('#modalDialog5').modal('hide');
		}
	});


});





</script>

		
<script src="../../assets/js/script.js"> </script>

<script src="../../assets/js/script2.js"> </script> 
	

<!-- 
// 	$(document).ready(function(){
// 		$("#active").click("touchstart",function(){
// 			$("#donorinfo,#donorTeamInfo").toggle();
			
// 		});

//  $(".third").click(function(e){

// 	e.preventDefault();
	
// });

//  // $("#sub").click(function(e){
 
// // 	e.stopPropagation();
	
// // });
// 	});
 -->


<!-- 
					$sqlI = "SELECT * FROM `itemtype` ORDER BY`type_id`";
					$resultI = mysqli_query($con,$sqlI);	
					if($resultI->num_rows > 0){
					while($rowI=mysqli_fetch_assoc($resultI))
					{
					$code = $rowI['type_code'];
					$name = $rowI['type_name'];
					echo "<option value=$code> $name</br></option>";

					}
					}	


				
				</select> -->
