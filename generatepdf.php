<?php 
session_start();
// ob_start();
global $pdf;
$uname = $_SESSION['username'];
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_hospital2";
$con =mysqli_connect($host, $user, $password, $dbname);
if(isset($_GET['id'])) {
    $uid1= $_GET['id'];
    $dname=$_GET['name'];
    // $dname=mysqli_real_escape_string($con, $_GET['name']);
    $query="SELECT * FROM `donor_all` WHERE `donor_id`={$uid1}";
	$result=mysqli_query($con,$query);
	
	while($donor=mysqli_fetch_assoc($result)){
		$type = $donor['donor_type'];
        $donnamet = $donor['donor_id'];
        if($type == "team"){
            $i=1;
            $max=6;
           $qry = "SELECT * FROM `donor_team` INNER JOIN `donor_all` ON donor_team.donor_name = donor_all.donor_id WHERE donor_team.donor_name= '$donnamet' AND deletestatus = 0 ";
           $reslt=mysqli_query($con,$qry);
           while($don=mysqli_fetch_assoc($reslt)){
            $namet =$don['donor_name'];
            $add1t=$donor['address_line1'];
            $mailt=$donor['email'];
           }
        }else {
            $title = $donor['title'];
            $name =$donor['donor_name'];
            $add1=$donor['address_line1'];
            $add2=$donor['address_line2'];
            $nic=$donor['national_id'];
            $ct1=$donor['contact_no'];
            $mail=$donor['email'];
        }
        
        // "SELECT * FROM `donor_all` WHERE `don_team_name` IN(
        //     SELECT `don_team_name`FROM `donor` WHERE`donor_type`='$type' AND `status`= 0   GROUP BY `don_team_name` HAVING COUNT(*)>=1
        //     )  ";

    }
require_once('TCPDF-main/tcpdf.php');

class PDF extends TCPDF
{
    public function Header()
        {
            $imgfile = K_PATH_IMAGES.'header1.jpg';
            $this->Image($imgfile, -5, 0, 225, 80, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            // $imgfilem = K_PATH_IMAGES.'hdms logo copy.jpg';
            // $this->Image($imgfilem, 70, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            // $imgfilee = K_PATH_IMAGES.'emblem copy.jpg';
            // $this->Image($imgfilee, 10, 9, 12, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // $this->Ln(5);
            //SPACE
            // $this->SetFont('helvetica','B',12);  //FONT NAME STYLE SIZE
            // $this->Cell(189, 5, "අපේක්ෂා රෝහල - මහරගම", 0, 1, 'C');  //189 IS TOTAL WIDTH OF A4, HEIGHT, BORDER,LINE
            // $this->SetFont('helvetica','B',12);
            // $this->Cell(189, 5, "அபேக்ஷா வைத்தியசாலை - மஹரகம", 0, 1, 'C');
            // $this->SetFont('helvetica','B',12);
            // $this->Cell(189, 5, "APEKSHA HOSPITAL -  MAHARAGAMA", 0, 1, 'C');
            // $this->SetFont('helvetica','', 10);
            // $this->Cell(189, 3, "Maharagama", 0, 1, 'C');
            // $this->Cell(189, 3, "SriLanka", 0, 1, 'C');
            // $this->Cell(189, 3, "Phone: 011-2850252/2850253. Fax: 011-2842051", 0, 1, 'C');
            // $this->Cell(189, 3, "Email: donationunit@gmail.com", 0, 1, 'C');
            // $this->Cell(189, 3, "Web: www.ncisl.health.gov.lk", 0, 1, 'C');
            // $this->Ln(60);
            // $this->SetFont('helvetica','B', 11);
            // $this->Cell(189, 1, "Acknowledgement Of a Donation", 0, 1, 'C');
            // $this->Ln(1);
            // $this->Cell(189, 5, "______________________________", 0,0,'C');
            

        }
        public function Footer()
        {
            $m=40;
            $this->SetY(-190);//position at 15mm from bottom
            // $this->Ln(1);
            // $this->SetFont('times','B', 11);
            // $this->MultiCell(189, 15, "It is with immense gratitude we thank you for the thoughtful and Generous Gesture for the Donation of Following items to Apeksha Hospital.", 0, 'L', 0, 1, '', '', true);
            // $this->Ln(1);
            // $this->SetFont('times','B', 11);
            // $this->MultiCell(189, 15, "Your valuable Donation will be of great help in improving the patient care services at the Apeksha Hospital Maharagama.where a large number of cancer patients from all over the island are treated.", 0, 'L', 0, 1, '', '', true);
            // $this->MultiCell(189, 15, "We look forward to your continue support in our endeavours to provide efficient and effective patient care services at this Hospital.", 0, 'L', 0, 1, '', '', true);
            // $this->Ln(90);
            // $this->Cell(20, 1, "Thank you.", 0,0);
            // $this->Ln(10);
            // $this->Cell(20, 1, "Sincerely,", 0,0);
            // $this->Ln(12);
            // //$this->SetFont('times','B', 10);
            // $this->Cell(20, 1, "__________________", 0,0);
            // $this->Cell(118, 1, "", 0,0);
            // $this->Cell(51, 1, "__________________", 0,1);
            // $this->Cell(20, 5, "Director Signature", 0,0);
            // $this->Cell(118, 5, "", 0,0);
            // $this->Cell(51, 5, "Donor Signature", 0,0);
            // $this->Ln(6);
            // $this->Cell(20, 7, "Apeksha Hospital-Maharagama.", 0,0);
            // //8+181=189
            // $this->Cell(8, 1, "", 0,0);
            
            
            $tagvs = array(
                'p' => array(0 => array('n' => 0, 'h' => ''), 1 => array('n' => 0, 'h' => ''))
                );
                $this->setHtmlVSpace($tagvs);

            
            $imgfilem = K_PATH_IMAGES.'hdms logo copy.jpg';
            $this->Image($imgfilem, 90, 270, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            $this->Ln(15);
            $this->SetFont('helvetica','I', 6);
            //page number
            date_default_timezone_set("Asia/Colombo");
            $today = date("F j, Y/ g:i A", time());
            
            $uname=$_SESSION['username'];

            $this->Cell(20, 5, 'Generation Dte/Time: '.$today,0,0, 'L');
            $this->Cell(10, 15, 'Issued By: '.$uname,0,0, 'C');
            $this->Cell(159, 5, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        }       
}

// create new PDF document
global $pdf;
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('National Cancer Institute');
$pdf->SetTitle('Donation');
$pdf->SetSubject('');
$pdf->SetKeywords('');



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$pdf->Ln(35); //height
$date = date('d-m-Y');
$pdf->setFont('times','B',10);
$pdf->Ln(20);
if($type=='team'){
    $pdf->Cell(130,5, 'Company/Team :'.$namet.'',0,0,'L');
    $pdf->Ln(6);
    $pdf->Cell(130,5, ''.$date.'',0,0);
    $pdf->Ln(10);
    $pdf->SetFillColor(224, 235, 255);
    $pdf->Cell(10,5,'#',1,0,'C',1);
    $pdf->Cell(50,5,'Member Name',1,0,'C',1);
    $pdf->Cell(30,5,'NIC',1,0,'C',1);
    $pdf->Cell(30,5,'Contact no',1,0,'C',1);
    $pdf->Cell(60,5,'Email',1,1,'C',1);
    $pdf->setFont('times','',10);
    $pdf->Ln(3); 
   $arr=array(); 
$sqls="SELECT * FROM `donor_team` WHERE `donor_name`='$uid1' AND `deletestatus` = 0";
$rs=mysqli_query($con,$sqls);

$i=1;
$mx=6;	
while($row=mysqli_fetch_array($rs)){
    $arr[]=$row;
    $titl = $row['title'];
    $membr=$row['membername'];
    $nic = $row['national_idt'];
        $cn=$row['contact_not'];
        $em=$row['emailt'];
    

$pdf->Cell(10,4,$i,0,0,'C');
$pdf->Cell(50,4,$titl.'.'.$membr,0,0,'C');
$pdf->Cell(30,4,$nic,0,0,'C');
$pdf->Cell(30,4,$cn,0,0,'C');
$pdf->Cell(60,4,$em,0,1,'C');
$i++;

}

} else {

$pdf->setFont('times','',10);
$pdf->Cell(130,5, $title.'.'.$name.'',0,0,'L');
$pdf->Ln(6);

$pdf->Cell(130,5, ''.$add1.'',0,0);
$pdf->Ln(6);
$pdf->Cell(130,5, ''.$add2.'',0,0);
$pdf->Ln(6);
$pdf->Cell(130,5, ''.$nic.'',0,0);
$pdf->Ln(6);
// $pdf->Cell(130,5, ''.$ct1.'',0,0);
// $pdf->Ln(6);
// $pdf->Cell(130,5, ''.$mail.'',0,1);
// $pdf->Ln(6);
$pdf->Cell(130,5, ''.$date.'',0,0);
}
$pdf->Ln(5);
$pdf->SetFont('helvetica','B', 11);
$pdf->Cell(185, 1, "Acknowledgement Of a Donation", 0, 1, 'C');
$pdf->Ln(5);
// $pdf->AddPage();
// $pdf->Ln(40); //height
// $this->Ln(1);
$pdf->SetFont('times','B', 11);
$pdf->MultiCell(189, 15, "It is with immense gratitude we thank you for the thoughtful and Generous Gesture for the Donation of Following items to Apeksha Hospital.", 0, 'L', 0, 1, '', '', true);
$pdf->setFont('times','B',10);
$pdf->Ln(2);

    // $pdf->Cell(130,5, 'Company/Team :'.$namet.'',0,0,'L');
    // $pdf->Ln(6);
    // $pdf->Cell(130,5, ''.$date.'',0,0);
    // $pdf->Ln(20);
    
    $pdf->SetFillColor(224, 235, 255);
    $pdf->Cell(20,5,'No',1,0,'C',1);
    $pdf->Cell(60,5,'Item Name',1,0,'C',1);
    $pdf->Cell(40,5,'Item Qty',1,1,'C',1);
    // $pdf->Cell(60,5,'Email',1,1,'C',1);
    $pdf->setFont('times','',10);
    $pdf->Ln(3); 
 $arrv=array(); 
$sqlv= "SELECT `donationNum`,`donation_id`,`item_id`,`itemname`,`item_name`,SUM(`item_qty`) as `qty` FROM `item_table` INNER JOIN donation ON item_table.donationNum = donation.donation_id INNER JOIN `item_name` ON item_table.`item_name` = item_name.`code` WHERE donation.`donorName`='$uid1' AND `receive_date`= (SELECT MAX(`receive_date`) FROM `item_table`) AND `deleted` = 0 GROUP BY `itemname` ";
$rsv=mysqli_query($con,$sqlv);

$m=1;
$mxv=6;	
while($rowv=mysqli_fetch_array($rsv)){
    $arrv[]=$rowv;
    $item=$rowv['itemname'];
    $qty=$rowv['qty'];

    

$pdf->Cell(20,4,$m,0,0,'C');
$pdf->Cell(60,4,$item,0,0,'C');
$pdf->Cell(40,4,$qty,0,1,'C');
 $m++;
//  return $m;
}
$pdf->Ln(6);
$pdf->SetFont('times','B', 11);
$pdf->MultiCell(189, 15, "Your valuable Donation will be of great help in improving the patient care services at the Apeksha Hospital Maharagama.where a large number of cancer patients from all over the island are treated.", 0, 'L', 0, 1, '', '', true);
$pdf->MultiCell(189, 15, "We look forward to your continue support in our endeavours to provide efficient and effective patient care services at this Hospital.", 0, 'L', 0, 1, '', '', true);
$pdf->Ln(3);
            $pdf->Cell(20, 1, "Thank you.", 0,0);
            $pdf->Ln(4);
            $pdf->Cell(20, 1, "Sincerely,", 0,0);
            $pdf->Ln(7);
            $imgfilem = K_PATH_IMAGES.'sign.jpg';
            $pdf->Image($imgfilem, 10, '', '', '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $pdf->Ln(3);
            $pdf->Cell(20, 1, "__________________", 0,0);
            $pdf->Cell(118, 1, "", 0,0);
            $pdf->Cell(51, 1, "", 0,1);
            $pdf->Cell(20, 5, "Director Signature", 0,0);
            $pdf->Cell(118, 5, "", 0,0);
            // $pdf->Cell(51, 5, "Donor Signature", 0,0);
            $pdf->Ln(6);
            $pdf->Cell(20, 7, "Apeksha Hospital-Maharagama.", 0,0);
            //8+181=189
            $pdf->Cell(8, 1, "", 0,0);


}
$pdf->Output('generate.pdf', 'I');


?>
<!-- <script src="/HospitalDonation/assets/js/scriptD.js"></script>  -->