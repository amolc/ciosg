<?php
//connect to db
 //$con = mysql_connect('localhost','cio-choice', 'welcome2day7');
// $db  = mysql_select_db('cio-choice_27march');
 // $db  = mysql_select_db('cio-choice');
// $web_url ="http://staging.cio-choice.sg";
   include('../../sql_config/database/cio_db.php');

 
 if(isset($_REQUEST['vendor_id'])){
 $pid = $_REQUEST['vendor_id'];
 $sql =  "select * from ictpartners where partner_id = '$pid'";
 $res = mysql_query($sql) or die(mysql_error());
 $row = mysql_fetch_array($res);
 
 $first_name = $row['first_name'];
 $last_name = $row['last_name'];
 $designation = $row['title'];
 $email = $row['email'];
 $user_telephone = $row['telephone'];
 $user_mobile = $row['mobile'];
 $company_name = $row['company_name'];
 $company_address = $row['company_address'];
 $post_code = $row['post_code'];
 $company_telephone = $row['company_telephone'];
 $country = $row['country'];
 $company_size = $row['company_size'];
 $city = $row['city'];
 $state = $row['state'];
 $total_products = $row['total_products'];
 $tag = '<=';
 
 $vendor_id = $row['partner_id'];
 
 $sql2 =  "select * from ictpartners_products where partner_id = '$vendor_id'";
 $res2 = mysql_query($sql2) or die(mysql_error());
 
 
 }

//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<div style="width:650px;">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="116" align="left" valign="top" style=" border-bottom:#000000 solid 1px;">
        <table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td width="533" height="116" align="left" valign="middle"><h1 style=" font-family: Arial, Helvetica, sans-serif; display:block; float:left; margin:0px 0px 0px 120px; font-size:24px; text-align:center; width:400px;">CIO CHOICE Singapore 2014 <br />
      Registration Form</h1></td>
    <td width="117" height="116" align="right" valign="top"><span style="float:right; width:117px; display:block; margin:0px; height:116px;"><img width="117" height="116" src="'.$web_url.'/images/Landing_logo.jpg"></span></td>
  </tr>
</table></td>
      </tr>
      <tr>
        <td align="left" valign="middle" height="20">&nbsp;</td>
      </tr>
	  <tr>
        <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">1) CONTACT INFORMATION</h2></td>
      </tr>
      <tr>
        <td align="left" valign="top">
	<table width="650" border="1" bordercolor="#000000" cellspacing="0" cellpadding="7" style="padding-bottom:20px;">
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">First Name</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$first_name.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Last Name</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$last_name.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Title</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$designation.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Email</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$email.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Telephone No</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$user_telephone.'</td>
      </tr>
    </table>
		  </td>
      </tr>
	  <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
         <td align="left" valign="middle" height="40" style="padding-top:15px;"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">2) COMPANY INFORMATION</h2></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<table width="650" border="1" bordercolor="#000000" cellspacing="0" cellpadding="7">
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Company Name</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$company_name.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Company Address</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$company_address.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">City</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$city.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">State</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$state.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Postal Code/ ZIP</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$post_code.'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Country</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$country .'</td>
      </tr>
      <tr>
        <td align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Telephone No</td>
        <td align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$company_telephone.'</td>
      </tr>
	  	  
      <tr>
        <td align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Local Sales Revenue</td>
        <td align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">
        <label for="checkbox" style="margin-right:10px;">Less than USD $15 million</label>
        </td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">This is to confirm our participation in CIO CHOICE 2014, and our registration into <strong>'.$total_products.'</strong>
