<?php
require_once('../model/DBController.php');
require_once('../model/Donor/DonorAdd.php');
require_once('../model/Donation/DonationAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();
$itemlist = new DonationAdd();
$result_list = $itemlist->getDonItems();
$post = json_encode(array("data"=>$result_list));
// $items_arr = array();
// foreach($result_list as $row)
//     $name = $row['don_team_name'];
//     $id = $row['national_id'];
//     $typecode = $row['type_code'];
//     $itemname = $row['item_name'];
//     $qty = $row['item_qty'];
//     $des = $row['item_description'];
//     $date = $row['receive_date'];

//     $items_arr[] = array("don_team_name" => $name, "national_id" => $id, "type_code" => $typecode, "item_name"=> $itemname, "item_qty"=>$qty , "item_description"=>$des, "receive_date"=>$date);
    
echo ($post);



if(isset($_POST['buttonVal'])){
                        
                    if(isset($_POST['from_date']) || isset($_POST['to_date'])) {
                       $date1 = $_POST['from_date'];
                       $data2 = $_POST['to_date'];
                    //    var_dump($date1);
                        $query = "SELECT * FROM donor WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'AND `status`= 0   ORDER BY`donor_id` DESC " ;
                        $result = mysqli_query($con, $query);

                      
                        if(!empty($result))
                        foreach($result as $row){
                            $type=$row['donor_type'];
					if($type == "team")
					{
						$name = $row['member_name'];
						$teamnm =$row['don_team_name'];
					}
					else{
						$name = "P";
						$teamnm=$row['don_team_name'];
					}
                        
                               ?>
                                <tr>
                                <td><?php echo $teamnm;?> - <?php echo $name;?></td>
                                <td><?php echo $row["national_id"];?></td>
                                <td><?php echo $row["email"];?></td>
                                <td><?php echo $row["contact_no"];?></td>
                                <td><?php echo $row["reg_date"];?></td>
                                <td> <a  href="donor_add.php" id="mylink" value = "<?php echo $row['donor_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModaldnw1"><i class="fas fa-clipboard-list"></i></a> </td>
                                <td>
							<a  href="" id="newedit" value = "<?php echo $row['donor_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModaldnw2"><i class="fas fa-pen" id="edit"></i></a>	
						        </td>
                                <td>
							<a  href="../generatepdf.php?id=<?php echo $row['donor_id']?>" id="printp" value = "<?php echo $row['donor_id']?>" name = "printp" ><i class="fas fa-print"></i></a>
							
						</td>
                                </tr>
                                <?php
                        
                        
                    }
                }
            }


           
































//             if(isset($_POST["search"])){

//                 $columns = array('donor_name', 'type_code', 'item_name', 'item_qty', 'item_description', 'receive_date');

//                     $queryi = "SELECT * FROM `item_table` WHERE " ;

//                     if($_POST["is_date_search"] == "yes")
//                     {
//                      $queryi .= "receive_date BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."'AND `deleted`=0 AND" ;
//                     }

//                     if(isset($_POST["selectby_id"]["value"]))
//                     {
//                     $queryi .= '
//                     (donor_name LIKE "%'.$_POST["search"]["value"].'%" 
//                     OR national_id LIKE "%'.$_POST["search"]["value"].'%"
//                     OR type_code LIKE "%'.$_POST["search"]["value"].'%" 
//                     OR item_qty LIKE "%'.$_POST["search"]["value"].'%"
//                     OR item_description LIKE "%'.$_POST["search"]["value"].'%"
//                     )
//                     ';
//                     }

//                     // if(isset($_POST["order"]))
//                     // {
//                     // $queryi .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
//                     // ';
//                     // }
//                     // else
//                     // {
//                     $queryi .= 'ORDER BY item_id DESC ';
//                     // }

//                     $query1 = '';
//                     if($_POST["length"] != -1)
// {
//  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// }
// $resultlist = mysqli_query($con, $queryi);
// var_dump($resultlist);
// // if(!$resultlist || mysqli_num_rows($resultlist)==0)
// // {
// // // code here
// // }else {
// // $number_filter_row = mysqli_num_rows($resultlist);
// // if($number_filter_row = mysqli_num_rows($resultlist)>0){
// // }
// $result = mysqli_query($con, $queryi . $query1);
// if($result === FALSE)
// {
//     die(mysqli_error());
// }

// $data = array();

// while($row = mysqli_fetch_array($result))
// {
//  $sub_array = array();
//  $sub_array[] = $row["donor_name"];
// //  $sub_array[] = $row["national_id"];
//  $sub_array[] = $row["type_code"];
//  $sub_array[] = $row["item_name"];
//  $sub_array[] = $row["item_qty"];
//  $sub_array[] = $row["item_description"];
//  $sub_array[] = $row["receive_date"];
//  $data[] = $sub_array;
// }

// function get_all_data($con)
// {
//  $query = "SELECT * FROM  `item_table` WHERE `deleted`=0";
//  $result = mysqli_query($con, $queryi);
//  $row = mysqli_num_rows($result);
//  return $row;
// }

// $output = array(
//  "draw"    => intval($_POST["draw"]),
//  "recordsTotal"  =>  get_all_data($con),
//  "recordsFiltered" => $number_filter_row,
//  "data"    => $data
// );
// // }else {
// //     echo "no records.";
// // }
// echo json_encode($output);




//                     $output.='
				
// 				<div class ="table_responsive">
// 				<table class="masterlist" id="listtable">
		 		
//  				<tr>
// 					 <th>#</th>
// 				 	<th>Donor </th>
//                      <th>NIC </th>
//  					<th>Item Code</th>
//  					<th>Item Name</th>
//  					<th>Item Qty</th>
//  					<th>Description</th>
// 					<th>Date</th>
// 					<th colspan="3">Action</th>	
//  				</tr> 
		
// 				';
                  
//                     if(!empty($resulti)){
//                     foreach($resulti as $rowd){
//                         $type = $rowd['donor_type'];
//                         if($type == 'PERSON'){
//                             $nicno = $rowd['national_id'];
//                         }
//                         else {
//                             $nicno = "";
//                         }
                    
// 							$output.= '
							
//                             <tr>
//                                 <td></td>
//                                 <td> '.$rowd['donor_name'].'</td>
//                                 <td> '.$nicno.'</td>
//                               <td >'.$rowd['type_code'].'</td>
//                               <td >'.$rowd['item_name'].'</td>
//                               <td>'.$rowd['item_qty'].'</td>
//                               <td>'.$rowd['item_description'].'</td>
//                               <td> '.$rowd['receive_date'].'</td>
                             
//                             <td>
//                                 <a  href="" id="itemedit" value = "'.$rowd['item_id'].'"  data-bs-toggle="modal" data-bs-target="#exampleModalitem"><i class="fas fa-pen" id="edit"></i></a>
                                
//                             </td>
//                             <td>
//                                 <a  href="" id="item_del" value = "'.$rowd['item_id'].'"  ><i class="fas fa-trash-alt" id="delete"></i></a>
                                
//                             </td>
//                               </tr> ';
                              
//                               }
    
//                     } else {
//                         $output.='
//                         <tr>
//                             <td> Data not found.</td>
//                         </tr>';
    
//                     }
//                     $output.='</table>
//                                 </div>';
                    
                    


                                		
// 					// PAGINATION
                    
// 					// $con = $this->db_handle->connectDB();
// $sql = "SELECT count(`item_id`) AS `total_row_search` FROM `item_table` WHERE receive_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'AND `deleted`=0";
// $result_set = mysqli_query($con,$sql);
// $result=mysqli_fetch_assoc($result_set);
// $total_rows=$result['total_row_search'];

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
// 	$output.= '<li class = "page_item '.$active_class.'" id ="'.$i.'"> <span class="page_link">'.$i.' </span> </li>';
// }

// if($page < $last_page_no)
// {
// 	$page++;
// 	$output.= '<li class = "page_item" id = "'.$page.'"><span class = "page_link"><i class="fas fa-arrow-right"></i></span></li>';
// 	$output.= '<li class = "page_item" id="'.$last_page_no.'"><span class = "page_link"> Last page </span><li>';

// }
// $output .= '</ul>';
// echo $output;

//                 }
            
        
            // }

?>

            