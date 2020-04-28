<?php
function ReportInfo($rpt='')
{
	global $d, $v, $pdf, $version_id;
	NewSection("Report Information", 120);
	tab();
	$pdf->Cell(75, 10, 'Ordered By:');
	$pdf->Cell(210, 10, $v['ord_rqstr_name']);
	$pdf->Cell(50, 10, 'Phone:');
	$pdf->Cell(0, 10, $v['ord_rqstr_phone'], 0, 1);
	tab();
	$pdf->Cell(75, 10, 'Company:');
	$pdf->Cell(210, 10, $v['ord_rqstr_company']);
	$pdf->Cell(50, 10, 'Email:');
	$pdf->Cell(0, 10, $v['ord_rqstr_email'], 0, 1);
	
	$pdf->Ln(5);
	tab();
	$txt = $v['ord_ship_method'];
	$pdf->Cell(75, 10, 'Delivery Method:');
	$pdf->Cell(0, 10, $txt, 0, 1);
	$pdf->Ln(3);
	if ($txt == "Email") {
		tab();
		$txt = $v['ord_ship_email'];
		if (!$txt > '') $txt = $v['ord_rqstr_email'];
		if ($v['ord_addl_emails'] > '') $txt .= ';' . $v['ord_addl_emails'];
		$pdf->Cell(75, 10, 'Send To:');
		$pdf->MultiCell(0, 9, $txt);
		$pdf->Ln(2);
	} else {
		tab();
		if ($txt == "Office Pickup") $txt = "Hold For:";
		else $txt = "Ship To:";
		$pdf->Cell(75, 10, $txt);
		$myX = $pdf->GetX();
		$pdf->Cell(0, 10, $v['ord_ship_name'], 0, 1);
		$txt = $v['ord_ship_extra'];
		if ($txt > '') { 
			$pdf->SetX($myX);
			$pdf->Cell(0, 10, $txt, 0, 1);
		}
		$txt = $v['ord_ship_addr'];
		if ($txt > '') { 
			$pdf->SetX($myX);
			$pdf->Cell(0, 10, $txt, 0, 1);
		}
		$txt = $v['ord_ship_city'];
		if ($txt > '' && $v['ord_ship_state'] > '') $txt .= ", " . $v['ord_ship_state'];
		$txt = trim($txt .= "  " . $v['ord_ship_zip']);
		if ($txt > '') {
			$pdf->SetX($myX);
			$pdf->Cell(0, 10, $txt, 0, 1);
		}
		$txt = $v['ord_ship_country'];
		if ($txt > '') {
			$pdf->SetX($myX);
			$pdf->Cell(0, 10, $txt, 0, 1);
		}
		$txt = $v['ord_ship_phone'];
		if ($txt > '') {
			tab();
			$pdf->Cell(75, 10, "Phone:");
			$pdf->Cell(0, 10, $txt);
		}
		$txt = $v['ord_ship_email'];
		if ($txt > '') {
			tab();
			$pdf->Cell(75, 10, "Email:");
			$pdf->Cell(0, 10, $txt, 0, 1);
		}
		$txt = $v['ord_ship_tracking'];
		if ($txt > '') {
			tab();
			$pdf->Cell(75, 10, "Tracking #:");
			$pdf->Cell(0, 10, $txt, 0, 1);
		}
	}
	
	if ($rpt != "CAInfo" && $rpt != "Occupancy") {
		$pdf->Ln(5);
		TestNewPage(100);
		tab();
		$tst = $v['ca_name'];
		if (substr($tst, strlen($tst) - 1, 1) == ".") $tst = substr($tst, 0, strlen($tst) - 1);
		$txt = "This report was issued by " . $v['cam_name'] . " on behalf of " . $tst 
			 . ".  Questions regarding its content should be directed to:";
		$pdf->MultiCell(0, 9, $txt);
		$pdf->Ln(2);
		
	// CUSTOM LOGIC FOR CWD GROUP	
		$unfull = '';
		$uemail = '';
		$uphone = '';
	
		if ($v['ord_cam'] == 6 && $_SESSION['sn_user_type'] != "System Admin") {
			$unfull 	= $_SESSION['sn_user_short_name'];
			$uphone 	= $_SESSION['sn_user_phone_pri'];
			$uemail	= $_SESSION['sn_user_email'];
		}
		
		if (strlen($unfull) == 0) {
			$unfull = $v['cam_primary_name'];
			$uphone = $v['cam_primary_phone'];
			$uemail = $v['cam_primary_email'];
		}
		tab();
		$pdf->Cell(0, 10, $unfull, 0, 1, "C");
		tab();
		$pdf->Cell(0, 10, $uphone, 0, 1, "C");
		tab();
		$pdf->Cell(0, 10, $uemail, 0, 1, "C");
	} // end of not CAInfo or Occupancy
	
	$pdf->SetFont('', "I", 4);
	$pdf->Cell(50, 5, "Ver. " . $version_id);
	$txt = $v['ord_id'] . " / " . $v['ca_id'] . " / " . $v['home_id'];
	$pdf->Cell(0, 5, $txt, 0, 1, "R");
	
	tab();
	$pdf->SetFont('Arial', "I", 6);
	$txt = "Created using software provided by Association Data, Inc., (877) 247-2515.";
	$pdf->Cell(0, 10, $txt , 0, 0, "C");

	$pdf->SetFont('', '', 8);
	$_SESSION['sn_section'] = "";
	
}

?>

