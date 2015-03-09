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
<br/><br/><br /><br/>

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
<div align="center"><h1 align="center">CIO HONOUR AWARDS 2014</h1> <h2 align="center">Terms & Conditions </h2></div><hr><br /><br/><br/>
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

$html .='<div><label><strong>Article 4</strong></label></div>
<br/>
<label><strong>4.1 Organiser’s rights in the Trade Marks</strong></label><br/>
You acknowledge that the Trade Marks are the exclusive trademarks of the Organiser or its licensors. You agree not to apply
for or obtain registration of the Trade Marks for any goods or services in any jurisdiction, nor use the Trade Marks (or anything
confusingly similar to the Trade Marks) as a company, business, trade or Product name in any jurisdiction.<br/>
<label><strong>4.2 Honoured Product Trade Marks license</strong></label><br/>
Subject to You making the payments set out in Article 5, if Your Product is selected Under Article 3.4.1. to be “CIO HONOUR
AWARD of the Year” in a particular ICT category, You will be granted a limited, revocable, non transferable, non assignable
license (License) to use the Trade Marks only in the assigned Territory subject to the following additional terms:
<br />&nbsp;&nbsp;&nbsp;a. The duration of such License is limited to the period of one year commencing from Official Announcement Date; time
being of the essence.
<br />&nbsp;&nbsp;&nbsp;b. You (will obtain the Organiser’s approval for all uses of the Trade Marks and) will comply at all times with the reasonable
instructions and the directions from the Organiser in relation to your use of the Trade Marks under License. The Trade
Marks may only be used in the form, dimensions and graphic representation approved, in each instance, in writing by the
Organiser at its sole discretion.
<br />&nbsp;&nbsp;&nbsp;c. You may use the Trade Marks only on or in relation to the honoured Product and that Product alone. Unless otherwise
approved in each instance by the Organiser You may not use the Trade Marks on packaging or advertising, which
includes products other than the Honoured Product.
<br />&nbsp;&nbsp;&nbsp;d. The Trade Marks may only be used in advertising aimed primarily within the assigned Territory and on products which
are intended for sale within that territory.
<br />&nbsp;&nbsp;&nbsp;e. The Trade Marks may only be used in relation to the Honoured Product in the same form and composition as the Product
is presented in the Registration Form submitted in respect of it under Article 3.2.
<br />&nbsp;&nbsp;&nbsp;f. Every use of the Trade Marks will be accompanied by a reference to the Programme Year (e.g 2014), ICT category (e.g.
in the System Integrator category) for which the Product was honoured except on packaging where the space does not
provide for all the information, the Trade Mark and the ICT category will suffice. (E.g.”Honoured: XYZ Category”) All
creative material(s) for release must be approved by the Organiser for correctness of the honoured status reference.
<br />&nbsp;&nbsp;&nbsp;g. The Organiser will have the right, at its absolute discretion, to permit the use of the Trade Marks for groupings of some or
all of the honoured Products for the purpose of promotions directly or indirectly referring to “CIO HONOUR AWARD”,
subject to Article 4.2e and 4.2f above.
<br />&nbsp;&nbsp;&nbsp;h. The Trade Marks may be used by the honoured products to advertise their “CIO HONOUR AWARD” status but may not
be used to make any reference to the other participants in any ICT category. If there is any breach of Article 4, then the
Organiser would be entitled to deprive You of the “CIO HONOUR AWARD” status.<br/><br/>
<label><strong>4.3 Termination of Use</strong></label><br/>
You undertake to monitor the use of the Trade Marks under the License to ensure that it is no longer used on any product or
advertising / marketing material after the License End Date, time being of the essence in particular, but without limitation. You
will stop manufacturing or ordering Products and packaging incorporating the Trade mark sufficiently early so that all the
Products and packaging incorporating the Trade Marks are reasonably likely to be sold before the expiry of the License.
<br/><label><strong>4.4 Limitations on Use / Right to terminate</strong></label><br/><br/>
Breach of Article 4 will give the Organiser, at its sole discretion, the right to terminate immediately and without notice the
License granted to You under Article 4.2. Notwithstanding such termination, You shall remain liable to pay the Organiser the
amount due under Article 5.<br/><br/><br/>
<div><label><strong>Article 5</strong></label></div>
<br/>
<label><strong>Fees</strong></label><br/><br/>
<label><strong>5.1 Registration Fee</strong></label><br/>
You agree to pay the Registration Fee amount specified on the Registration Form or such other ordering document as
otherwise agreed between You and the Organiser for participation of your Product in the Programme.<br/><br/>
Unless otherwise provided in the Registration Form, all payments are due within ten (10) days from date of invoice. In the
event that you fail to make the payment within the stipulated time, your entry may be withdrawn solely at the discretion of the
organiser but the liability to pay once entered continues irrespective of the discretion exercised by the organiser. Should your
Registration Fee remain outstanding at the time of the official announcement of results, your product may not be declared the
Honoured product, even if so voted and the next high scoring product may be selected for Honour at the sole discretion of the
Organiser.<br/><br/>
<label><strong>5.2 License Fee</strong></label><br/><br/>
You agree to pay the License Fee amount specified on the Registration Form or such other ordering document as otherwise
agreed between You and the Organiser in respect of each Product submitted by You being selected for Honour by the
Programme in consideration to the grant of the License under Article 4.1.<br/>
Unless otherwise provided in the Registration Form, all payments are due within ten (10) days from date of invoice.You will not
be allowed to make use of the Trade Mark prior to receipt of such payments. Failure to make such payments may at the
discretion of the Organiser, result in all Your Products being disqualified from the Programme and, upon the Organiser giving
You written notice, this agreement will being terminated immediately. Your liability to make any outstanding payment due will
remain.<br/>
The License Fee becomes payable upon your Product being selected for Honour by the Programme and has no bearing
whatsoever to whether you choose to use the Trade Marks or not during the License Period and whether You continue to
market/sell the honoured Product during the year or part thereof.<br/>
<div><label><strong>Article 6</strong></label></div>
<br/>
<label><strong>6.1 Force majeure</strong></label><br/><br/>
The Organiser will not be liable for failure to perform any obligation under these Terms to the extent that it is caused due to
forces beyond its control.<br/>
<label><strong>6.2 Acceptance of Terms</strong></label><br/><br/>
Participation in the Programme involves full and entire acceptance of these Terms. You must accept these Terms by signing
them personally or by having an authorized signatory sign them.<br/>
<label><strong>6.3 Agreement to use of name</strong></label><br/><br/>
If your Product(s) is / are selected for Honour, You permit the Organiser to give out Your name, address and a description of
the honoured Product(s) together with a qualitative analysis of the results of the CIO voting survey conducted by or on behalf of
the Organiser under Article 3.4.1 as part of the publication and promotion of the Programme.You will also permit the Organiser
to share Your name and the honoured product name, with the Organiser’s media partners for the duration of the Programme
Year.<br/>
<label><strong>6.4 Interpretation by the Organiser</strong></label><br/><br/>
TAny question regarding the interpretation or application of these Terms or any other questions relating to the Programme will be
settled solely by the Organiser, in its discretion.<br/>
<label><strong>6.5 Headings</strong></label><br/><br/>
The headings in these Terms are for convenience only and are in no way intended to describe, interpret, define, or limit the
scope, extent, or intent of these Terms or any of their provisions.<br/>
<label><strong>6.6 Entire agreement</strong></label><br/><br/>
These Terms and the documents referred to in them constitute the entire agreement between You and the Organiser and
supersede all other agreements or arrangements, whether written or oral, express or implied, between You and the Organiser.<br/>
<label><strong>6.7 Taxes and Duties</strong></label><br/><br/>
All payments are to be made by You under these Terms are exclusive of all applicable taxes and duties, which will, where
applicable, be paid in addition by You.<br/>
<label><strong>6.8 Authority to execute</strong></label><br/><br/>
The signatory executing these Terms on behalf of another person represents and warrants that he/ she is empowered to
execute them and that all necessary action to authorise their execution has been taken.<br/>
<label><strong>6.9 Governing law and jurisdiction</strong></label><br/><br/>
This Agreement shall be governed, interpreted and enforced in accordance with the laws of Singapore without regard to conflict
of law principles. The courts of Singapore will have sole and exclusive jurisdiction with respect to any disputes arising out of
this Agreement.<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

Place, Date Company Name
<br/><br/><br/>
Signature
<br/><br/><br/>
Name (BLOCK CAPITALS), Title, Company Seal<br/>
This document must be signed only an Authorized representative of the company.
';
	
	
	
$data = bin2hex($html);
$qry = "UPDATE contract SET content=0x".$data."  WHERE contract_id='$cid'";
mysql_query($qry);
$r=mysql_query("delete from shopping_cart where userID='$userID'");
echo "OK";

?>