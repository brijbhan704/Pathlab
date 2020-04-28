<?php
require('fpdf17/fpdf.php');
include('includes/dbconnection.php');
		


class PDF extends FPDF {			
	function Header(){
		/*$mobile = $_POST['mobile'];
		$sql = mysqli_query("SELECT * FROM patient WHERE mobile='$mobile'");
		$data = mysqli_fetch_assoc($con,$sql);
		echo $mobile;die;*/		
		//$register =$data['created'];
		//echo $register;die;
		
		$name=$_POST['name'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$mobile = $_POST['mobile'];
		$result=$_POST['result'];
		$lab=$_POST['lab'];
		$accession = $_POST['accession'];
		$labname=$_POST['labname'];
		$labaddress=$_POST['labaddress'];
		$pincode=$_POST['pincode'];
		$labcontact=$_POST['labcontact'];
		$labstate=$_POST['labstate'];
		$doctorname=$_POST['doctorname'];
		$collectedon=$_POST['collectedon'];		
		$sub_category_id = $_POST['sub_category'];
		$this->SetFont('Arial','B',8);
		$this->Cell(150);
		$this->Image('images.jpg',10,10,20);
		/*$this->Image('logo.png',60,15,20);*/
		$this->Cell(100,5,'Diagno Labs',0,1);
		$this->Cell(150);
		$this->Cell(170,5,'138, Pace City-1, Sector 37, ',0,1);
		$this->Cell(150);
		$this->Cell(156,5,'Gurgaon-122001,',0,1);
		$this->Cell(150);
		$this->Cell(152,5,'Haryana, India',0,1);
		$this->Cell(150);
		$this->Cell(172,5,'Tel : 0124 4917895/896/897/898',0,1);
		$this->Line(10,36,200,36);
		$this->Cell(50,5,$labname,0,1);
		$this->SetFont('','',8);
		$this->Cell(50,5,$labaddress,0,1);
		$this->Cell(50,5,$pincode,0,1);
		$this->Cell(50,5,$labstate,0,1);
		$this->Cell(50,5,$labcontact,0,1);
		$this->Line(10,60,200,60);
		$this->SetFont('Arial','B',8);
		$this->Cell(20,5,'NAME :',0,0);
		$this->Cell(50,5,$name,0,0);
		$this->Cell(20,5,'AGE :',0,0);
		$this->Cell(20,5,$age.' Year',0,0);
		$this->Cell(20,5,'SEX :',0,0);
		$this->Cell(20,5,$gender,0,0);
		$this->Cell(20,5,'MOBILE NO.:',0,0);
		$this->Cell(20,5,$mobile,0,1);
		$this->SetFont('Arial','',8);
		$this->Cell(30,5,'LAB REF NO.:',0,0,'L');
		$this->SetFont('Arial','B',8);
		$this->Cell(20,5,$lab,0,0,'L');
		$this->SetFont('Arial','',8);
		$this->Cell(30,5,'ACCESSION NO.:',0,0,'C');
		$this->SetFont('Arial','B',8);
		$this->Cell(30,5,$accession,0,1,'C');
		$this->SetFont('Arial','',8);
		$this->Cell(30,5,'COLLECTED ON :',0,0);
		$this->Cell(30,5,$collectedon,0,0);
		$this->Cell(30,5,'REGISTERED ON :',0,0);
		$this->Cell(30,5,'16/11/2019 15:56',0,0);
		$this->Cell(30,5,'REPORTED ON:',0,0);
		$this->Cell(30,5,'16/11/2019 19:36',0,1);
		$this->SetFont('Arial','B',8);
		$this->Cell(30,5,'Report Status :',0,0);
		$this->Cell(30,5,'Final',0,0);
		$this->Cell(30,5,'REFERRED BY :',0,0);
		$this->SetFont('Arial','',8);
		$this->Cell(30,5,'DR.'.$doctorname,0,1);
		$this->SetFont('Arial','B',9);
		$this->Cell(70,8,'Tests',0,0);
		$this->Cell(50,8,'Result',0,0);
		$this->Cell(60,8,'Biological Reference Range',0,0);
		$this->Cell(40,8,'Units',0,1);
		$this->Line(10,80,200,80);
		$this->Cell(190,8,'HEMATOLOGY',1,1,'C');		
		}
		function Footer(){

		$this->SetFont('Arial','',8);
			/*$this->Line(155, 75, 195, 75);
			$this->Ln(5);//Line break
			$this->Cell(140, 5, '', 1, 0);
			$this->Cell(50, 5, ': Signature',1, 1, 'C');*/
$this->Image('http://localhost/pathlab/Pathlab-Admin-Panel/qr_codegenerator.php?code=Dr.TestPathlab.com',10,260,30,30,'png');
		$this->SetY(-30);
		$this->Cell(0,10,'This report belongs to Diagno Labs. Reproduction of Reports is not Permitted.',0,0,'C');
		$this->Cell(-10,10,'Page '.$this->PageNo()." of {pages}",0,0,'R');
			}
		}
$note=$_POST['note'];		
$instruction=$_POST['instruction'];
$result=$_POST['result'];
$category_id = $_POST['category'];
$sub_category_id = $_POST['sub_category'];

$sub_category_id1 = $_POST['sub_category1'];
$results = $_POST['sub_result'];
//echo $sub_category_id1;die;

$wholeTestName = $_POST['wholetestname'];
$wholeTestResult = $_POST['wholetest'];
//$result = $_POST['result'];
$query = mysqli_query($con,"SELECT * FROM sub_category WHERE id='$category_id'");
$a = mysqli_fetch_assoc($query);
$cat =  $a['test_name'];
//echo $cat;die;\
$query1 = mysqli_query($con,"SELECT * FROM sub_category WHERE id='$sub_category_id'");
$ab = mysqli_fetch_assoc($query1);
$sub_cat =  $ab['test_name'];
//echo $sub_cat;die;

$query2 = mysqli_query($con,"SELECT * FROM sub_category WHERE id='$sub_category_id1'");
$ab1 = mysqli_fetch_assoc($query2);
$sub_cat1 =  $ab1['test_name'];
//echo $sub_cat1;die;

// cerate pdf
$pdf=new PDF('P','mm','A4');
/*all Pages*/
$pdf->AliasNbpages('{pages}');
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);


