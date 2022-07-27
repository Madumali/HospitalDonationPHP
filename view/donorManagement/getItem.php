<?php

$server = "localhost";
 $username = "root";
 $password = "";
 $db = "db_hospital";


$con = mysqli_connect($server, $username, $password,$db);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$request = 1;
if(isset($_POST['request']))
{
    $request = $_POST['request'];
}

if($request == 1){
if(!isset($_POST['searchTerm']))
{
    $fetchdata = mysqli_query($con,'SELECT * FROM `surgical_consumable` WHERE `delet_sc`= 0' );
}else {
    $search = $_POST['searchTerm'];
    $fetchdata = mysqli_query($con,'SELECT * FROM `surgical_consumable` WHERE `sc_name` LIKE '%".$search."%'' );
}

$data = array();

while($row = mysqli_fetch_array($fetchdata))
{
    $data[] = array("code"=>$row['sc_code'], "text"=>$row['sc_name']);
}
echo json_encode($data);
exit;
}

if($request == 2)
{
    $html = '';
    $html .= '<br><td><select class=\"ItemTinput sty select2\" name=\"itemsc\" > <option value = >-Select- </option></select></td>';
    $html .= '<td><input class=\"ItemTinputQ qty\" type=\"number\" name=\"qtyn[]\" min=0/></td>';
    $html .= '<td class=\"itemDes\"><input class=\"ItemTdes sty\" name=\"des[]\"  onkeyup=\"this.value=this.value.toUpperCase();\"/></td>';
    $html .= '<td><button type=\"button\" name=\"remove\"  class=\"btn btn-danger btn-sm btn_removeI\">X</button><span class=\"glyphicon glyphicon-minus\"></span></td></tr><br>';
    echo $html;
    exit;
}
?>