<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>heredoc Schreibweise</title>
</head>
<body>
<h1>heredoc Schreibweise - Eine &quot;Zicke&quot;</h1>
<p>EOT - End of Transmission</p>
<?php
$myList = <<<EOT
<ul>
	<li>bla</li>
	<li>blu</li>
	<li>ble</li>
</ul>
EOT;
echo $myList;
?>
<p><strong>Achtung:</strong> Es ist sehr wichtig zu beachten, dass die Zeile mit dem schließenden Bezeichner keine anderen Zeichen enthält, ausgenommen möglicherweise ein Semikolon (;). Das bedeutet, dass der Bezeichner nicht eingerückt werden darf. Es dürfen weiterhin keine Leerzeichen oder Tabulatoren vor oder nach dem Semikolon stehen.</p>
<p>Sonst gibt es eine Fehlermeldung: <code>Parse error: syntax error, unexpected end of file in ...</code></p>
</body>
</html>
