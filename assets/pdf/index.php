<?php
require('html_table.php');

$htmlTable='<table>
<tr>
<td>S. No.</td>
<td>Product</td>
<td>Price</td>
<td>Quantity</td>
<td>Total</td>
</tr>

<tr>
<td>1</td>
<td>Azeem</td>
<td>24</td>
<td>Male</td>
<td>Pakistan</td>
</tr>

<tr>
<td>2</td>
<td>Atiq</td>
<td>24</td>
<td>Male</td>
<td>Pakistan</td>
</tr>

<tr>
<td>3</td>
<td>Shahid</td>
<td>24</td>
<td>Male</td>
<td>Pakistan</td>
</tr>

<tr>
<td>4</td>
<td>Roy Montgome</td>
<td>36</td>
<td>Male</td>
<td>USA</td>
</tr>

<tr>
<td>5</td>
<td>M.Bony</td>
<td>18</td>
<td>Female</td>
<td>&nbsp;</td>
</tr>

<tr>
<td>1</td>
<td>Azeem</td>
<td>24</td>
<td>Male</td>
<td>Pakistan</td>
</tr>

<tr>
<td>2</td>
<td>Atiq</td>
<td>24</td>
<td>Male</td>
<td>Pakistan</td>
</tr>

<tr>
<td>3</td>
<td>Shahid</td>
<td>24</td>
<td>Male</td>
<td>Pakistan</td>
</tr>

<tr>
<td>4</td>
<td>Maji ya uhai</td>
<td>36</td>
<td>Male</td>
<td>USA</td>
</tr>

<tr>
<td>5</td>
<td>M.Bony</td>
<td>18</td>
<td>Female</td>
<td>&nbsp;</td>
</tr>
</table>';


$pdf=new PDF_HTML_Table('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->WriteHTML(
"
<b>MASHAURI SHOP</b>.<br> Sales Receipt<br> 0689938643<br> Dar es salaam, Tanzania
<br> mshaurishop@shop.com<br> RC0982789406 <br>$htmlTable<br>Sold by : Bwire Mashauri, 59035<br>Date : 30/09/2018<br>Customer Name : Tunsu Mashauri
");
$pdf->Output();
?>