category/ categories. Details of product/ service/ solution are provided in the ensuing sections.</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$html1 ="";
while ($row2 = mysql_fetch_array($res2)){
// output some RTL HTML content

$html1 .= '<div style="width:650">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="116" align="left" valign="top" style=" border-bottom:#000000 solid 1px;">
        <table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="533" height="116" align="left" valign="middle"><h1 style=" font-family: Arial, Helvetica, sans-serif; display:block; float:left; margin:0px 0px 0px 120px; font-size:24px; text-align:center; width:400px;">CIO CHOICE Singapore 2014 <br />
      Registration Form</h1></td>
    <td width="117" height="116" align="right" valign="top"><span style="float:right; width:117px; display:block; margin:0px; height:116px;"><img width="117" height="116" src="'.$web_url.'/images/Landing_logo.jpg"></span></td>
  </tr>
</table></td>
      </tr>
      <tr>
        <td align="left" valign="middle" height="60"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;"> <br />3) PRODUCT/ SERVICE/ SOLUTION DETAILS (To be completed for each category registered) <br /></h2></td>
      </tr>
      <tr>
        <td align="left" valign="top">
	<table width="650" border="1" bordercolor="#000000" cellspacing="0" cellpadding="7" style="padding-bottom:20px;">
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">ICT Category & Code<br />
(Please select from the ICT Category Table)</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$row2['category_code'].'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Product/ Service/
Solution Name</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$row2['solution'].'</td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Brand Name
(if different from above)</td>
        <td width="450" align="left" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$row2['brand_name'].'</td>
      </tr>
      <tr>
        <td width="200" align="left" height="400" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">Product Description</td>
        <td width="450" align="left" height="400" valign="top" style="margin:15px; font-family: Arial, Helvetica, sans-serif;">'.$row2['product_description'].'</td>
      </tr>
    </table>
		  </td>
      </tr>
	  <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
	  
    </table>
	</td>
  </tr>
</table>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

';
//$pdf->writeHTML($html, true, false, true, false, '');
}


$pdf->writeHTML($html1, true, false, true, false, '');

// test some inline CSS
$html = ' <div style="width:650">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="116" align="left" valign="top" style=" border-bottom:#000000 solid 1px;">
        <table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="533" height="116" align="left" valign="middle"><h1 style=" font-family: Arial, Helvetica, sans-serif; display:block; float:left; margin:0px 0px 0px 120px; font-size:24px; text-align:center; width:400px;">CIO CHOICE Singapore 2014 <br />
      Registration Form</h1></td>
    <td width="117" height="116" align="right" valign="top"><span style="float:right; width:117px; display:block; margin:0px; height:116px;"><img width="117" height="116" src="'.$web_url.'/images/Landing_logo.jpg"></span></td>
  </tr>
</table></td>
      </tr>
      <tr>
        <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;"> <br />4) IMPORTANT NOTES: <br /></h2></td>
      </tr>
	  
	   <tr>
        <td height="30" align="left" valign="middle">a. Participation Fee.</td>
      </tr>
	   <tr>
        <td align="left" valign="top">
		<ul>
      <li>Registration Fee: US$1,000 for each category of product, service and/or solution
submitted.</li>
      <li>License Fee (per category), applicable ONLY when the specific category of product,
service and/or solution registered is conferred CIO CHOICE 2014.</li>
	<li>US $12,000 for company with local sales revenue > USD 15M</li>
	<li>US $8,000 for company with local sales revenue >= USD 15M</li>
	<li>All fees are exclusive of local taxes.</li>
	<li>Payment Terms: Net 30 days from Invoice date.<br /></li>
    </ul>
	</td>
      </tr>
	  <tr>
        <td height="30" align="left" valign="middle">b. Please submit a scanned copy of the completed & duly signed Registration Form via email
to registration@cio-choice.sg<br /></td>
      </tr>
	  <tr>
        <td height="30" align="left" valign="middle">c. Please send the cheque/ pay order/ demand draft to:</td>
      </tr>
	   <tr>
        <td align="left" valign="top">
		<ul>
      <li>CORE SERVICES (ASIA) PTE LTD<br />
100 Cecil Street, #10-01 The Globe<br />
Singapore 069532</li>
    </ul>
	</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
';

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// test some inline CSS
$html = ' 
<div style="width:650px; margin:0 auto;">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="116" align="left" valign="top" style=" border-bottom:#000000 solid 1px;">
        <table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="533" height="116" align="left" valign="middle"><h1 style=" font-family: Arial, Helvetica, sans-serif; display:block; float:left; margin:0px 0px 0px 120px; font-size:24px; text-align:center; width:400px;">CIO CHOICE 2014 Terms & Conditions (“Terms”)</h1></td>
    <td width="117" height="116" align="right" valign="top"><span style="float:right; width:117px; display:block; margin:0px; height:116px;"><img width="117" height="116" src="'.$web_url.'/images/Landing_logo.jpg"></span></td>
  </tr>
