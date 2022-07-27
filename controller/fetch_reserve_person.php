<?php
require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();





				$personDisplay = new TempDonorAdd();
				$resultShowp = $personDisplay -> getTDonorPerson();
				
				if(!empty($resultShowp))
					foreach($resultShowp as $rowp){
						$id=$rowp['donor_id'];
						$nm = $rowp['don_team_name'];
						
						?>
					
						<tr>
						 
						  <td id = "don_name"><?php echo $rowp['don_team_name'];?></td>
						  <td><?php echo $rowp['national_id'];?></td>
						  <td><?php echo $rowp['address_line1'];?></td>
						  <td><?php echo $rowp['address_line2'];?></td>
						  <td><?php echo $rowp['contact_no'];?></td>
						  <td><?php echo $rowp['email'];?></td>
						  <td class="img"><a href="#" id="editp" class = "badge badge-warning" value = "<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-pen" id="edit"></i></a>
						   <a href="#" id="deletep" class = "badge badge-danger" value = "<?php echo $id;?>"><i class="fas fa-trash-alt" id="delete"></i></a>
						   </td>
						  </tr>

						  <!-- <option value=""></option> -->
						  <?php 
							}
						
							?>


<?php

							$personDisplayw = new TempDonorAdd();
							$resultShowpw = $personDisplayw -> getTDonorPerson();
							
							if(!empty($resultShowpw))
								foreach($resultShowpw as $rowpw){
									//$id=$rowp['donor_id'];
									$nm = $rowpw['don_team_name'];
									
									?>
									<!-- <select name="" id="donselect"> -->
							<!-- <option value="$nm"></option> -->
							<!-- </select> -->
							<?php
							}
							?>