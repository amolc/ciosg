<?php
error_reporting(E_ALL);
	include('sql_config/database/cio_db.php'); 
	session_start();
	$userID=$_SESSION['vID'];
	$vendor_name=$_SESSION['firstname']." ".$_SESSION['lastname'];
	//$result=mysql_num_rows(mysql_query("select contract_id from contract where vID='$userID'"));
	$cname=$_POST['cname'];
	$add1=$_POST['add1'];
	$add2=$_POST['add2'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$website=$_POST['website'];
	$email=$_POST['email'];
	$designation=$_POST['designation'];
	$contact_name=$_POST['contact_name'];
	$phone_number=$_POST['phone_number'];
	$date=date("Y-m-d H:i:s");

$ci=mysql_query("insert into contract (vID,date,company_name,city,country,emailID,website,designation,address1,address2,contact_name,phone_number) values('$userID','$date','$cname','$add1','$add2','$city','$country','$website','$email','$designation','$contact_name','$phone_number')")or die(mysql_error());
	$date=date("Y-m-d H:i:s");
	//mysql_query("insert into contract (vID,date) values('$userID','$date')");
	$cid=mysql_insert_id();
	$total='';
	/*$query=mysql_query("SELECT contract_id FROM contract WHERE vID='$userID'");
	SELECT LAST_INSERT_ID();
	$value=mysql_fetch_object($query);
	$cid=$value->contract_id;*/
	$res=mysql_query("SELECT item.item_name,item.item_ID,item.item_price,category.cat_name FROM item,shopping_cart,category WHERE item.item_ID=shopping_cart.itemID and category.catID=shopping_cart.catID and userID='$userID'")or die(mysql_error());
	$html='<style>

td {	padding-left: 2mm; 
			vertical-align: top; 
			padding-right: 3mm; 
			padding-top: 0.5mm; 
			padding-bottom: 0.5mm;
			
		 }
h1 { margin-bottom: 0; }z
</style><div align="right"><img src="images/logo2.png" width="100" align="right"/></div><br /><div align="right"><label>Contract ID : '.$cid.'</label></div><br /><label>Thank You,<b>'.$vendor_name.'</b></label><br /><label>The contract summary is as follows. </label><br /><br /><table width="100%">
		<tbody>
		
		<tr>
			<th>Date</th>
			<th>Category</th>
			<th>Sub-category</th>
			<th>Total</th>
		</tr>
		<tr><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td></tr>
	
';

	while($row=mysql_fetch_array($res))
	{
		$total=$total+$row['item_price'];
		$html.="<tr><td>10/20/2015</td><td>".$row['cat_name']."</td><td>".$row['item_name']."</td><td>S$".$row['item_price'].".00</td></tr>";
					
	}
	
	$html.="<tr><td><hr/></td><td><hr/></td><td><hr/></td><td><hr/></td></tr><tr><td></td><td></td><td>Tax : </td><td>$00.00</td></tr><tr><td></td><td></td><td>Estimated Total :  </td><td>$".$total.".00</td></tr></tbody></table>";
	
$data = bin2hex($html);
$qry = "UPDATE contract SET content=0x".$data."  WHERE contract_id='$cid'";
mysql_query($qry);
$r=mysql_query("delete from shopping_cart where userID='$userID'");
//require_once('mpdf/mpdf.php');

/*$mpdf=new mPDF('c','A4','','',12,12,10,10,16,13); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdf/mpdfstyletables.css');
//$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->debug = true;
$mpdf->WriteHTML($html);
$mpdf->Output('contract.pdf','I');
//$mpdf->WriteHTML($html);*/
echo "OK";

?>