$pdf->SetFont('Arial','B',8);

$pdf->Cell(70,5,$cat,0,1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,$sub_cat,0,1);
$pdf->Cell(60,5,$sub_cat1,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(70,5,$cat.' WHOLE BLOOD COUNT ,WHOLE BLOOD',0,1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'Low 12.0-15.0',0,0);
$pdf->Cell(50,5,'g/dL',0,1);

$pdf->SetFont('Arial','BU',8);
$pdf->Cell(50,10,'Interpretation(s)',0,1);
$pdf->SetFont('Arial','',7);
$pdf->MultiCell(190,3,'Note:'.$note,0,1);

$pdf->MultiCell(70,5,'*:'.$instruction,0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,5,'ERYTHROCYTE SEDIMENTATION RATE, WHOLE BLOOD',0,1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,$wholeTestName,0,0);
$pdf->Cell(45,5,$wholeTestResult,0,0);
$pdf->Cell(65,5,'High 0 - 15',0,0);
$pdf->Cell(50,5,'mm/hr',0,1);


/*second page*/

$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,5,'ERYTHROCYTE SEDIMENTATION RATE, WHOLE BLOOD',0,1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,$sub_cat,0,0);
$pdf->Cell(45,5,$result,0,0);
$pdf->Cell(65,5,'High 0 - 15',0,0);
$pdf->Cell(50,5,'mm/hr',0,1);

//possition
$chartX=10;
$chartY=120;

//dimesion
$chartWidth=150;
$chartHeight=100;

