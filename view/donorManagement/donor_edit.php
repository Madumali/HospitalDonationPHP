<?php 

require_once('../../header.php')


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>

	<link rel="stylesheet" href="../../assets/css/bootstrap.css"> <!--bootstrap css-->
	<link rel="stylesheet" href="../../assets/DataTables/datatables.min.css"> <!--datatables css for datepicker-->
	<link rel="stylesheet" href="../../assets/css/jquery-ui.min.css">  <!--jquery ui css-->
	<link rel="stylesheet" href="../../assets/css/menu.css">  <!-- main css -->
	<link rel="stylesheet" href="../../fontawesome/css/all.css">   <!-- fontawesome css -->
	<script src="../../assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>  <!--jquery min js-->
	<script src="../../assets/js/bootstrap.js"></script> <!--bootstrap js-->
	<script src="../../assets/DataTables/datatables.min.js"></script>  <!--datatables js-->
	<script src="../../assets/js/jquery-ui.min.js"></script>  <!--jquery ui min js-->
	
</head>
<body> <br>
<!-- <div id="donor_person" >
 			
		<p id = "leftserch">
          <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From date'>
      
          <input type='text' readonly id='search_todate' class="datepicker" placeholder='To date'>
      
          <input type='button' id="btn_search" value="Search">
		  </p>	
			<br> 
			 <p id="serch">
			 search:
			 <input type="text" id = "search_id" placeholder = "Search by name">
			 </p>
			 
 		<table class="masterlist">
		 <thead>
 				<tr>
 					<th>Full Name</th>
 					<th>NIC</th>
 					<th>Email</th>
 					<th>Contact No</th>
					<th>Date</th>
					<th >Action</th>
 					
 				</tr> 
		</thead>
		<tbody id = "searchbody"></tbody>
		<div id="newdiv"></div>
		<tr></tr>		 
 		</table> <!-- masterlist table -->
 	</div> 


 -->


	 <div class="modal fade" id="exampleModaldnw1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Add Donation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="add_don">
		
<span class="reserveinfo clearfix" id = "donation">
<!-- <div class="reserveinfo clearfix" id = "donation"> -->

<form action="" method="post" id = "itemlistd">
<div id = "mainFormResultD"></div>
	  <fieldset class="reserve">
		<!-- <legend>Donations</legend> --> 
		<div class="reservation " >
			<br>
		<div class="donorDetailfirst" id="donorDetailfirst" style="display:block ;">
			
			<table class="teamTDm">
				<thead>
				<tr> <th>Name</th><th>NIC</th> <th>Address-L1</th><th>Address-L2</th> <th>Contact</th><th>Email</th></tr>
				
				</thead>
				<tbody id="appendP">
				
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
					<form method="post" id="SIFRM">
					<div class="response"></div>

					<table class="ItemTw">
					<tr>
					<td>	
					<p>
			
			<label class="numbr">No Of Items:</label>
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
			
			<label class="numbr">No Of Items:</label>
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
					<form method="post" id="DRFRM">
					<div class="response"></div>

					<table class="ItemTw">
					<tr>
					<td>	
					<p>
			
			<label class="numbr">No Of Items:</label>
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
			
			<label class="numbr">No Of Items:</label>
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
			
			<label class="numbr">No Of Items:</label>
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

	
		<!-- <p class="res">
			<label for="">Resr. Date:</label>
			<input type="date" name="donate">
		</p> -->
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
<button Type="submit" id="Lsaved" class="sub" name = "submit" value = "submit">Save</button>
</p>
<p>
<button Type="button" >PRINT</button>
</p>
		</div>  <!-- reservation -->
		<br>
		
	</fieldset>
	</form>
	</span>
	</div>

		
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" id="update1">Update</button> -->
      </div>
    </div>
  </div>
</div>




</body>
</html>

<script>
$(document).ready(function(){
	
	

});


</script>



		
<script src="../../assets/js/scriptD.js"></script> 
<script src="../../assets/js/script2.js"></script> 