</table></td>
      </tr>
      <tr>
        <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;"> <br /> Article 1 <br /></h2></td>
      </tr>
	  <tr>
        <td height="30" align="left" valign="middle" style="font-weight:bold;">1.1 Articles &amp; Definitions</td>
      </tr>
	   <tr>
        <td align="left" valign="top">
		<ul>
          <li>“Registration Form” as set out in Article 3.</li>
          <li>“Article” refers to any article in this Terms document.<br /></li>
        </ul>
	</td>
      </tr>
	   <tr>
        <td height="30" align="left" valign="middle" style="font-weight:bold;">b. Participation Fee.</td>
      </tr>
	   <tr>
        <td align="left" valign="top">
		<ul>
          <li>“CIO” refers to Chief Information Officer and/ or equivalent Decision Maker/ Influencer in the Information and
Communications Technology (ICT) domain.</li>
		  <li>“Documents” referred to signed copies of both the Terms and the Registration Form.</li>
          <li>“License” as defined in Article 4.1.</li>
          <li>“License Period” as defined in Article 4.1</li>
          <li>“Organiser” is CORE Services (Asia) Pte Ltd, a company incorporated in Singapore with Registration No. 201404305C
with registered office at 100 Cecil St., #10-01 The Globe, Singapore 069532</li>
          <li>“Product” refers to Enterprise ICT Product(s), Service(s) and /or Solution(s) generally available and sold in the specific
geography</li>
          <li>“Programme” is the marketing programme operated by the Organiser known as the “CIO CHOICE” programme as more
fully described in these Terms.</li>
          <li>“Programme Year” is the year referred to in the title of a Programme (for example, the Programme Year for “Recognised –
CIO CHOICE of the Year 2014” will be 2014.)</li>
          <li>“Territory” is Singapore, unless otherwise specifically stated.</li>
          <li>“Signatory” is the individual who signs these Terms either in his own capacity or on behalf of another upon whose behalf
he is authorized to act.</li>
          <li>“Trade Marks” refers to the name logo, devices and get up relating to “Recognised – CIO CHOICE of the Year” or any of
them.</li>
          <li>“You” refers to either the Signatory or, where the Signatory signs these Terms on behalf of a person on whose behalf he/
she is authorized to sign, such person. Yours will be interpreted accordingly.</li>
          <li>“Registration Cut-off Date” refers to the date after which Registration Form(s) will not be accepted anymore for
participation to the Programme. This date (subject to any changes that the Organiser may in its absolute discretion make
and notify to You) will be published by the Organiser on its official website address at www.cio-choice.sg</li>
          <li>“Official Announcement Date” will be the date on which the Recognised status is announced in the recognition event
ceremony. This date (subject to any changes that the Organiser may in its absolute discretion make and notify to You) will
be published by the Organiser on its official website address at www.cio-choice.sg 
</li>
        </ul>
	</td>
      </tr>
	  
	  <tr>
	    <td height="30" align="left" valign="middle" style="font-weight:bold;"> <br />1.2 Agreement <br /></td>
	    </tr>
	  <tr>
	    <td align="left" valign="top">
		<ul>
	      <li style="list-style-type:none;">The Signatory, by signing a copy of these Terms (either in his own capacity or on behalf of a person upon whose behalf he is
	        authorized to act), will create an Agreement between You and the Organiser which will come into force on the date the Terms
	        are signed and which will continue until it is terminated in accordance with Articles 5.2 or 5.3. 
	        </li>
	      </ul></td>
	    </tr>
	  
	  
    </table>
	</td>
  </tr>
</table>
</div>
';

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// test some inline CSS
$html = ' 
<div style="width:650px; margin:0 auto;">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
    
	  
	  
	  <tr>
	    <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">Article 2</h2></td>
	    </tr>
	  <tr>
	    <td height="30" align="left" valign="middle" style="font-weight:bold;">The Programme</td>
	    </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">2.1</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You acknowledge that the Programme is an innovative proprietary, annual marketing programme operated by the Organiser which is open, subject to these Terms to new/ existing Product(s) launched in the Territory<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">2.2</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The Organiser intends that Product(s) of the type typically sold and available in the Territory entered by You into the Programme without limitation as per its relevant category.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">2.3</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You may submit any new Product of Yours that has been made generally available in the Territory for a minimum period of six months in the market to participate in the Programme.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">2.4 Categories</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">There is a listing of categories in the Registration Form and You may select and propose the appropriate category, however, Product(s)
