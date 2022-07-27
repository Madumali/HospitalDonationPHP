<?php
session_start();
require_once('../model/DBController.php');

require_once('../model/Donation/DonationAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();




// 		$rows_per_page = 10;
// 		$page =0;
// 		$output = '';
// 		if(isset($_POST['page']))
// 		{
// 			$page = $_POST['page'];	
// 		} else {
// 			$page = 1;
// 		}
// 		$start= ($page - 1) * $rows_per_page;
		


// // $sqlds = "SELECT * FROM `item_table` WHERE `deleted`=0 ORDER BY `donor_name` LIMIT 2,10 ";

// // $resultShowTeam = mysqli_query($con,$sqlds);	

	

// 				$teamDisplayT = new DonationAdd();
// 				$resultShowTeam = $teamDisplayT -> getDonItems($start,$rows_per_page);
// 				$output.='
				
// 				<div class ="table_responsive">
// 				<div class="row">
// 			<div class ="input_range">
				
//           <input type="text" readonly id="search_fromdate" class="datepicker" placeholder="From date">
      
//           <input type="text" readonly id="search_todate" class="datepicker" placeholder="To date">
// 		  </div>
// 		  <div class="col-md-4">
//           <input type="button" id="btn_Isearch" value="Search" name="Search">
// 		  </div>
// 		  </div>
		  
// 				<table class="masterlist table table-striped" id="search_donation">
		 		
//  				<tr>
// 					 <th>#</th>
// 				 	<th>Donor </th>
// 					<th>NIC </th>
//  					<th>Item Code</th>
//  					<th>Item Name</th>
//  					<th>Item Qty</th>
//  					<th>Description</th>
// 					<th>Date</th>
// 					<th colspan="3">Action</th>	
//  				</tr> 
		
// 				';
// 				if(!empty($resultShowTeam)){
// 				foreach($resultShowTeam as $rowd){
// 					$type = $rowd['donor_type'];
// 					if($type == 'PERSON'){
// 						$nicno = $rowd['national_id'];
// 					}
// 					else {
// 						$nicno = "";
// 					}
                    
                
					
// 							$output.= '
							
// 						<tr>
// 							<td></td>
//                             <td> '.$rowd['donor_name'].'</td>
// 							<td> '.$nicno.'</td>
// 					      <td >'.$rowd['type_code'].'</td>
// 						  <td >'.$rowd['item_name'].'</td>
// 						  <td>'.$rowd['item_qty'].'</td>
// 						  <td>'.$rowd['item_description'].'</td>
// 						  <td> '.$rowd['receive_date'].'</td>
						 
// 						<td>
// 							<a  href="" id="itemedit" value = "'.$rowd['item_id'].'"  data-bs-toggle="modal" data-bs-target="#exampleModalitem"><i class="fas fa-pen" id="edit"></i></a>
							
// 						</td>
// 						<td>
// 							<a  href="" id="item_del" value = "'.$rowd['item_id'].'"  ><i class="fas fa-trash-alt" id="delete"></i></a>
							
// 						</td>
// 						  </tr> ';
						  
// 						  }

// 				} else {
// 					$output.='
// 					<tr>
// 						<td> Data not found.</td>
// 					</tr>';

// 				}
// 				$output.='</table>
// 							</div><br/>';

// 						//   data-target="../view/donorManagement/donor_add.php"
					
						
// 					// PAGINATION

// 					// $con = $this->db_handle->connectDB();
// $sql = 'SELECT count(`item_id`) AS `total_rows` FROM `item_table` WHERE `deleted`=0';
// $result_set = mysqli_query($con,$sql);
// $result=mysqli_fetch_assoc($result_set);
// $total_rows=$result['total_rows'];

// $last_page_no = ceil($total_rows/$rows_per_page);
// $output.= '<ul class = "pagination">';

// // echo $total_rows;

// if($page > 1){
// 	$previous = $page - 1;
// 	$output.= '<li class ="page_item" id = "1"><span class ="page_link"> First page </span></li>';
// 	$output .=  '<li class ="page_item" id = "'.$previous.'"><span class ="page_link"><i class ="fas fa-arrow-left"></i> </span></li>';
// }

// for($i=1; $i<=$last_page_no; $i++)
// {
// 	$active_class = "";
// 	if($i == $page)
// 	{
// 		$active_class ="active";
// 	}
// 	$output.= '<li class = "page_item'.$active_class.'" id ="'.$i.'"> <span class="page_link">'.$i.' </span> </li>';
// }

// if($page < $last_page_no)
// {
// 	$page++;
// 	$output.= '<li class = "page_item" id = "'.$page.'"><span class = "page_link"><i class="fas fa-arrow-right"></i></span></li>';
// 	$output.= '<li class = "page_item" id="'.$last_page_no.'"><span class = "page_link"> Last page </span><li>';

// }
// $output .= '</ul>';
// echo $output;



?>


<!-- 
$first = "<a href=\"../donationManagement/donation.php?p=1\">First</a>";

						
						$last = "<a href=\"../donationManagement/donation.php?p={$last_page_no}\">Last</a>";

						echo $first." | ".$last; -->