<?php
require("credentials.php");
$sql = "SELECT * FROM contents";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $code = "";
    while($row = $result->fetch_assoc()) {
    	$code .= "ID: " . $row["id"]. "<br>";
        $code .= "Title: " . $row["title"]. "<br>";
       	$code .= "Short Description (html): <br>" . $row["short_desc"]. "<br>";
        $code .= "Long Description: (html): <br>" . $row["long_desc"]. "<br>";
        $code .= "<hr>";
    }
}

else {
    $code .= "No results";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Lesen</title>
</head>
<body>
<h1>Inhalt der Tabelle &quot;contents&quot;</h1>
<?php
echo $code;
?>
</body>
</html>