//padding
$chartTopPadding = 10;
$chartLeftPadding = 20;
$chartBottomPadding = 20;
$chartRightPadding = 5;

//chartbox
$chartBoxX = $chartX + $chartLeftPadding;
$chartBoxY = $chartY + $chartLeftPadding;
$chartBoxWidth = $chartWidth - $chartLeftPadding - $chartRightPadding;
$chartBoxHeight = $chartHeight - $chartLeftPadding - $chartBottomPadding;

//bar width
$barWidth =20;

//chart data
$data = Array(
				'PRE DIABETES'=>[
				'color'=>[255,0,0],
				'value'=>100	
				],

				'GOOD CONTROL'=>[
				'color'=>[255,255,0],
				'value'=>300	
				],

				'FAIR CONTROL'=>[
				'color'=>[50,0,255],
				'value'=>150	
				],

				'ACTION SUGGESTED'=>[
				'color'=>[0,255,0],
				'value'=>240	
				]
		);

//data max
$dataMax = 0;
foreach ($data as $item) {
	if ($item['value'] > $dataMax)$dataMax=$item['value'] ;

}

//data step

$dataStep = 50;

// set font width line and color
$pdf->SetFont('Arial','',9);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0);

//cahrt noundry

//$pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);
//vertical Line
	$pdf->Line(
			$chartBoxX,
			$chartBoxY,
			$chartBoxX,
			$chartBoxY+$chartBoxHeight
				);

		$pdf->Line(
			$chartBoxX-2,
			$chartBoxY+$chartBoxHeight,
			$chartBoxX+$chartBoxWidth,
			$chartBoxY+$chartBoxHeight
				);

//vertical Axis

$yAxixUnits = $chartBoxHeight / $dataMax;
//draw the vertical y axis
for ($i=0; $i < $dataMax; $i+=$dataStep) { 
	//y position
	$yAxixPos = $chartBoxY + ($yAxixUnits * $i);

	//draw y axis line

	$pdf->Line(
				$chartBoxX-2,
				$yAxixPos,
				$chartBoxX,
				$yAxixPos
					);
	//set cell position for y axis
	$pdf->SetXY ($chartBoxX - $chartLeftPadding , $yAxixPos-2 );
	$pdf->Cell($chartLeftPadding - 4 ,5, $dataMax-$i,0,0,'R');
}

$pdf->SetXY ($chartBoxX , $chartBoxY + $chartBoxHeight );
//horizental axis
//set cell position

$xLabelWidth = $chartBoxWidth / count($data);
$barXPos = 0;
foreach ($data as $itemName => $item) {
	//print the label
	$pdf->Cell($xLabelWidth,5,$itemName,0,0,'C');

//draw the bar
	//bar color
	$pdf->SetFillColor($item['color'][1],$item['color'][2],$item['color'][2]);
	//bar Height
	$barHeight = $yAxixUnits * $item['value'];
	//bar x position
	$barX = ($xLabelWidth / 2) + ($xLabelWidth * $barXPos);
	$barX = $barX-($barWidth / 2);
	$barX = $barX + $chartBoxX;

	//bar Y position

	$barY = $chartBoxHeight - $barHeight;
	$barY = $barY + $chartBoxY;

	//draw the bar

	$pdf->Rect($barX , $barY, $barWidth , $barHeight);
	$barXPos++;

}
$pdf->SetFont('Arial','B',8);
$pdf->SetXY($chartX,$chartY);
$pdf->Cell(100,30,'[%]');
$pdf->SetXY(($chartWidth / 2)-50+$chartX, $chartY+$chartBoxHeight-($chartBottomPadding / 2));
$pdf->Cell(100,90,'[MIN]',0,0,'C');

$pdf->Output();
// link of  google analytics for electronic shop website 
//https://analytics.google.com/analytics/web/?authuser=0#/a153628650w216963194p207165516/admin/trackinginfo/dataretention 
?>


