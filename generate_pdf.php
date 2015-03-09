<?php
error_reporting(E_ALL);
	include('sql_config/database/cio_db.php'); 
	session_start();
	$userID=$_SESSION['vID'];
	$vendor_name=$_SESSION['firstname']." ".$_SESSION['lastname'];
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

$ci=mysql_query("insert into contract (vID,date,company_name,city,country,emailID,website,designation,address1,address2,contact_name,phone_number) values('$userID','$date','$cname','$city','$country','$email','$website','$designation','$add1','$add2','$contact_name','$phone_number')")or die(mysql_error());
	$date=date("Y-m-d H:i:s");
	$cid=mysql_insert_id();
	$total='';
	
	$res=mysql_query("SELECT item.item_name,item.item_ID,item.item_price,category.cat_name FROM item,shopping_cart,category WHERE item.item_ID=shopping_cart.itemID and category.catID=shopping_cart.catID and userID='$userID'")or die(mysql_error());
	
	while($row=mysql_fetch_array($res))
	{
		$total=$total+$row['item_price'];
		$cat_name = $row['cat_name'];
		$item_name = $row['item_name'];
		$item_price = $row['item_price'];
					
	}
	
	$query = mysql_query("SELECT * FROM all_users where registration_id='$userID'")or die(mysql_error());
	while($rs=mysql_fetch_array($query))
	{
		$firstname = $rs['firstname'];
		$lastname = $rs['lastname'];
		$designations = $rs['business_title'];
		$emailid = $rs['emailID'];
		$mobile = $rs['mobile_number'];
		
	
	}
	
	
	
	$html='<style>

td {	padding-left: 2mm; 
			vertical-align: top; 
			padding-right: 3mm; 
			padding-top: 0.5mm; 
			padding-bottom: 0.5mm;
			
		 }
h1 { margin-bottom: 0; }z
@media print 
{
    footer {page-break-after: auto;}
}
</style>

<div align="center"><h1 align="center">CIO HONOUR AWARDS 2014 </h1> <h2 align="center">Registration Form </h2></div><hr><br />

<div><label><strong>1) CONTACT INFORMATION</strong></label></div>
<br />
<table border="1" width="100%"><tr><td>First Name</td><td>'.$firstname.'</td></tr><tr><td>Last Name</td><td>'.$lastname.'</td></tr><tr><td>Designation</td><td>'.$designations.'</td></tr><tr><td>Email</td><td>'.$emailid.'</td></tr><tr><td>Telephone No</td><td>'.$mobile.'</td></tr><tr><td>Mobile Phone</td><td>'.$mobile.'</td></tr></table>
<br /><br />
<div><label><strong>2) COMPANY INFORMATION</strong></label></div>
<br />
<table border="1" width="100%"><tr><td>Company Name</td><td>'.$cname.'</td></tr><tr><td height="50">Company Address</td><td>'.$add1.'</td></tr><tr><td>City</td><td>'.$city.'</td></tr><tr><td>State</td><td>'.$city.'</td></tr><tr><td>Postal Code/ ZIP</td><td>'.$city.'</td></tr><tr><td>Country</td><td>'.$country.'</td></tr><tr><td>Telephone No</td><td>'.$phone_number.'</td></tr><tr><td>Company Category *
(Please Tick relevant)</td><td>'.$phone_number.'</td></tr></table>
<br /><br />

<label>This is to confirm our participation in CIO HONOUR AWARDS 2014, and our registration into <strong>'.$cat_name.'</strong> category/ categories. Details of product/ service/ solution are provided in the ensuing sections. </label>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />


<div style="margin-left:50px;"><strong>Authorised Signatory Name & Signature</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Company Stamp/ Round Seal</strong></div>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<div align="right">Page 1 of 7</div>

<br /><br /><br /><br />

<div align="center"><h1 align="center">CIO HONOUR AWARDS 2014</h1> <h2 align="center">Registration Form </h2></div><hr><br />

<div><label><strong>3) PRODUCT/ SERVICE/ SOLUTION DETAILS</strong><br/>(To be completed for each category registered)</label></div>
<br />
<table border="1" width="100%" height="100%"><tr><td>ICT Category & Code<br/>(Please select from the
ICT Category Table)</td><td>'.$cat_name.'</td></tr><tr><td>Product/ Service/Solution Name</td><td>'.$item_name.'</td></tr><tr><td>Brand Name
(if different from above)</td><td></td></tr><tr><td>Product Description</td><td></td></tr></table>
<br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<div align="right">Page 2 of 7</div>

<br /><br /><br /><br />

<div align="center"><h1 align="center">CIO HONOUR AWARDS 2014</h1> <h2 align="center">Registration Form </h2></div><hr><br />

