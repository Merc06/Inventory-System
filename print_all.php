<?php
    date_default_timezone_set('Asia/Taipei');
    ini_set("session.gc_maxlifetime", "28800");
    $current_date = date('m/d/Y h:i:s a', time());
    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    //var_dump(get_class_methods($pdf));

    $pdf->AddPage('L','A3');
    include_once "includes/db_con.php";
    include "includes/session.php";


$adminQuery = "SELECT * FROM admin_user WHERE admin_id = '".$_SESSION['id']."'";
$adminResult = mysqli_query($conn, $adminQuery);
$admin = mysqli_fetch_array($adminResult);
$fn = $admin['firstname'];
$ln = $admin['lastname'];
$admin = "$fn $ln";
//var_dump($admin);

///////////////////////////////////////////////////////

///////////////////////////////////////////////////////

$query = "SELECT * FROM income_tbl INNER JOIN branch ON income_tbl.branch_id = branch.branch_id             INNER JOIN items ON income_tbl.item_id = items.item_id INNER JOIN brand ON                       income_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON income_tbl.receiver_id =           admin_user.admin_id";


$sql = mysqli_query($conn, $query);

$pdf->SetFont("Arial","B","14");
$pdf->Image('images/logo-lrwc.png',40,10,40);
$pdf->Cell(0,5,"LEISURE & RESORT'S WORLD CORP.",0,1,"C");
$pdf->SetFont("Arial","B","12");
$pdf->Cell(0,10,"ITMS INVENTORY",0,1,"C");
$pdf->SetFont("Arial","B","10");
$pdf->Cell(0,10,"Phil. Stock Exchange 26th flr. West Tower",0,1,"C");
$pdf->ln();
$pdf->SetFont("Arial","B","10");
$pdf->Cell(0,10,"Approval 'PULLOUT' (0 = Not approve, 1 = Approved)",0,1,"C");

$pdf->SetFont("Arial","B","12");
$pdf->Cell(0,10,"Incoming Report's",1,1,"C");

$pdf->SetFont("Arial","","14");


$pdf->SetFont("Arial","B","8");
$pdf->Cell(30,10,"Date",1,0,"C");
$pdf->Cell(50,10,"Branch",1,0,"C");
$pdf->Cell(30,10,"Contact Person",1,0,"C");
$pdf->Cell(30,10,"Contact#",1,0,"C");
$pdf->Cell(30,10,"Item",1,0,"C");
$pdf->Cell(30,10,"Brand",1,0,"C");
$pdf->Cell(25,10,"Serial#",1,0,"C");
$pdf->Cell(25,10,"Lrwc#",1,0,"C");
$pdf->Cell(30,10,"Receiver",1,0,"C");
$pdf->Cell(50,10,"Status",1,0,"C");
$pdf->Cell(50,10,"Remarks",1,0,"C");
$pdf->Cell(20,10,"Approval",1,0,"C");


$pdf->ln();

while ($row = mysqli_fetch_array($sql)){
    $id = $row['id'];
    $date = $row['date'];
    $branch_name = $row['branch_name'];
    $con_person = $row['con_person'];
    $contact = $row['contact'];
    $item_name = $row['item_name'];
    $brand_name = $row['brand_name'];
    $serial = $row['serial'];
    $lrwc = $row['lrwc'];
    $receiver_last = $row['lastname'];
    $receiver_first = $row['firstname'];
    $status = $row['status'];
    $remarks = $row['remarks'];
    $approval = $row['for_pullout'];

	$pdf->SetFont("Arial","","8");
	$pdf->Cell(30,10,$date,1,0,"C");
	$pdf->Cell(50,10,$branch_name,1,0,"C");
    $pdf->Cell(30,10,$con_person,1,0,"C");
	$pdf->Cell(30,10,$contact,1,0,"C");
    $pdf->Cell(30,10,$item_name,1,0,"C");
	$pdf->Cell(30,10,$brand_name,1,0,"C");
	$pdf->Cell(25,10,$serial,1,0,"C");
    $pdf->Cell(25,10,$lrwc,1,0,"C");
    $pdf->Cell(30,10,$receiver_last,1,0,"C");
    $pdf->Cell(50,10,$status,1,0,"C");
    $pdf->Cell(50,10,$remarks,1,0,"C");
    $pdf->Cell(20,10,$approval,1,0,"C");

	$pdf->ln();
}

