<?php 

//function for connection with database
class DBcontroller{

	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $dbname = "db_hospital1";
	private $conn;


	function __construct(){
		$this->conn = $this->connectDB();

	}


	function connectDB(){

		$conn =mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
		return $conn;
	}


	//function for execute mysql query
function runMysqlQuery($mySqlCommand)
{
	$connection = $this->connectDB();

	try
	{
		if(mysqli_query($connection,$mySqlCommand))
		{
			
			echo"";

		}
		else
		{
			die("Error: " . mysqli_error($connection));
			
		}
	}

	catch(Exception $ex)
	{
		echo"Caught exception: ", $ex->getMessage(), "\n";
	}

	// finally
	// {
	// 	mysqli_close($connection);
	// }
}




public function fetch()
    {
		// $con = $this->db_handle->connectDB();
        $data = [];

        $query = "SELECT * FROM item_table INNER JOIN donor ON `item_table`.`donor_name` = `donor`.`don_team_name` WHERE `deleted`=0  ";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        
        return $data;
    }

    public function date_range($start_date, $end_date)
    {
		$con = $this->db_handle->connectDB();
        $data = [];

        if (isset($start_date) && isset($end_date)) {
            $query = "SELECT * FROM `item_table` INNER JOIN donor ON `item_table`.`donor_name` = `donor`.`don_team_name` WHERE (`receive_date` > '$start_date' AND `receive_date` < '$end_date') AND `deleted`=0 ";
            if ($sql = $this->db_handle->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
        }

        return $data;
    }




}





	// function runBaseQuery($query) {
	// 	$resultset = "";
	// 	$result = $this->conn->query($query);
	// 	// if($result->num_rows > 0){
	// 	// 	while($row = $result->fetch_assoc()) {
	// 	// 		$resultset[] = $row;
	// 	// 	}
	// 	// }
		
	// 	}
	// 	// return $resultset;
	


 	
 // 	function runQuery($query)
 // 	{

 // 		$sql = $this->conn->prepare($query);
 // 		//$this->bindQueryParams($sql);
 // 		$sql->execute();
 // 		$result = $sql -> get_result();

 // 		if($result->num_rows > 0) {
 // 			while($row = $result->fetch_assoc()) {
 // 				$resultset[] = $row;

 // 			}
 // 		}

 // 		if(!empty($resultset)) {
 // 			return $resultset;
 // 		}

 // 	}




 // 	function bindQueryParams($sql, $param_type, $param_value_array) {
 // 		$param_value_reference[] = & $param_type;
 // 		for($i=0; $i<count($param_value_array); $i++)
 // 		{

 // 			$param_value_reference[] = & $param_value_array[$i];

 // 		}
 // 		call_user_func_array(array(
 // 			$sql,
 // 			'bind_param'), $param_value_reference);
 // 	}




//  	 function insert($query){

//  	 	$sql = $this->conn->query($query);
//  	 // 	//$this->bindQueryParams($sql, $param_type, $param_value_array);
//  	 // 	//$sql->execute();
//  	 // 	$insertId = $sql->lastInsertId();   //get last inserted data id

//  	 // 	return $lastinserted;  //return last inserted id

//  	 }





//  	 function update($query, $param_type, $param_value_array){

//  	 	$sql = $this->conn->prepare($query);
//  	 	$this->bindQueryParams($sql, $param_type, $param_value_array);
//  	 	$sql->execute();

//  	 }

// //  	 function query($query){  
// // 	$stmt = $this->conn->prepare($query);  

// // }  

// }




 ?>





























 <!-- function setConnection()
// {

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "db_hospital";

// //create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// //check connection
// if($conn->connect_error){
// die("Database connection failed :". $conn->connect_error);

// }
// //echo "Connection successfull";
// return $conn;

// }
// //function for execute mysql query
// function runMysqlQuery($mySqlCommand)
// {
// 	$connection = setConnection();

// 	try
// 	{
// 		if(mysqli_query($connection,$mySqlCommand))
// 		{
// 			echo"Successfull !";
// 		}
// 		else
// 		{
// 			echo"Error: " . mysqli_error($connection);
// 		}
// 	}

// 	catch(Exception $ex)
// 	{
// 		echo"Caught exception: ", $ex->getMessage(), "\n";
// 	}

// 	finally
// 	{
// 		mysqli_close($connection);
// 	}
// }
 -->