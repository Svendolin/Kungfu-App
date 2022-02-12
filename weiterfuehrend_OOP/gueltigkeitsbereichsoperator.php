<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Der Gültigkeitsbereichsoperator</title>
	<link rel="stylesheet" href="../generalstyles.css">
</head>
<body>
	<h2 class="rot">Der Gültigkeitsbereichsoperator</h2>
	
	<h3>Ein Zungenbrecher</h3>
	
	<p class="explanation">Der Operator mit den beiden Doppelpunkten bezeichnet man als ...</p>

	<ul class="explanation">
		<li><strong>Gültigkeitsbereichsoperator</strong> (auf deutsch)</li>
		<li><strong>Scope Resolution Operator</strong> (auf englisch)</li>
		<li><strong>Paamayim Nekudotayim</strong> (auf hebräisch)</li>
	</ul>
	
	<p class="explanation">... in allen Sprachen also mit einem Zungenbrecher, den man sich kaum merken kann. Der hebräische Begriff stammt vom Zend-PHP-Entwicklerteam. Er wurde auch international verwendet, bevor man Begriffe in anderen Sprachen schuf. In älteren PHP-Tutorials wirst du ihn deshalb noch antreffen, auch in Fehlermeldungen tritt er manchmal zu Tage.</p>
	
	<p class="explanation">Weil diese Wörter so schwierig sind, wird im Englischen oft der halb-offizielle Ausdruck &quot;double colon&quot; verwendet. Leider entsteht aber deutschen Übersetzung der Alternative ein weiteres Un-Wort: der &quot;doppelte Doppelpunkt&quot;.</p>
	
	<h3>Bespiele für den Einsatz (Erklärungen in den folgenden Kapiteln):</h3>
	
	<ul class="explanation">
		<li>Aufruf der Konstruktormethode der Elternklasse (aus der Subklasse):<br>
		<code>parent::__construct();</code></li>
		<li>Aufruf einer statischen Methode der Klasse &quot;myClass&quot;:<br>
		<code>myClass::myStaticMethod()</code></li>
		<li>Lesen einer statischen Variable von innerhalb einer Klasse:<br>
		<code>self::$myStaticVariable</code></li>
	</ul>

	<footer>
		<a href="../index_2.html">&lt; Home</a>
	</footer>
</body>
</html>


