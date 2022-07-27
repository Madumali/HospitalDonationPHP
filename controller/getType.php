<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $db = "db_hospital2";


$con = mysqli_connect($server, $username, $password,$db);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['depart']))
{
$departid = $_POST['depart'];	
		$sqlP = "SELECT `itemname`,`codename`,`code`,sum(`item_qty_in`) as `qty` FROM `stock` INNER JOIN `item_name` ON `stock`.codename = `item_name`.code WHERE `codeid`='$departid'AND `delete_stk`= 0  GROUP BY `code` HAVING COUNT(*)>=1 ";
		$resultP = mysqli_query($con,$sqlP);

//result =$this->db_handle->runMysqlQuery($sql);	
$arrayP= array();
				while($rowP=mysqli_fetch_assoc($resultP))
					{
                        $itemname=$rowP['itemname'];
                        $codename =$rowP['codename'];  
					$arrayP[]= array("codename" => $codename, "itemname"=> $itemname);
    

					}
				
		// var_dump($arrayP); 
        echo json_encode( $arrayP);
				}



if(isset($_POST['qtyid']))
{
$qtyid = $_POST['qtyid'];	
		$sql = "SELECT `codename`,sum(`item_qty_in`)-sum(`item_qty_out`) as `qty` FROM `stock` WHERE `codename`='$qtyid' ";
		$result = mysqli_query($con,$sql);

//result =$this->db_handle->runMysqlQuery($sql);	
$arrayk= array();
				while($row=mysqli_fetch_assoc($result))
					{
                        $qtyk=$row['qty'];
                        $itemnamek =$row['codename'];  
					$arrayk[]= array( "qty"=> $qtyk);
    

					}
				
		// var_dump($arrayP); 
        echo json_encode( $arrayk);
				}



        ?>