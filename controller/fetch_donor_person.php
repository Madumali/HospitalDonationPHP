<?php
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();




								
				$teamDisplay = new DonorAdd();
				$resultShow = $teamDisplay -> getDonorPerson();
				
				if(!empty($resultShow))
				foreach($resultShow as $rowR){
					$id = $rowR['donor_id'];
					$title = $rowR['title'];
						?>
					
					
						<tr>
						<td style = "display:none;"><input type="text" <?php echo $title;?> value ="<?php echo $id;?>" id = "donName" readonly/></td>
						  <td ><input type="text" <?php echo $title;?> value ="<?php echo $rowR['donor_name'];?>"  readonly/></td>
						  <td id = "donNic"><input type="text" value ="<?php echo $rowR['national_id'];?>" readonly/></td>
						  <td> <input type="text" value ="<?php echo $rowR['address_line1'];?>" readonly/></td>
						  <td><input type="text" value ="<?php echo $rowR['address_line2'];?>" readonly/></td>
						  <td><input type="text" value ="<?php echo $rowR['contact_no'];?>" readonly/></td>
						  <td><input type="text" value ="<?php echo $rowR['email'];?>" readonly/> </td>
						  <td class="img"><a href="" id="editdP" class = "badge badge-warning" value = "<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#exampleModald1"><i class="fas fa-pen" id="editpp"></i></a>
						   <a href="#" id="deletedP" class = "badge badge-danger" value = "<?php echo $id;?>"><i class="fas fa-trash-alt" id="delete"></i></a>
						   </td>
						  </tr>
						  <?php 
							}
						
							?>
