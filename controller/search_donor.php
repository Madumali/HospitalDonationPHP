<?php
session_start();
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');
// require_once('../model/Donation/DonationAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();





				$teamDisplayT = new DonorAdd();
				$resultShowTeam = $teamDisplayT -> getAllDonors();
				
				if(!empty($resultShowTeam))
				foreach($resultShowTeam as $rowd){
					$type=$rowd['donor_type'];
					$status =$rowd['status'];
					if($type == "team" && $status == 0 )
					{
						$name = $rowd['member_name'];
						$teamnm =$rowd['don_team_name'];
					}
					else{
						$name = "P" ;
						$teamnm=$rowd['don_team_name'];
					}
							?>
							<tr>
							<td style="display:none;"><?php echo $type;?> </td>
					      <td id="dname"><?php echo $teamnm;?> - <?php echo $name;?></td>
						  <td id="did"><?php echo $rowd['national_id'];?></td>
						  <td id="dmail"><?php echo $rowd['email'];?></td>
						  <td id="dcnt"><?php echo $rowd['contact_no'];?></td>
						  <td id="dreg"><?php echo $rowd['reg_date'];?></td>
						  <td id="dl">
						  <a  href="donor_add.php" id="mylink" value = "<?php echo $rowd['donor_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModaldnw1"><i class="fas fa-clipboard-list"></i></a>
						</td>
						<td>
							<a  href="" id="newedit" value = "<?php echo $rowd['donor_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModaldnw2"><i class="fas fa-pen" id="edit"></i></a>
							
						</td>
						<td>
							<a  href="../generatepdf.php?id=<?php echo $rowd['donor_id']?>&name=<?php echo $rowd['don_team_name']?>" id="printp" value = "<?php echo $rowd['donor_id']?>" name = "printp" ><i class="fas fa-print"></i></a>
							
						</td>
						  </tr>
						  <?php 
						  }

						

						//   data-target="../view/donorManagement/donor_add.php"
					
                  
                    ?>



