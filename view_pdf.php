<?php 
include('sql_config/database/cio_db.php'); 

$cid=$_REQUEST['id'];
$query=mysql_query("select content from contract where contract_id='$cid'") or die(mysql_error());
$value=mysql_fetch_object($query);
$pdf=$value->content;
require_once('mpdf/mpdf.php');

$mpdf=new mPDF('c','A4','','',12,12,10,10,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdf/mpdfstyletables.css');
//$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->debug = true;
$mpdf->WriteHTML($pdf);
$mpdf->Output('contract.pdf','I');
//var myWindow = window.open("");
//myWindow.document.write($mpdf->Output('contract.pdf','I'));
//echo $mpdf->Output('contract.pdf','I');
//echo $_GET['callback'] . '(' .json_encode($mpdf->Output('contract.pdf','I')) . ')';


?>