will be classified by the Organiser at its absolute discretion into categories, if your proposed classification is found to be inappropriate. The
decision of the Organiser in this regard will be final and binding. The Organiser reserves the absolute right to amend, add or withdraw one
or more categories, depending, amongst other things, on the nature and number of applications received, and to assign the Product(s) to
the category it deems appropriate.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">2.5 Multiple Entries</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You may enter Product(s) in the Programme in different categories. In the case of substantially similar Product(s),or the same Product
sold in different sizes and/ or combinations, you may enter only one Product in any category in any Programme Year. However, so long as
the Product is different in some significant manner, you may enter more than one Product in the same category. The Organiser will have
absolute discretion to accept/ reject the Product(s) into the Programme or into any particular category, to assign Product(s) to categories
and to determine if Product(s) that You submit are sufficiently different to warrant multiple entries in a category.</p></td>
	     </tr>
    </table>
	</td>
  </tr>
</table>
</div>
';

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Print a table

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<div style="width:650px; margin:0 auto;">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  
	  <tr>
	    <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">Article 3</h2></td>
	    </tr>
	  <tr>
	    <td height="30" align="left" valign="middle" style="font-weight:bold; font-size:16px;">Application to the Programme</td>
	    </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">3.1 Application Entry</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The completed Registration Form and full support materials must be sent by you to the Organiser at the latest by the Registration Cut-off Date. The Organiser will have the right to reject (without giving reasons) any Registration Form submitted.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">3.2</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You acknowledge that by submitting a completed Registration Form You commit yourself to the whole Programme and in particular to the payment of any fees that become due under Article 5.2. For the avoidance of doubt, you agree to pay these fees to the Organiser and you cannot withdraw from the Programme at any point in time post submitting the entry.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">3.3</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The Organiser agrees that, except as otherwise provided in Article 6.3, all information and documents submitted by You will be treated by the Organiser as confidential and will not be disclosed or published without Your consent, except as may be required by law or any regulatory authority. This does not include information that is already available on public domain or already known to the Organisers or and lawfully acquired from the third party.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">3.4 Procedure to recognise a Product</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The procedure to be adopted by the Organiser to recognise a Product is as follows: (subject to any changes that the Organiser may in its
absolute discretion make and notify to You.):<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">3.4.1 CIO Votes</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The Product(s) to be “Recognised – CIO CHOICE of the Year” for each category will be determined based on the votes expressed by
those CIOs within the respondent group, who have/ may have purchased/ used one or more of the Product(s) in the particular category.
The group will be reasonably representative of the population of CIOs (as determined by the Organiser) and will consist of statistically an
appropriate sample size. The voting survey is conducted online on our website www.cio-choice.sg.</p></td>
	     </tr>
    </table>
	</td>
  </tr>
</table>
</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// Print a table

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<div style="width:650px; margin:0 auto;">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  
	  <tr>
	    <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">Article 4</h2></td>
	    </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">4.1 Organiser&acute;s rights in the Trade Marks</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You acknowledge that the Trade Marks are the exclusive trademarks of the Organiser or its licensors. You agree not to apply for or obtain registration of the Trade Marks for any goods or services in any jurisdiction, nor use the Trade Marks (or anything confusingly similar to the Trade Marks) as a company, business, trade or Product name in any jurisdiction.<br />
</p></td>
	     </tr>
	   <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">4.2 Recognised Product Trade Marks license</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">Subject to You making the payments set out in Article 5, if Your Product is selected Under Article 3.4.1. to be “Recognised – CIO CHOICE of the Year” in a particular category, You will be granted a limited, revocable, non transferable, non assignable license (License) to use the Trade Marks only in the assigned Territory subject to the following additional terms:<br />
</p></td>
	     </tr>
		 
		 <tr>
        <td align="left" valign="top">
		<ul>
      <li>The duration of such License is limited to the period of one year commencing from Official Announcement Date; time being of the
