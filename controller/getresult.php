<?php
require_once('../model/DBController.php');
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from php_interview_questions";
$paginationlink = "getresult.php?page=";					
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$perpageresult = $perPage->perpage($_GET["rowcount"], $paginationlink);

$output = '';
foreach($faq as $k=>$v) {
 $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["question"] . '</div>';
 $output .= '<div class="answer">' . $faq[$k]["answer"] . '</div>';
}
if(!empty($perpageresult)) {
$output .= '<div id="pagelink">' . $perpageresult . '</div>';
}
print $output;
?>
