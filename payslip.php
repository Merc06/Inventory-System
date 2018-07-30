<?php
require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage('L','A4');

    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(40,7,'ALLPOINT LEISURE CORP. - CENTER POINT                                 ALLPOINT LEISURE CORP. - CENTER POINT');
    
    $pdf->ln();
    $pdf->ln();

    $pdf->SetFont('Times','B',11);
    $pdf->Cell(40,7,'Payroll Voucher DATE                  January 16-31,2018                                                                          Payroll Voucher DATE                  January 16-31,2018');

    $pdf->ln();

    $pdf->SetFont('Times','B',13);
    $pdf->Cell(40,7,'NAME                               MERC                                                                                     NAME                               MERC');

    $pdf->ln();

    $pdf->SetFont('Times','B',12);
    $pdf->Cell(40,7,'Basic Salary                                                10,812.00                                                                   Basic Salary                                                10,812.00');

    $pdf->ln();

    $pdf->SetFont('Times','B',12);
    $pdf->Cell(40,7,'Reg. OT                                                            389.00                                                                   Reg. OT                                                            389.00');

    $pdf->ln();

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40,7,'                                                      ___________________                                                                                                     ___________________');

    $pdf->ln();
    
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(40,7,'Total                                                            12,144.78                                                                    Total                                                            12,144.78');

    $pdf->ln();

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40,0,'                                                      ___________________                                                                                                     ___________________');

    $pdf->ln();

    $pdf->SetFont('Times','B',12);
    $pdf->Cell(40,7,'Less - Deduction                                                                                                                            Less - Deduction');

    $pdf->ln();

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(40,7,'                              Absences                                            831.69                                                                                                                 Absences                                              831.69');

    $pdf->ln();

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(40,7,'                              Tardines                                               17.67                                                                                                                 Tardines                                               17.67');

    $pdf->ln();

    $pdf->SetFont('Times','',12);
    $pdf->Cell(40,7,'                                                          _____________________                                                                                                                   _____________________');

    $pdf->ln();
    
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(40,7,'Total - Deductions                                       2,640.74                                                                    Total - Deductions                                         2,640.74');

    $pdf->ln();

    $pdf->SetFont('Times','',12);
    $pdf->Cell(40,0,'                                                          _____________________                                                                                                                   _____________________');

    $pdf->ln();
    
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(40,12,'NET PAY                                                     2,640.74                                                                  NET PAY                                                         2,640.74');

    $pdf->ln();

    $pdf->SetFont('Times','',12);
    $pdf->Cell(40,-4,'                                                          _____________________                                                                                                                   _____________________');

    $pdf->ln();
    
    $pdf->Output();
?>