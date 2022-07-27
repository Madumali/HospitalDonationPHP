<?php 
 //connection object
//$con = $db_handle->connectDB();
require_once ('../model/DBcontroller.php');
require_once ('../model/Donor/DonorAdd.php');
$db_handle = new DBController();
$con = $db_handle->connectDB();






 ?>





<html>
	<head>testing</head>


<body>
		
<?php if(isset($_POST['t'])){

				$sqlI = "SELECT * FROM `donor` ORDER BY`donor_id`";
					$resultI = mysqli_query($con,$sqlI);	
					if($resultI->num_rows > 0){
					while($rowI=mysqli_fetch_assoc($resultI))
					{
					// $code = $rowI['donor_name'];
					// $name = $rowI['don_team_name'];
					// echo "<option value=$name> $name</br></option>";

					}
					}	
				


}	 ?>


	<form  method="post">
<p>
	<label for="">select nic</label>
	<select name="t" id="t1" onchange = "this.form.submit();" >
		<option value=""></option>

		<?php 
// $sql = "SELECT * FROM `donor` WHERE `donor_nic`='PERSON' ORDER BY`donor_id`DESC LIMIT 1 ";
$sqlI = "SELECT * FROM `donor` ORDER BY`donor_id`";
					$resultI = mysqli_query($con,$sqlI);	
					if($resultI->num_rows > 0){
					while($rowI=mysqli_fetch_assoc($resultI))
					{
					$code = $rowI['donor_id'];
					$name = $rowI['don_team_name'];
					echo "<option value=$code> $name</br></option>";

					}
					}	




		?>

	</select>


</p>

</form>
</body>
<p>	display data</p>
<?php 	

if(isset($_POST['t'])){

				$teamDisplayT = new DonorAdd();
				$resultShowTeam = $teamDisplayT -> getStudentinClass("m","team");
				
// if(!empty($resultShowTeam))
// 	foreach($resultShowTeam as $rowp){

// 							echo $rowp;


// 					}


			}




 ?>


</html>