<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Registrations-Formular mit Bootstrap</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>	
	<h2 class="gelb">Registrations-Formular mit Bootstrap</h2>
	<ul class="explanation">
		<li><strong>Aufgabe:</strong> Gestalte das Registrations-Formular dieser Seite mit Hilfe von Bootstrap.</li>
		<li>Hier wird mit dem Placeholder-Attribut gearbeitet, so wie es viele junge Webentwickler machen. Aus Sicht der Barrierefreiheit ist dies jedoch nicht optimal.<br>
		Entscheide selber, ob du Label-Tags statt Placeholder-Attribute einsetzen möchtest.</li>
		<li>Einige Überlegungen zu diesem Thema findest du hier: <a href="https://www.nngroup.com/articles/form-design-placeholders/" target="_blank">&quot;Placeholders in Form Fields Are Harmful&quot;</a>. Ich empfehle dir, dich mit diesem Beitrag auseinanderzusetzen!</li>
		<li><strong>Zusatz-Aufgabe für Einsteiger:</strong> Falls dir noch nicht klar ist, was genau der Unterschied zwischen value- und placeholder-Attribut ist, wäre jetzt der Zeitpunkt, dich darüber schlau zu machen!</li>
	</ul>
 	<form>
 		<div>
			<input type="text" name="vorname" placeholder="Vorname">
		</div>
		<div>
			<input type="text" name="nachname" placeholder="Nachname">
		</div>
		<div>
			<input type="email" name="email" placeholder="Email">
		</div>
		<div>
			<input type="password" name="password" placeholder="Password">
		</div>
		<div>
			<button type="submit" name="go">Registrieren</button>
		</div>
    </form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>
