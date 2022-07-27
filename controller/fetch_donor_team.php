<?php
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
//$con = $db_handle->connectDB();



				$teamDisplayT = new DonorAdd();
				$resultShowTeam = $teamDisplayT -> getDonorTeam("team");
				
				if(!empty($resultShowTeam))
				foreach($resultShowTeam as $rowd){
					$name = $rowd['donor_id'];
					
					?>
					<table class="table">
					<tr>
					<th >Team Name: </th> 
					<td style = "display:none;" > <input type="text" value ="<?php echo $name;?>" id = "donTeam" readonly/></td>
					<td > <input type="text" value ="<?php echo $rowd['donor_name'];?>"  readonly/></td>
					
					<th>Email</th>
					<td > <input type="text" value ="<?php echo $rowd['email'];?>" id = "donTeamemail" /></td>
					<th>contact</th>
					<td > <input type="text" value ="<?php echo $rowd['contact_no'];?>" id = "donTeamcontact" /></td>
					<td class="img"><a href="" id="editteam" class = "badge badge-warning" value = "<?php echo $rowd['donor_id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModald2"><i class="fas fa-pen" id="edit"></i></a>
						   <a href="#" id="deletedTeam" class = "badge badge-danger" value = "<?php echo $rowd['donor_id'];?>"><i class="fas fa-trash-alt" id="delete"></i></a>
						   </td>
					</tr>
				</table>
					<?php
					  
					}
								
				$teamDisplay = new DonorAdd();
				$resultShow = $teamDisplay -> getDonor($name);
				
				if(!empty($resultShow))
				foreach($resultShow as $rowd){
					$title = $rowd['title'];

						?>
					
						<tr>
						  <td style = "display:none;"><input type="text" value ="<?php echo $rowd['teamid'];?>" readonly/></td>
						  <td name="teamname"><input type="text" value ="<?php  echo $title.".". $rowd['membername'];?>" readonly/></td>
						  <td><input type="text" value ="<?php echo $rowd['national_idt'];?>" readonly/></td>
						  <td><input type="text" value ="<?php echo $rowd['contact_not'];?>" readonly/></td>
						  <td class = "mail"><input type="text" value ="<?php echo $rowd['emailt'];?>" readonly/></td></span>
						  <td><input type="text" value ="<?php echo $rowd['address_line1t'];?>" readonly/></td>
						  <td><input type="text" value ="<?php echo $rowd['address_line2t'];?>" readonly/></td>
						  <td class="img"><a href="" id="editdT" class = "badge badge-warning" value = "<?php echo $rowd['teamid'];?>" data-bs-toggle="modal" data-bs-target="#exampleModald2"><i class="fas fa-pen" id="edit"></i></a>
						   <a href="#" id="deletedT" class = "badge badge-danger" value = "<?php echo $rowd['teamid'];?>"><i class="fas fa-trash-alt" id="delete"></i></a>
						   </td>
						  </tr>
						  <?php 
							}



							?>