essence.</li>
      <li>You (will obtain the Organiser’s approval for all uses of the Trade Marks and) will comply at all times with the reasonable instructions
and the directions from the Organiser in relation to your use of the Trade Marks under License. The Trade Marks may only be used
in the form, dimensions and graphic representation approved, in each instance, in writing by the Organiser in its sole discretion.</li>
		<li>You may use the Trade Marks only on or in relation to the recognised Product and that Product alone. Unless otherwise approved in
each instance by the Organiser You may not use the Trade Marks on packaging or advertising, which includes products other than
the Recognised Product.</li>
		<li>The Trade Marks may only be used in advertising aimed primarily within the assigned Territory and on products which are intended
for sale within that territory.</li>
		<li>The Trade Marks may only be used in relation to the recognised Product in the same form and composition as the Product is
presented in the Registration Form submitted in respect of it under Article 3.2.</li>
		<li>Every use of the Trade Marks will be accompanied by a reference to the Programme Year (e.g 2014), category (e.g. in the System
Integrator category) for which the Product was recognised except on packaging where the space does provide for all the
information, the Trade Mark and the category will suffice. (E.g.”Recognised: XYZ Category”) All creative material(s) for release must
be approved by the Organiser for correctness of the recognised status reference.</li>
		<li>The Organiser will have the right, in its absolute discretion, to permit the use of the Trade Marks for groupings of some or all of the
recognised Products for the purpose of promotions directly or indirectly referring to “CIO CHOICE 2014”, subject to Article 4.2e and
4.2f above.</li>
		<li>The Trade Marks may be used by the recognised products to advertise their “CIO CHOICE 2014” status but may not be used to
make any reference to the other participants in any category. If there is any breach of Article 4, then the Organiser would be entitled
to deprive You of the “CIO CHOICE 2014” status.<br />
</li>
		
    </ul>
	</td>
	</tr>
	
	<tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">4.3 Termination of Use CIO Votes</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You undertake to monitor the use of the Trade Marks under the License to ensure that it is no longer used on any product or advertising /
marketing material after the License End Date, time being of the essence in particular, but without limitation. You will stop manufacturing
or ordering Products and packaging incorporating the Trade mark sufficiently early so that all the Products and packaging incorporating
the Trade Marks are reasonably likely to be sold before the expiry of the License.<br />
</p></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">4.4Limitations on Use / Right to terminate</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">Breach of Article 4 will give the Organiser, in its sole discretion, the right to terminate immediately and without notice the License granted to You under Article 4.2. Notwithstanding such termination, You shall remain liable to pay the Organiser the amount due under Article 5.<br />
</p></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">Article 5</h2>
</td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">Fees</h2></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">5.1 Registration Fee</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You agree to pay the Registration Fee amount specified on the Registration Form or such other ordering document as otherwise agreed between You and the Organiser for participation of your Product in the Programme. The total fees payable is sum of the Registration Fee multiplied by the number of Products submitted for participation in the Programme.<br />
<br />
Unless otherwise provided in the Registration Form, all payments are due within thirty (30) days from date of invoice. In the event that you
fail to make the payment within the stipulated time, your entry may be withdrawn solely at the discretion of the organiser but the liability to
pay once entered continues irrespective of the discretion exercised by the organiser. Should your Registration Fee remain outstanding at
the time of the official announcement of results, your product may not be declared the Recognised product, even if so voted and the next
high scoring product may be selected for Recognition at the sole discretion of the Organiser.<br />
</p></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">5.2 License Fee</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">You agree to pay the License Fee amount specified on the Registration Form or such other ordering document as otherwise agreed between You and the Organiser in respect of each Product submitted by You being selected for Recognition by the Programme in consideration to the grant of the License under Article 4.1. The total fees payable is sum of the License Fee multiplied by the number of your Products recognised by the Programme.<br />
<br />
Unless otherwise provided in the Registration Form, all payments are due within thirty (30) days from date of invoice.You will not be allowed to make use of the Trade Mark prior to receipt of such payments. Failure to make such payments may at the discretion of the Organiser, result in all Your Products being disqualified from the Programme and, upon the Organiser giving You written notice, this agreement will being terminated immediately. Your liability to make any payment due will remain.<br />
<br />
The License Fee becomes payable upon your Product being selected for Recognition by the Programme and has no bearing whatsoever to whether you choose to use the Trade Marks or not during the License Period and whether You continue to market/sell the recognised Product during the year or part thereof.<br />
<br />
<br />
</p></td>
	     </tr>


		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;"> <br /><br />Article 6 <br /></h2>
