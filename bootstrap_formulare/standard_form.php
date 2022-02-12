<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Standard-Formular mit Bootstrap</title>
	<link rel="stylesheet" href="formstyles.css">
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="gelb">Standard-Formular mit Bootstrap</h2>
	<ul class="explanation">
		<li><strong>Aufgabe:</strong> Gestalte das Formular dieser Seite mit Hilfe von Bootstrap.</li>
		<li>Das Formular soll ein sog. &quot;Horizontal Form&quot; (= Bootstrap-Begriff) werden.</li>
	</ul>
	<form action="" method="post">
		<div>
			<label for="vorname">Vorname</label>
			<input type="text" id="vorname" name="vorname">
		</div>
		<div>
			<label for="nachname">Nachname</label>
			<input type="text" id="nachname" name="nachname">
		</div>
		<div>
			<label for="emailAdresse">E-Mail Adresse:</label>
        	<input type="email" id="emailAdresse" name="emailAdresse">
    	</div>
		<div>
			<label for="bemerkungen">Bemerkungen</label>
			<textarea id="bemerkungen" name="bemerkungen"></textarea>
		</div>
		<div>
			<input type="checkbox" id="surfen" name="surfen" value="Surfen">
			<label for="surfen">Surfen</label>
			<input type="checkbox" id="rudern" name="rudern" value="Rudern">
			<label for="rudern">Rudern</label>
			<input type="checkbox" id="segeln" name="segeln" value="Segeln">
			<label for="segeln">Segeln</label>
		</div>
		<div>
			<input type="radio" id="herr" name="anrede" value="Herr">
			<label for="herr">Herr</label>
			<input type="radio" id="frau" name="anrede" value="Frau">
			<label for="frau">Frau</label>
		</div>
		<div>
			<label for="land">Land</label>
			<select name="land" id="land">
				<option value="noop">Bitte wählen</option> 
				<option value="ch">Schweiz</option> 
				<option value="de">Deutschland</option>
				<option value="li">Liechtenstein</option>
			</select>
		</div>
		<button type="submit">Formular abschicken (Button)</button>
	</form>
	<footer>
		<a href="../index.html">&lt; Home</a>
	</footer>
</body>
</html>