<?php

include 'header4.php';

// require_once('../../model/Reservation/ReserveDonation.php');

require_once('model/DBcontroller.php');
require_once('model/Donation/DonationAdd.php');

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

<!doctype html>
<html lang="en">

<head>

<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.25/css/jquery.dataTables.min.css" />

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/css/menu.css">
    
    
    <!-- Datepicker -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">

    <!-- Datatables -->
    
        <link rel="stylesheet" type="text/css" href="assets/DataTables/Buttons-1.7.1/css/buttons.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/DataTables/Responsive-2.2.9/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                 <!-- <h1 class="text-center">PHP OOP AJAX DATATABLES DATE RANGE</h1> -->
                <!-- <hr> --> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
			<br>
               <div style="float:right"><a  href="/HospitalDonation/view/donorManagement/donor_add.php"  class = "btn btn-sm btn-outline-success" >+ Add New</a></div>
               <br>
                <div class="row">
			
                    <div class="col-md-3" >
						<div class = "form-floating flex-grow-1 ">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_dated" placeholder="Start Date" readonly >
                        </div>
						</div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_dated" placeholder="End Date" readonly>
							
                        </div>
						<!-- <div> -->
                   
                <!-- </div> -->
                    </div>	
                </div>
				<button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                <div id="msg"></div>
				
			   <div class="row mt-3">
				
                    <div class="col-md-12">
                        
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="recordsd" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
										<th></th>
                                        <th>Name</th>
                                        <th>NIC</th> 
                                        <th>Address1</th>
                                        <th>Address2</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Reg.Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- edit donor -->

<div class="modal fade" id="exampleModaldnw2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit Donors</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_list">

		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update3">Update</button>
      </div>
    </div>
  </div>
</div>

    <!-- Add donation from donor list -->
    <div class="modal fade" id="exampleModaldnw1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog new3" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Add Donation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	 
	
<span class="reserveinfo clearfix" id = "donation">
<!-- <div class="reserveinfo clearfix" id = "donation"> -->

<form  method="post" id = "itemlistds">
<div id = "mainFormResultDs"></div> 
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
									<tr><th>Item Name</th><th>Quantity</th><th>Description</th><th><button type="button"  name="add" id="addI" class=" addI" ><i class="fas fa-plus-circle" style="color: green" id="addM"></i></button></th></tr>
									</thead>
									<!-- multiple="multiple" -->
									<tbody id="ItemTbody">
									
									</tbody>
										
									 </table>
									
				 					</td></tr>
									 <a  href="view/addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i>Add New Item</a>
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
				 <a  href="view/addItem/item-adding.php" id="item_adding"  
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
				 <a  href="view/addItem/item-adding.php" id="item_adding"  
                                class = "btn btn-sm btn-outline-success"><i class="fas fa-plus" id="add_item"></i>Add New Item</a>
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
				 <a  href="view/addItem/item-adding.php" id="item_adding"  
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
				 <a  href="view/addItem/item-adding.php" id="item_adding"  
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
				 <a  href="view/addItem/item-adding.php" id="item_adding"  
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
<button Type="submit" id="LsavedList" class="sub" name = "submit" value = "submit">Save</button>
</p>

		</div>  <!-- reservation -->
		<br>
		
	
	</form>
	</span>
	
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" id="update1">Update</button> -->
      </div>
    </div>
  </div>
</div>

