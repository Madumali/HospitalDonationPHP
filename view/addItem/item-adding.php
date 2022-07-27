<?php 

// require_once('../../model/Reservation/ReserveDonation.php');

// require_once('../../model/DBcontroller.php');
// require_once('../../model/Donation/DonationAdd.php');
require_once('../../header.php');
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
	 <!-- <link rel="stylesheet" href="../../assets/css/jquery-editable-select.min.css">  -->
	 <!-- <script src="jquery-editable-select.min.js"></script>  -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
	<script src="../../assets/js/bootstrap.js"></script> <!--bootstrap js-->
	<script src="../../assets/DataTables/datatables.min.js"></script>  <!--datatables js-->
	<script src="../../assets/js/jquery-ui.min.js"></script>  <!--jquery ui min js-->

    <script src = "/HospitalDonation/assets/js/scriptD.js" > </script> 
    <script src = "/HospitalDonation/assets/js/script2.js" > </script> 
	
	
	
</head>
<body>

<div class="wrap clearfix">
<div class="iteminfo clearfix" id="iteminfo" style="display:block ;" >
    <form action="" method="post" id = "itemadd">
    <div id="itemsuccess"></div>
			
            <fieldset class="dperson">
                <legend>Donation Item</legend>
    
                <div class="labelfield">
                <p>
                    <label > Pre.Code: </label>
                    </p>
                    <br>
                    <p>
                    <label > Category: </label>
                    </p>
                    <br> 
                    <p>
                    <label> Item Code: </label>
                    </p> <br>
                    <p>
                    <label> Name: </label>
                    </p>
                    <br>
                </div>  <!-- labelfield -->
    
                    
                <div class="inputfield" id="person">
                    <p>
                    <input type="text" name="precode"  id="precode" disabled>
                    </p>
                    
                    <p>
                    <select name="category" id="categoryid" onchange="selectitemname();">
                        <option value="">-Select Category-</option>
                        <option value="SC">Surgical Consumable</option>
                        <option value="SI">Surgical Item</option>
                        <option value="CI">Consumable Item</option>
                        <option value="DR">Drugs</option>
                        <option value="GI">General Item</option>
                        <option value="FD">Food Items</option>
                    </select>
                    </p>
                    
                    <p>
                    <input type="text" name="code" id="codeid" onkeyup="this.value=this.value.toUpperCase();" readonly>
                    <br><br>
                    <input type="text" name="nameitem" placeholder="Enter Item Name" id="nameid" onkeyup="this.value=this.value.toUpperCase();">
                    </p>
                    <br>
                    <p>
                    <button type="submit" name="submitI" class="sub" id="subItem" ><i class="fas fa-plus-circle"></i> Add Item Name</button>
                        
                        
                        <!-- <i class="fas fa-clipboard-list"></i>
                        <i class="fas fa-pen"></i> -->
                        <!-- <i class="fas fa-list"></i> -->
                        <!-- <i class="fas fa-plus-circle"></i> -->
                        
                        
                        
                    </p>
                    
            </div>  <!-- inputfield -->
    
            </fieldset>
            </form>
        </div>      <!-- donorinfo for a single person -->
    </form>
</div>
</div>
</body>
</html>