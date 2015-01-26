<?php

if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                 $destination = $_SERVER['DOCUMENT_ROOT'].'/amol/ciochoice/full/ciofullzip/upload/'. $filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo 'http://localhost/amol/ciochoice/full/ciofullzip/upload/'. $filename;//change this URL
            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
        }
?>

	<script>
           
	 $(document).ready(function() {
      $('.tour_overviews').summernote({
        height: 400,
       onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }          
        
      });

      $('form').on('submit', function (e) {
      $('.tour_overviews').code();
      });
      
      function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "http://localhost/amol/ciochoice/full/ciofullzip/admin/editerimageupload.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    
                    editor.insertImage(welEditable, url);
                }
            });
        }
    });
</script>