<div><label><strong>4) IMPORTANT NOTES:</strong></label></div>
<br />

<div>
 a.Participation Fees
	<br />
	&nbsp;&nbsp;
	• Registration Fee:US$1,000 for each ICT category of product, service and/or solution submitted.
	<br />
	&nbsp;&nbsp;
	• License Fee:US$6,000(per category), applicable	ONLY when the specific ICT category of product, service and/or &nbsp;&nbsp;&nbsp;&nbsp;solution registered is conferred the “CIO HONOUR	AWARD 2014” title.
	<br />
	&nbsp;&nbsp;
	• All fees are exclusive of local taxes.
	<br />
	&nbsp;&nbsp;
	• Payment Terms: Net 10 days from Invoice date. 

</div>
<br /><br />
<div>
b.Order Summary 
<br /><br />

<table border="1" width="100%" height="100%"><tr><td>Item</td><td>Description</td><td>Quantity</td><td>Unit Price(USD)</td><td>Final Price(USD)</td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr></table>
<br /><br />

</div>


<div>
c.
Please submit a scanned copy of the completed & duly signed Registration Form via email to registration@cio-choice.sg
<br /><br />
</div>

<div>
d.Please send the cheque/ pay order/ demand draft to:
<br />&nbsp;&nbsp; • CORE SERVICES (ASIA) PTE LTD
<br />&nbsp;&nbsp;&nbsp;&nbsp;100 Cecil Street, #10-01 The Globe
<br />&nbsp;&nbsp;&nbsp;&nbsp;Singapore 069532
</div>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<div align="right">Page 3 of 7</div>

<br /><br /><br /><br />

';

$html.='

<div align="center"><h1 align="center">CIO HONOUR AWARDS 2014</h1> <h2 align="center">Terms & Conditions </h2></div><hr><br />

<div><label><strong>Article 1</strong></label></div>
<br />

<div>
1.1 Interpretation & Definitions
	<br />
	<br />&nbsp;&nbsp;&nbsp;4)a. &nbsp;“Registration Form” as set out in Article 3.
	<br />&nbsp;&nbsp;&nbsp;4)b. &nbsp;“Article” refers to any article in these Terms document.
	<br />&nbsp;&nbsp;&nbsp;4)c. &nbsp;“CIO” refers to Chief Information Officer and/ or equivalent Decision Maker/ Influencer in the Information and <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Communications Technology (ICT) domain.
	<br />&nbsp;&nbsp;&nbsp;4)d. &nbsp;“Documents” referred to signed copies of both the Terms and the Registration Form.
	<br />&nbsp;&nbsp;&nbsp;4)e. &nbsp;“License” as defined in Article 4.1.
	<br />&nbsp;&nbsp;&nbsp;4)f. &nbsp;“License Period” as defined in Article 4.1
	<br />&nbsp;&nbsp;&nbsp;4)g. &nbsp;“Organiser” is CORE Services (Asia) Pte Ltd, a company incorporated in Singapore with Registration &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.201404305C with registered office at 100 Cecil St., #10-01 The Globe, Singapore 069532
	<br />&nbsp;&nbsp;&nbsp;4)h. &nbsp;“Product” refers to Enterprise ICT Product(s), Service(s) and /or Solution(s) generally available and sold in the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;specific geography 
	<br />&nbsp;&nbsp;&nbsp;4)i. &nbsp;“Programme” is the marketing programme operated by the Organiser known as the “CIO HONOUR AWARDS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2014” programme as more fully described in these Terms. 
	<br />&nbsp;&nbsp;&nbsp;4)j. &nbsp;“Programme Year” is the year referred to in the title of a Programme (for example, the Programme Year for &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“CIO HONOUR AWARD of the Year 2014” will be 2014.)
	<br />&nbsp;&nbsp;&nbsp;4)k. &nbsp;“Territory” is Singapore, unless otherwise specifically stated.
	<br />&nbsp;&nbsp;&nbsp;4)l. &nbsp;“Signatory” is the individual who signs these Terms either in his own capacity or on behalf of another upon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;whose behalf he is authorized to act.
	<br />&nbsp;&nbsp;&nbsp;4)m.“Trade Marks” refers to the name logo, devices and get up relating to "CIO HONOUR AWARD of the Year” or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;any of them.
	<br />&nbsp;&nbsp;&nbsp;4)n. &nbsp;“You” refers to either the Signatory or, where the Signatory signs these Terms on behalf of a person on &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;whose behalf he/ she is authorized to sign, such person. Yours will be interpreted accordingly.
	<br />&nbsp;&nbsp;&nbsp;4)o. &nbsp;“Official Announcement Date” will be the date on which the Honoured status is announced at the recognition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; event ceremony. This date (subject to any changes that the Organiser may in its absolute discretion make and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;notify to You) will be published by the Organiser on its official website address at www.cxohonour.com 

