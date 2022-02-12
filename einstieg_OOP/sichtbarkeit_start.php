<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sichtbarkeit (Zugriffsbeschränkungen)</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="schwarz">Sichtbarkeit (Zugriffsbeschränkungen)</h2>
	<h3>Schalter geschlossen...</h3>
	<p><img src="images/schalter_zu.jpg" alt="" width="750" height="501" border="0" /></p>

	<ul class="explanation">
		<li>Für alle Mitglieder eines Objekts können Zugriffsbeschränkungen definiert und somit die Beziehungen mit der &quot;Aussenwelt&quot; geregelt werden werden.</li>
		<li>Dies wird mit speziellen Schlüsselwörtern, den sog. Zugriffsmodifikatoren (engl. &quot;access specifiers&quot;, &quot;access modifiers&quot; oder kurz &quot;modifiers&quot;) vollzogen.</li>
		<li><code>public</code> zum Beispiel bedeutet, dass mit einem Mitglied von ausserhalb und innerhalb der Klasse gearbeitet werden kann, <code>private</code> hingegen bedeutet, dass auf das Mitglied nur innerhalb des Objektes zugegriffen werden kann.</li>
		<li>&quot;Zwingt&quot; man PHP dazu, aus einer &quot;gesperrten Verwandtschaftsbeziehung&quot; ein Mitglied anzusprechen, wird das Skript abgebrochen und eine Fehlermeldung (Fatal error) ausgegeben.</li>
	</ul>
	
	<h3>Übersichtstabelle Zugriffsmodifikatoren in PHP</h3>

	<table border="0" cellpadding="0" cellspacing="0" class="bordered explanation">
		<tr>
			<td><strong>Zugriff (sichtbar) von...</strong></td>
			<td><code>public</code></td>
			<td><code>protected</code></td>
		<td><code>private</code></td>
		</tr>
		<tr>
			<td>...gleicher Klasse</td>
			<td align="center"><img src="images/tick.gif" alt="ja" width="16" height="16" border="0" /></td>
			<td align="center"><img src="images/tick.gif" alt="ja" width="16" height="16" border="0" /></td>
			<td align="center"><img src="images/tick.gif" alt="ja" width="16" height="16" border="0" /></td>
		</tr>
		<tr>
			<td>...vererbter Klasse</td>
			<td align="center"><img src="images/tick.gif" alt="ja" width="16" height="16" border="0" /></td>
			<td align="center"><img src="images/tick.gif" alt="ja" width="16" height="16" border="0" /></td>
			<td align="center"><img src="images/cross.gif" alt="nein" width="16" height="16" border="0" /></td>
		</tr>
		<tr>
			<td>...einer anderen Klasse<br />oder generell von &quot;aussen&quot;</td>
			<td align="center"><img src="images/tick.gif" alt="ja" width="16" height="16" border="0" /></td>
			<td align="center"><img src="images/cross.gif" alt="nein" width="16" height="16" border="0" /></td>
			<td align="center"><img src="images/cross.gif" alt="nein" width="16" height="16" border="0" /></td>
		</tr>
	</table>

	<ul class="explanation">
		<li>Um mit einer Metapher zu sprechen: Man kann sich eine Klasse als Amt mit verschiedenen Abteilungen vorstellen. Innerhalb des Amtes können die Abteilungen untereinander uneingeschränkt miteinander kommunzieren. Gegen aussen wird der Kontakt mit Kunden <strong>möglichst auf das Notwendigste</strong> beschränkt. Der Schalter (Zugriff) zu einer Abteilung (Mitglied) kann jederzeit (mit <code>protected</code> oder <code>private</code>) geschlossen werden.</li>
		<li>Mit den Zugriffsbeschränkungen kann ein wichtiges Konzept der OOP - <strong>die (Daten-)Kapselung</strong> - umgesetzt werden: In einem Objekt soll <strong>nichts unkontrolliert gelesen oder verändert werden können</strong> und das interne Funktionieren des Objektes muss den User nichts angehen. Eine gute und einigermassen verständliche Beschreibung dieses Konzeptes findest du auf <a href="http://de.wikipedia.org/wiki/Datenkapselung_(Programmierung)" target="_blank">Wikipedia</a>.</li>
		<li>Bei Projekten, die von mehreren Entwicklern vorangetrieben werden, kann ausserdem die Gefahr verkleinert werden, dass in Folge von Namensverwechslungen oder Denkfehlern Eigenschaften mit falschen Werten &quot;gefüllt&quot; oder überschrieben werden.</li>
		<li>Hinweis: In anderen Sprachen gibt es einen weiteren Modifikator, <code>internal</code>. PHP kennt das Prinzip des package jedoch nicht, somit entfällt dieser Aspekt.</li>
	</ul>

	<h3>Projektende: Kanalisieren von Beziehungen</h3>
	
	<p class="explanation">Der Umgang mit Zugriffsbeschränkungen setzt bereits einen gewissen Überblick oder &quot;Fernsicht&quot; auf das Resultat bei der Programmierung eines Projekt voraus, was natürlich bei Einsteigern in die OOP nicht gegeben ist. Es ist ist jedoch nicht falsch, vorerst alle Methoden und Eigenschaften als &quot;public&quot; zu definieren. Deshalb mein Tipp:</p>
	
	<ul class="explanation">
		<li>Deklariere zuerst alles mit <code>public</code>, bis dein Projekt lauffähig ist.</li>
		<li>Gehe deinen Code am Schluss nochmals durch und frage dich dann, welche Eigenschaften und Methoden wo gebraucht und aufgerufen werden können/müssen. <strong>Schränke am Schluss die Zugriffsmöglichkeiten möglichst ein</strong>.</li>
	</ul>
	
	<h3>Merke dir folgende zwei PHP-Spielregeln:</h3>
	<ul class="explanation">
		<li>Bei der Deklaration einer Eigenschaft musst du <strong>immer</strong> einen Zugriffsmodifikator notieren.</li>
		<li>Bei der Definition einer Methode muss hingegen nicht unbedingt ein Modifikator stehen. <strong>Eine Methode ohne Modifikator wird in PHP als <code>public</code> interpretiert.</strong></li>
	</ul>
	
	<hr>
	<h4>Links zu den Beispielscripts</h4>
	<ul class="explanation">
		<li><a href="sichtbarkeit_beispielskripte/sichtbarkeit_1.php">sichtbarkeit_1.php</a></li>
		<li><a href="sichtbarkeit_beispielskripte/sichtbarkeit_2.php">sichtbarkeit_2.php</a> (Aufruf schlägt fehl, bitte Code anschauen)</li>
		<li><a href="sichtbarkeit_beispielskripte/sichtbarkeit_3.php">sichtbarkeit_3.php</a> (Aufruf schlägt fehl, bitte Code anschauen)</li>
		<li><a href="sichtbarkeit_beispielskripte/sichtbarkeit_4.php">sichtbarkeit_4.php</a></li>
		<li><a href="sichtbarkeit_beispielskripte/sichtbarkeit_5.php">sichtbarkeit_5.php</a> (Aufruf schlägt fehl, bitte Code anschauen)</li>
		<li><a href="sichtbarkeit_beispielskripte/sichtbarkeit_6.php">sichtbarkeit_6.php</a></li>
	</ul>
	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


