 <html>
    <head>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </head>
    <body>

<button type="button">Add more !</button>
 <table id="customers">
  
      <!-- <tr>
         <td><input type="text" name="product" value="product.."></input></td>
        <td><input type="number" name="quantity" value="quanty.."></input></td>
        <td><input type="number" name="price" value="price.."></input></td>
      </tr> -->

 </table>

  <script>

     $(document).ready(function(){

       $("button").on("click", function(){

         var row = '<tr><td><input type="text" name="product" value="product.."></input></td><td><input type="number" name="quantity" value="quanty.."></input></td><td><input type="number" name="price" value="price.."></input></td></tr>';

         $("#customers").append(row);

       });

     });

    </script>

    </body>
    </html>
    <?php
    /*$pdf->Cell(55,5,'Cert. No. MC-2114 : ',0,0);
$pdf->Cell(58,5,'A.U ID: 1755768 : ',0,0);
$pdf->Cell(50,5,'RQ 91/ 8492 : ',0,0);
*/
/*$pdf->Cell(150,5,'Diagno Labs',0,1,'R');
$pdf->Cell(170,5,'138, Pace City-1, Sector 37, ',0,1,'R');
$pdf->Cell(156,5,'Gurgaon-122001,',0,1,'R');
$pdf->Cell(152,5,'Haryana, India',0,1,'R');
$pdf->Cell(172,5,'Tel : 0124 4917895/896/897/898',0,1,'R');*/


/*$pdf->Cell(50,5,$labname,0,1);
$pdf->SetFont('','',8);
$pdf->Cell(50,5,$labaddress,0,1);
$pdf->Cell(50,5,$pincode,0,1);
$pdf->Cell(50,5,$labstate,0,1);
$pdf->Cell(50,5,$labcontact,0,1);
$pdf->Line(10,60,200,60);
*/


/*$pdf->Cell(30,5,'REGISTERED ON :',0,0);
$pdf->Cell(30,5,'16/11/2019 15:56',0,0);*/

/*$pdf->Cell(30,5,'REPORTED ON:',0,0);
$pdf->Cell(30,5,'16/11/2019 19:36',0,1);*/



/*$pdf->Line(10,80,200,80);*/

/*$pdf->Line(10,82,200,82);*/

/*Signature*/



/*$pdf->Cell(35,5,'4.Address : ',0,0);
$pdf->Cell(20,5,$address,0,1);

$pdf->Cell(35,5,'5.Mobile : ',0,0);
$pdf->Cell(20,5,$mobile,0,1);*/