</div>
<div> 
1.2 Agreement<br />	<br />&nbsp;&nbsp;&nbsp;
The Signatory, by signing a copy of these Terms (either in his own capacity or on behalf of a person upon whose
behalf he is authorized to act), will create an Agreement between You and the Organiser which will come into force
on the date the Terms are signed and which will continue until it is terminated in accordance with Articles 5.2 or 5.3.
</div>
<div align="center"><h1 align="center">CIO HONOUR AWARDS 2014</h1> <h2 align="center">Terms & Conditions </h2></div><hr><br />
<div><label><strong>Article 2</strong></label></div>
<br />
<div><label><strong>The Programme</strong></label></div>
<br />
<label><strong>2.1</strong></label><br>
You acknowledge that the Programme is an innovative proprietary, annual marketing programme operated by the Organiser
which is open, subject to these Terms to new/ existing Product(s) launched in the Territory<br>
<label><strong>2.2</strong></label><br>
The Organiser intends that Product(s) of the type typically sold and available in the Territory be entered by You into the
Programme without limitation as per its relevant ICT category.<br>
<label><strong>2.3</strong></label><br>
You may submit any new Product of Yours that has been made generally available in the Territory for a minimum period of six
months in the market to participate in the Programme.<br>
<label><strong>2.4 ICT Categories</strong></label><br>
There is a listing of ICT categories published on the Organiser’s official website (www.cxohonour.com) and You may select and
propose the appropriate ICT category, however, Product(s) will be classified by the Organiser at its absolute discretion into ICT
categories, if your proposed classification is found to be inappropriate. The decision of the Organiser in this regard will be final
and binding. The Organiser reserves the absolute right to amend, add or withdraw one or more ICT categories, depending,
amongst other things, on the nature and number of applications received, and to assign the Product(s) to the ICT category it
deems appropriate.<br>
<label><strong>2.5 Multiple Entries</strong></label><br>
You may enter Product(s) in the Programme in different ICT categories. In the case of substantially similar Product(s),or the
same Product sold in different sizes and/ or combinations, you may enter only one Product in any ICT category in any
Programme Year. However, so long as the Product is different in some significant manner, you may enter more than one
Product in the same ICT category. The Organiser will have absolute discretion to accept/ reject the Product(s) into the
Programme or into any particular ICT category, to assign Product(s) to ICT categories and to determine if Product(s) that You
submit are sufficiently different to warrant multiple entries in a particular ICT category.<br/><br/><br/>

<div><label><strong>Article 3</strong></label></div>
<br />
<div><label><strong>Application to the Programme</strong></label></div>
<br />
<label><strong>3.1 Application Entry</strong></label><br>
The completed Registration Form and full support materials must be sent by you to the Organiser as per instructions published
on its official website address at www.cxohonour.com. The Organiser will have the right to reject (without giving reasons) any
Registration Form submitted.<br>
<label><strong>3.2</strong></label><br>
You acknowledge that by submitting a completed Registration Form You commit yourself to the whole Programme and in
particular to the payment of any fees that become due under Article 5.2. For the avoidance of doubt, you agree to pay these
fees to the Organiser and you cannot withdraw from the Programme at any point in time post submitting the entry.<br>
<label><strong>3.3</strong></label><br>
The Organiser agrees that, except as otherwise provided in Article 6.3, all information and documents submitted by You will be
treated by the Organiser as confidential and will not be disclosed or published without Your consent, except as may be required
by law or any regulatory authority. This does not include information that is already available on public domain or already
known to the Organisers or and lawfully acquired from the third party.<br>
<label><strong>3.4 Procedure to Honour a Product</strong></label><br>
The procedure to be adopted by the Organiser to Honour a Product is as follows: (subject to any changes that the Organiser
may in its absolute discretion make and notify to You. ): <br>
<label><strong>3.4.1 CIO voting</strong></label><br>
The Product(s) to be conferred the “CIO HONOUR AWARD of the Year” for each ICT category will be determined based on the
endorsements expressed by those CIOs within the respondent group, who have/ may have purchased/ used one or more of
the Product(s) in the particular ICT category. The group will be reasonably representative of the population of CIOs (as
determined by the Organiser) and will consist of statistically an appropriate sample size. The online survey is conducted on the
organiser’s official website www.cxohonour.com<br/><br/><br/>
';
	
	
	
$data = bin2hex($html);
$qry = "UPDATE contract SET content=0x".$data."  WHERE contract_id='$cid'";
mysql_query($qry);
$r=mysql_query("delete from shopping_cart where userID='$userID'");
echo "OK";

?>