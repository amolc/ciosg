	<?php 
// $file=fopen("aaa.txt","r");
// fclose($file);

// $my_file = 'aaa.txt';
// $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
	
	
	?>
	
	 <?php 
 $File = "http://staging.cio-choice.sg/admin/YourFile.txt"; 
 $Handle = fopen($File, 'a');
 $Data = "Jane Doe\n"; 
 fwrite($Handle, $Data); 
 $Data = "Bilbo Jones\n"; 
 fwrite($Handle, $Data); 
 print "Data Added"; 
 fclose($Handle); 
developer
 ?>
