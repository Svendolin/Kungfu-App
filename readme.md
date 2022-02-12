## &nbsp;Content: 💬😀👍
***
| Folder: |  Content:  | 
|:--------------| :--------------|
|affenschwanz| "Affenschwanz-Prinzip" mit ISSET / FILTER_VAR and SANITIZING |
|bootstrap_formulare| Formular with Bootstrap |
|datum_Zeit | Date Time |
|einfaches_cms | Easy CMS without Database |
|einfaches_cms_db | Not-so-easy CMS with Database |
|einstieg OOP| (i) Classes / Superclasses / Method (class with function) / Extends / Constructors / functions|
|fit_fuer_MySQL| MySQL exercise|
|formular_validierung| Email / Regex Password / String length (filled fields)|
|formular-elemente| How to write a form properly (labels, buttons, POST)|
|joins3_2| Working with different join types like "innerjoin" and others |
|login| Procedural Login with password HASH and password VERIFY |
|OOP_uebungen| (i) Exercises to test what I've learned from "einstieg_OOP" |
|PDO| (i) |
|sessions| Mistakes / redirect / write / destroy |
|weiterfuehrend_OOP | (i) |
|zusMaterial| Additional Material |


<br>
<br>


## &nbsp;Licensing: ✅ 
***
* Basic Content belongs to Rene Esposito, Instructor of 
https://www.sae.edu/

* Adjustments are made by me for a better personal understanding

<br>
<br>

## &nbsp;Before to start: ✅ 
***
1) Make sure you installed XAMPP or MAMP to work with a localhost on an apache-server
2) Copy this in your htdocs folder to work with your PHP-files
3) Have you heared about MVC (Model View Controller)? here you go: https://www.youtube.com/watch?v=3OKOe7CraGY


<br>
<br>

## &nbsp;OOP and PDO: Important TERMS in this code: 📈
***
| Term (word): |  Explenation:  | 
|:--------------| :--------------|
|**INSTANZIERUNG**| $instanz => "Bauplan" |
|**AUSGABE**| $ausgabe => Ausgabenvariable "Fernseher", um "Bauplan" anzuzeigen |
|**PROCEDURAL PHP**| Regular PHP vs: |
|**OOP PHP with MVC**| Object Oriented Programming which uses a design pattern called Model View Controller |
|**PDO**| PHP Data Object, which helps to connect to database in OOP |
|||


**METHODE - EINE AUSGABE:**
```php
/* Ausgelagertes .CLASS FILE */
// 0) METHODE definieren: Funktion "rechne()" in einer Klasse "QuadratZahl1"
// Ausgelagert in .class-Ordner require("class/QuadratZahl1.class.php");
class QuadratZahl1 {
	
	function rechne($anna) {
		$resultat = $anna * $anna;
		return $resultat; // return, kein echo notwendig
	}
}

/* MAIN FILE*/

// 1) Instanzierung (Instanz erhält mit "new" die Spezielkraft)
$instanz = new QuadratZahl1();

// 2) Aufrufen in der Instanzvariable mit Parameter (hier 5) und als Ausgabevariable definieren für das spätere Echo
$ausgabe = $instanz -> rechne(5);

/* MAIN FILE HTML */
// 3) Als echo im HTML ausgeben
echo $ausgabe;
```

**METHODE - MEHRERE AUSGABEN:**
```php
/* Ausgelagertes .CLASS FILE */
// 0) METHODE definieren: Funktion "rechne()" in einer Klasse "QuadratZahl1"
// Ausgelagert in .class-Ordner require("class/QuadratZahl1.class.php");
class QuadratZahl1 {
	
	function rechne($anna) {
		$resultat = $anna * $anna;
		return $resultat; // return, kein echo notwendig
	}
}

/* MAIN FILE*/

$instanz1 = new QuadratZahl1();
$ausgabe1 = $instanz1 -> rechne(5);

$instanz2 = new QuadratZahl1();
$ausgabe2 = $instanz2 -> rechne(8);

$instanz3 = new QuadratZahl1();
$ausgabe3 = $instanz3 -> rechne(15);

/* MAIN FILE HTML */
echo "Erste Ausgabe: ".$ausgabe1."<br>";
echo "Zweite Ausgabe: ".$ausgabe2."<br>";
echo "Dritte Ausgabe: ".$ausgabe3;
```

<br>
<br>

## &nbsp;How to publish something at HEROKU.COM: 📩
***
| STEP |  What to do:  | 
|:--------------| :--------------|
|1| ... |


