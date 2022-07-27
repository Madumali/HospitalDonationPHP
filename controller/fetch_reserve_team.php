<?php
require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();




				$teamDisplayT = new TempDonorAdd();
				$resultShowTeam = $teamDisplayT -> getTempDonorTeam("team");
				
				if(!empty($resultShowTeam))
				foreach($resultShowTeam as $rows){
					?>
					<table class="table">
					<tr>
					<th>Team Name: </th>
					<td class = "teamname" id = "team_name"><?php echo $rows['don_team_name'];?></td></tr></table>
					<?php  
					}
								
				$teamDisplay = new TempDonorAdd();
				$resultShow = $teamDisplay -> getTempDonor("team");
				
				if(!empty($resultShow))
				foreach($resultShow as $row){
						?>
					
						<tr>
						  <td style = "display:none;"><?php echo $row['donor_id'];?></td>
						  <td><?php echo $row['member_name'];?></td>
						  <td><?php echo $row['national_id'];?></td>
						  <td><?php echo $row['contact_no'];?></td>
						  <td><?php echo $row['email'];?></td>
						  <td><?php echo $row['address_line1'];?></td>
						  <td><?php echo $row['address_line2'];?></td>
						  <td class="img"><a href="#" id="editT1" class = "badge badge-warning" value ="<?php echo $row['donor_id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fas fa-pen" id="edit1"></i></a>
						   <a href="#" id="deleteT" class = "badge badge-danger" value = "<?php echo $row['donor_id'];?>"><i class="fas fa-trash-alt" id="delete"></i></a>
						   </td>
						  </tr>
						  <?php 
							}
							?>





				