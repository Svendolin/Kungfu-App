<?php
require("credentials.php");
// Insert record
if(isset($_POST['submit'])){

  $title = $_POST['title'];
  $short_desc = $_POST['short_desc'];
  $long_desc = $_POST['long_desc'];

  if($title != ''){

    mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
    // header('location: index.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Schreiben php</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="ckeditor-4/ckeditor.js"></script>
    </head>
    <style type="text/css">
    .cke_textarea_inline{
       border: 1px solid black;
    }
    </style>
    <body>
    <br><br>
<form method='post' action='schreiben.php'>
       Title : 
       <input type="text" name="title" >
		<br><br>
       Short Description: 
       <textarea id='short_desc' name='short_desc' style='border: 1px solid black;'></textarea><br>

       Long Description: 
       <textarea id='long_desc' name='long_desc' ></textarea><br>

       <input type="submit" name="submit" value="Submit">
    </form>

<script type="text/javascript">
// Initialize CKEditor
CKEDITOR.inline( 'short_desc' );

CKEDITOR.replace('long_desc',{
	customConfig: 'MyConfig.js',
  	width: "500px",
  	height: "200px"

}); 

</script>
    </body>
</html>