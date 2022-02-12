<?php 
include "config.php";

// Eine Schritt für Schritt Anleitung gibts hier:
// https://makitweb.com/integrate-ckeditor-to-html-page-and-save-to-mysql-with-php/

// Insert record
if(isset($_POST['submit'])){

  $title = $_POST['title'];
  $short_desc = $_POST['short_desc'];
  $long_desc = $_POST['long_desc'];

  if($title != ''){

    mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
    header('location: index.php');
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Integrate CKeditor to HTML page and save to MySQL with PHP</title>

    <!-- CSS -->
    <style type="text/css">
    .cke_textarea_inline{
       border: 1px solid black;
    }
    </style>

    <!-- CKEditor --> 
    <script src="ckeditor/ckeditor.js" ></script>
  </head>
  <body>

    <form method='post' action=''>
       Title : 
       <input type="text" name="title" ><br>

       Short Description: 
       <textarea id='short_desc' name='short_desc' style='border: 1px solid black;' >       </textarea><br>

       Long Description: 
       <textarea id='long_desc' name='long_desc' ></textarea><br>

       <input type="submit" name="submit" value="Submit">
    </form>

  </body>

  <script type="text/javascript">

    // Initialize CKEditor
    CKEDITOR.inline( 'short_desc' );

    CKEDITOR.replace('long_desc',{

      width: "500px",
      height: "200px"

    }); 

  </script>
</html>