$query = "SELECT * FROM outgoing_tbl INNER JOIN branch ON outgoing_tbl.branch_id =                          branch.branch_id INNER JOIN items ON outgoing_tbl.item_id = items.item_id INNER JOIN              brand ON outgoing_tbl.brand_id = brand.brand_id INNER JOIN admin_user ON                          outgoing_tbl.receiver_id = admin_user.admin_id";

$sql = mysqli_query($conn, $query);

$pdf->ln();

$pdf->SetFont("Arial","B","12");
$pdf->Cell(0,10,"Outgoing Report's",1,1,"C");

$pdf->SetFont("Arial","","14");


$pdf->SetFont("Arial","B","8");
$pdf->Cell(30,10,"Date",1,0,"C");
$pdf->Cell(50,10,"Branch",1,0,"C");
$pdf->Cell(30,10,"Contact Person",1,0,"C");
$pdf->Cell(30,10,"Contact#",1,0,"C");
$pdf->Cell(30,10,"Item",1,0,"C");
$pdf->Cell(30,10,"Brand",1,0,"C");
$pdf->Cell(25,10,"Serial#",1,0,"C");
$pdf->Cell(25,10,"Lrwc#",1,0,"C");
$pdf->Cell(30,10,"Receiver",1,0,"C");
$pdf->Cell(50,10,"Status",1,0,"C");
$pdf->Cell(50,10,"Remarks",1,0,"C");
$pdf->Cell(20,10,"Approval",1,0,"C");


$pdf->ln();

while ($row = mysqli_fetch_array($sql)){
    $id = $row['id'];
    $date = $row['date'];
    $branch_name = $row['branch_name'];
    $con_person = $row['con_person'];
    $contact = $row['contact'];
    $item_name = $row['item_name'];
    $brand_name = $row['brand_name'];
    $no_units = $row['no_units'];
    $serial = $row['serial'];
    $lrwc = $row['lrwc'];
    $receiver_last = $row['lastname'];
    $receiver_first = $row['firstname'];
    $status = $row['status'];
    $remarks = $row['remarks'];
    $approval = $row['for_pullout'];

	$pdf->SetFont("Arial","","8");
	$pdf->Cell(30,10,$date,1,0,"C");
	$pdf->Cell(50,10,$branch_name,1,0,"C");
    $pdf->Cell(30,10,$con_person,1,0,"C");
	$pdf->Cell(30,10,$contact,1,0,"C");
    $pdf->Cell(30,10,$item_name,1,0,"C");
	$pdf->Cell(30,10,$brand_name,1,0,"C");
	$pdf->Cell(25,10,$serial,1,0,"C");
    $pdf->Cell(25,10,$lrwc,1,0,"C");
    $pdf->Cell(30,10,$receiver_last,1,0,"C");
    $pdf->Cell(50,10,$status,1,0,"C");
    $pdf->Cell(50,10,$remarks,1,0,"C");
    $pdf->Cell(20,10,$approval,1,0,"C");

	$pdf->ln();
}

  $pdf->ln(10);
  $pdf->SetFont("Arial","","10");
  $pdf->Cell(0,10,"Printed Date: ",0,1,"L"); 
  $pdf->Cell(0,10,$current_date,0,1,"L");
  $pdf->SetFont("Arial","","10");
  $pdf->Cell(0,10,"Prepared By: {$admin}",0,1,"L"); 

$pdf->Output();
?>