</td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.1 Force majeure</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The Organiser will not be liable for failure to perform any obligation under these Terms to the extent that it is caused due to forces beyond its control.<br />
</p></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.2 Acceptance of Terms</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">Participation in the Programme involves full and entire acceptance of these Terms. You must accept these Terms by signing them personally or by having an authorized signatory sign them.<br />
</p></td>
	     </tr>

		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.3 Agreement to use of name</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">If your Product(s) is / are selected for Recognition, You permit the Organiser to give out Your name, address and a description of the recognised Product(s) together with a qualitative analysis of the results of the CIO voting survey conducted by or on behalf of the Organiser under Article 3.4.1 as part of the publication and promotion of the Programme.You will also permit the Organiser to share Your name and the recognised product name, with the Organiser’s media partners for the duration of the Programme Year.<br />
</p></td>
	     </tr>


		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.4 Interpretation by the Organiser</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">Any question regarding the interpretation or application of these Terms or any other questions relating to the Programme will be settled solely by the Organiser, in its discretion.<br />
</p></td>
	     </tr>


		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.5 Headings</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The headings in these Terms are for convenience only and are in no way intended to describe, interpret, define, or limit the scope, extent, or intent of these Terms or any of their provisions.<br />
</p></td>
	     </tr>


		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.6 Entire agreement</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">These Terms and the documents referred to in them constitute the entire agreement between You and the Organiser and supersede all
other agreements or arrangements, whether written or oral, express or implied, between You and the Organiser.<br />
</p></td>
	     </tr>


		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.7 Taxes and Duties</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">All payments are to be made by You under these Terms are exclusive of all applicable taxes and duties, which will, where applicable, be paid in addition by You.<br />
</p></td>
	     </tr>


		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.8 Authority to execute</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">The signatory executing these Terms on behalf of another person represents and warrants that he/ she is empowered to execute them
and that all necessary action to authorise their execution has been taken.<br />
</p></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="middle" height="40"><h2 style=" font-family: Arial, Helvetica, sans-serif; font-size:18px; width:100%;">6.9 Governing law and jurisdiction</h2>
	       <p style="float:left; font-family: Arial, Helvetica, sans-serif; font-size:14px; width:100%;">This Agreement shall be governed, interpreted and enforced in accordance with the laws of Singapore without regard to conflict of law principles. The courts of Singapore will have sole and exclusive jurisdiction with respect to any disputes arising out of this Agreement.<br />
<br />
<br />
</p></td>
	     </tr>
		 
		 <tr>
	     <td align="left" valign="top">
		 	<table width="350" border="0" cellspacing="0" cellpadding="0">
	       <tr>
	         <td height="30" align="left" valign="top" style="border-bottom:#000 solid 1px;"></td>
	         </tr>
	       <tr>
	         <td height="25" align="left" valign="bottom">Place, Date Company Name</td>
	         </tr>
	       <tr>
	         <td height="70" align="left" valign="top">&nbsp;</td>
	         </tr>
	       <tr>
	         <td height="30" align="left" valign="top" style="border-bottom:#000 solid 1px;"></td>
	         </tr>
	       <tr>
	         <td height="25" align="left" valign="bottom">Signature</td>
	         </tr>
	       <tr>
	         <td height="70" align="left" valign="top">&nbsp;</td>
	         </tr>
	       <tr>
	         <td height="30" align="left" valign="top" style="border-bottom:#000 solid 1px;"></td>
	         </tr>
	       <tr>
	         <td height="25" align="left" valign="bottom">Name (BLOCK CAPITALS), Title, Company Seal<br />
This document must be signed only an Authorized representative of the company.</td>
	         </tr>
	       </table>
		 </td>
	     </tr>
		 
		 
    </table>
	</td>
  </tr>
</table>
</div>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+