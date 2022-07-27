<?php 

// require_once('../../model/Reservation/ReserveDonation.php');
require_once('../../header.php');
require_once('../../model/DBController.php');


$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Donation Issuance Management</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.css"> <!--bootstrap css-->
	<link rel="stylesheet" href="../../assets/DataTables/datatables.min.css"> <!--datatables css for datepicker-->
	<link rel="stylesheet" href="../../assets/css/jquery-ui.min.css">  <!--jquery ui css-->
	<link rel="stylesheet" href="../../assets/css/menu.css">  <!-- main css -->
	<link rel="stylesheet" href="../../fontawesome/css/all.css">   <!-- fontawesome css -->
	<script src="../../assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>  <!--jquery min js-->
	<script src="../../assets/js/bootstrap.js"></script> <!--bootstrap js-->
	<script src="../../assets/DataTables/datatables.min.js"></script>  <!--datatables js-->
	<script src="../../assets/js/jquery-ui.min.js"></script>  <!--jquery ui min js-->
	<script src = "/HospitalDonation/assets/js/scriptD.js" > </script> 
    <script src = "/HospitalDonation/assets/js/script2.js" > </script> 
</head>
<body>
	<header>
	 <!-- <div class="appname"> User Management </div>    appname -->	

	</header>
	<div class="wrap clearfix">
		<!-- <div class="COMMON clearfix"> -->
	
	<div class="userinfo2" id="" style="display:block ;" >
		<form action="" method = "post" id="itemform">
            <div id = "issued"></div>
        <fieldset class="dperson">
			<legend>Issuing Information</legend>
            <div class="labelfield">
                <p>
                  <label for="">Item Type :</label>
                </p> <br>
                <p>
                    <label for="">Item Name :</label> 
                </p> <br>
                <p>
                    <label for="">Release Qty :</label>
                </p> <br>
                <p>
                    <label for=""></label>
                </p>
            </div>
            <div class="inputfield" id="person">
                <p>
                   <select name="type" id="typeinfo" class="selecting" onchange="selecttype();">
                       <option > -Select-</option>
                       <option value="SC">Surgical Consumable</option>
                       <option value="SI">Surgical Items</option>
                       <option value="CI">Consumable Item</option>
                       <option value="DR">Drugs</option>
                       <option value="GI">General Item</option>
                       <option value="FD">Foods</option>
                   </select>
                </p> 
                <p>
                    <select name="iname" id="itemnames" class="selecting" onclick="selectname();">
                        <option value = "select">-Select-</option>
                    </select>
                    <label for="">Available Qty :</label>
                    <input type="hidden" name = "availableqtyh" id = "availableqtyh"  readonly >
                    <input type="number" name = "availableqty" id = "availableqty" min = "-1" readonly >
                </p> 
                <p>
                    <input type="number" id="releaseqty" min="0" name="releaseqty" max = "availableqty" onclick="selectqty();">
                </p>
               
                </div>
            <br>
            <fieldset class="dperson">
                <legend>Release To</legend>
                <div class="labelfield">
                    <p>
                    <label for="">Department :</label>
                    </p> <br> <br>
                    <p>
                    <label for="">Release Item :</label>
                    </p> <br><br><br>  
                    <label for="">To whom :</label>
                    </p>
                </div>
                <div class="inputfield" id="person">
                    <p>
                        <select name="dep" id="dep_name" class="selecting">
                            <option>-Select-</option>
                            <?php
							 
			 				$query="SELECT * FROM department ORDER BY dep_id ";
							$result=mysqli_query($con,$query);

								if($result){
								while($row = mysqli_fetch_array($result)){
									$did=$row['dep_id'];
									$depname =$row['dep_name'];
									
				
								echo "<option value=$did> $depname</br></option>";
			
										}
										}	
                                        ?>
                        </select>
                    </p>
                    <p>
                        <input type="text" id = "detail1">
                    </p>
                    <p>
                        <!-- <input type="hidden" name="hiddenname" id="hiddennameid" value=""> -->
                        <input type="text" id = "detail2">
                        <input type="hidden" id = "detailhidden">
                    </p>
                    <p>
                        <input type="text" id = "detail3">
                    </p>
                    <p>
                        <input type="text" id="whom">
                    </p>
                </div>
            </fieldset>
           <div class="inputfield">
        
				<button type="submit" name="submitI" class="sub " id="subIssue" ><i class="fas fa-user-plus"></i> Issue</button>
          
           </div>
           
        </fieldset>

        </form>
	</div> 
</div>
</body>
</html>
<!-- <script src="/HospitalDonation/assets/dist/jautocalc.js"></script> -->
