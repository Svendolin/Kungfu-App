<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Login Formular mit Bootstrap</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>	
	<h2 class="gelb">Login Formular mit Bootstrap</h2>
	<ul class="explanation">
		<li><strong>Aufgabe:</strong> Gestalte das Login-Formular dieser Seite mit Hilfe von Bootstrap.</li>
		<li>Einfacher Lösungs-Ansatz: Siehe dir <a href="http://getbootstrap.com/docs/4.0/examples/signin/" target="_blank">hier</a> ein &quot;offizielles&quot; Beispiel an.</li>
		<li>Erweiterter Lösungs-Ansatz: Versuche es von Grund auf selber.</li>
	</ul>
 	<form>
    	<label for="userName">Username:</label>
        <input type="email" id="userName" name="userName">
        <label for="Passwort">Passwort:</label>
        <input type="password" id="PW" name="PW">
        <button type="submit">Sign in</button>
    </form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
