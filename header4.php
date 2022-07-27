

<?php 
session_start();
require_once('model/DBController.php');
require_once('model/Login/LoginCheck.php');
require_once('footer.php');
// if(!isset($_SESSION['userId']))

// {
// 	header("Location:/HospitalDonation/view/loginSystem/userlog.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- jquery libraries -->
	
	<title>Donor List</title>


	<header>
		 

	<table class="topbar clearfix">
		
		<tr>	<td>
					<div class="left_logo">
					<img src="assets/img/emblem.png">
					</div> <!-- emblem -->
				</td>
				<td> 
					<div class="midlogo">
					<img src="assets/img/hdms 12.jpg">
					</div> <!-- midlogo -->
				</td>
				<td> 	
					<div class="right_logo">
			 		<img src="assets/img/nci34.jpg" >
					</div> <!-- right_logo--> 

				</td>
				</tr>
			</table>


		<hr></hr>

		
		
			
		<ul class="nav justify-content-center">
		<?php 
  if($_SESSION['usertype'] == 'front user')
  {                                     
	?>	
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="view/donorManagement/donor_add.php">Donor Add</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donor.php">Donor List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donation.php">Donation List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="view/issuanceManagement/issuance.php">Item Issuance </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="view/addItem/item-adding.php">Add Item </a>
  </li>
  <?php } else { ?>
	<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="view/donorManagement/donor_add.php">Donor Add</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donor.php">Donor List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donation.php">Donation List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="view/issuanceManagement/issuance.php">Item Issuance </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="view/addItem/item-adding.php">Add Item </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="view/userManagement/add_user.php" tabindex="-1" aria-disabled="true">Add User</a>
  </li>
  <?php }?>
</ul>

<div class="loggedin">You Are Logged In As <?php echo $_SESSION['username']; ?> |  <a href="view/loginSystem/logout.php">Log out</a></div>
</header>

</html>