</body>
</html>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/popper.min.js"></script>
    
   
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script> -->
    <script src="assets/js/bootstrap.js">
    </script>
    <!-- Font Awesome -->
    <script src="fontawesome/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="assets/js/jquery-ui.js"></script>
    <!-- Datatables -->
    
   
    <script type="text/javascript"src="assets/DataTables/JSZIP-2.5.0/jszip.min.js"> </script>
    <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"src="assets/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
     <!-- <script type="text/javascript"src="assets/DataTables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js"></script> -->
     <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/dataTables.buttons.min.js"> </script>
     <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/buttons.bootstrap4.min.js"> </script>
     <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/buttons.html5.min.js"> </script>
    <script type="text/javascript"src="assets/DataTables/Buttons-1.7.1/js/buttons.print.min.js"> </script>
    <script type="text/javascript"src="assets/DataTables/Responsive-2.2.9/js/dataTables.responsive.min.js"> </script>
    <script type="text/javascript"src="assets/DataTables/Responsive-2.2.9/js/responsive.bootstrap4.min.js"> </script>
    
    <!-- Momentjs -->
    <script src="assets/js/moment.min.js"></script>

    <script>
    $(function() {
        $("#start_dated").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_dated").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
    </script>

    <script>
    // Fetch records

    function fetchd(start_dated, end_dated) {
        $.ajax({
            url: "recordsd.php",
            type: "POST",
            data: {
                start_dated: start_dated,
                end_dated: end_dated
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";
                // var a="";
if(!$.fn.DataTable.isDataTable('#recordsd')){
                $('#recordsd').DataTable({
                    "data": data,
                //    "dom":'Bfrtip',
                
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
                        {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 1, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [  1, 2,3,4,5,6 ]
                }
            },

			{
                extend: 'print',
				title:'Donor List For',
                exportOptions: {
                columns: [  1, 2,3,4,5,6 ]
                },
				customize: function( win )
				{
					$(win.document.body)
					.css('font-size', '10pt')
					.prepend('<img src="assets/img/nciNew.png" style="position:absolute; top:0; left:0;/>');

					$(win.document.body).find('table')
					.addClass('compact')
					.css('font-size','inherit');
				}
            },
            
                        //  'excel', 'pdf', 'print',
                        
                    ],
                    "lengthMenu":[ [10,25,50,-1], [10, 25, 50, "All"] ],
                    // responsive
                    "responsive": true,
                    "columnDefs":[{"defaultContent":"-",
                        "targets":"_all"
                        }],
                    "columns": [
                            {
                            render: function(data, type, row, meta) {
                                return a = i++;
                            } 
                            
                        },
						{
							"data":"title" 
						},
                        {
                            "data":"donor_name"
                            // "data": "member_name"
                            // "render": function(data, type, row, meta) {
                            //     return `_${data.member_name}_`;
                            // }
                        },
                        {
                            "data": "national_id"
                           
                        },
                        {
                            "data": "address_line1"
                            
                        },
                        {
                            "data": "address_line2"
                            
                        },
                        {
                            "data": "email"
                        },
                        {
                            "data": "contact_no"
                           
                        },
                        {
                            "data": "reg_date"
                           
                        },
                        {
                            render:function(data, type, row, meta){
                                var a =`
                                 
                                <a  href="" id="mylink" value = "${row.donor_id}" class = "btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                 data-bs-target="#exampleModaldnw1"><i class="fas fa-clipboard-list"></i></a>

                                 <a  href="" id="newedit" value = "${row.donor_id}" class = "btn btn-sm btn-outline-warning" data-bs-toggle="modal" 
                                 data-bs-target="#exampleModaldnw2"><i class="fas fa-edit" id="edit"></i></a>
                                
                                 <a  href="" id="deletedon" value = "${row.donor_id}" class = "btn btn-sm btn-outline-danger"><i class="fas fa-trash" id="delete"></i></a>

                                 <a  href="/HospitalDonation/generatepdf.php?id=${row.donor_id}&name=${row.donor_name}" value = "${row.donor_id}" id="printp"  name = "printp"  ><i class="fas fa-print"></i></a>
                                `;
                                return a;
                            }
                        }
                    ]
                });
            }
            }
        });
    }
    fetchd();

    // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_dated = $("#start_dated").val();
        var end_dated = $("#end_dated").val();

        if (start_dated == "" || end_dated == "") {
            alert("both date required");
        } else {
            $('#recordsd').DataTable().destroy();
            fetchd(start_dated, end_dated);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_dated").val(''); // empty value
        $("#end_dated").val('');

        $('#recordsd').DataTable().destroy();
        fetchd();
    });

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
	html += '<td><select class="ItemTinput4 sty" name="item[]"><option value ="">Select Item</option> <?php echo getdr();?> </select></td>';
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

// 	$(".select2").select2({
// 		// placeholder: 'Select Item Name',
// 		dropdownParnt: $("#modalDialog"),
// 		width:'100%',
		
// 		theme: 'bootstrap4',
// 		tags: true
		
// 	}).on('select2:close', function(){
// 		var element = $(this);
// 		var new_opt = $.trim(element.val());
// 		var type = "SC";

// 		if(new_opt != '')
// 		{
// 			$.ajax({
// 				url:"/HospitalDonation/controller/selectitem.php",	
// 				method:"POST",
// 				data:{selct_new:new_opt,
// 					typecd:type},
// 				success: function(data)
// 				{
// 					if(data == 'yes')
// 					{
// 						element.append('<option value = "'+new_opt+'">'+new_opt+'</option>').val(new_opt);
// 					}
// 				}
// 			});
// 		}
// 	});

});

    </script>
</body>

</html>



<script src="/HospitalDonation/assets/js/script2.js"></script> 
<script src="/HospitalDonation/assets/js/scriptD.js"></script>