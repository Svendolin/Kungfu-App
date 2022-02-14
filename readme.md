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
|**INSTANZIERUNG ->**| $instanz => "Bauplan" (Wichtig: Nach -> NICHT Dollarzeichen verwenden, da Variable instanziert wurde) |
|**AUSGABE**| $ausgabe = Ausgabenvariable "Fernseher", um "Bauplan" durch Ausrufen der Instanz-> anzuzeigen |
|**PROCEDURAL PHP**| Regular PHP vs: |
|**OOP PHP with MVC**| Object Oriented Programming which uses a design pattern called Model View Controller |
|**PDO**| PHP Data Object, which helps to connect to database in OOP |
|**PROPERTY (#)**|A variable "$" in a class {} |
|**METHOD (§)**| A function ...() in a class {} |
|**MEMBERS**| Properties (#) and methods (§) in an object |
|**CONSTRUCTOR**| function __construct() => Konstruktor-Methode-Infrastrukur (angeben, was die Methode zum leben braucht) |
|**INHERITANCE**| Vererbung


**1.1 METHODE - EINE AUSGABE:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */

// 0) METHODE definieren: Funktion "rechne()" in einer Klasse "QuadratZahl1"
// Ausgelagert in .class-Ordner require("class/QuadratZahl1.class.php");
class QuadratZahl1 {
	
	function rechne($anna) {
		$resultat = $anna * $anna;
		return $resultat; // return, kein echo notwendig
	}
}

/* ---- MAIN FILE ---- */

// 1) Instanzierung (Instanz erhält mit "new" die Spezielkraft)
$instanz = new QuadratZahl1();

// 2) Aufrufen in der Instanzvariable mit Parameter (hier 5) und als Ausgabevariable definieren für das spätere Echo
$ausgabe = $instanz -> rechne(5);

/* ---- MAIN FILE HTML ---- */

// 3) Als echo im HTML ausgeben
echo $ausgabe; // 25
```
<br>

**1.2 METHODE - MEHRERE AUSGABEN:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class QuadratZahl1 {
	
	function rechne($anna) {
		$resultat = $anna * $anna;
		return $resultat; // return, kein echo notwendig
	}
}

/* ---- MAIN FILE ---- */
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

**1.3 METHODE - MIT PROPERTY (EIGENSCHAFT, VOREINSTELLUNG) + MEHREREN AUSGABEN:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class QuadratZahl2 {
	
	// public-EIGENSCHAFT "PROPERTY" ist wie eine "VOREINSTELLUNG" in Variable $AntwortSatz. d.h:
  // Wir geben im Bauch des Antwortsatzes automatisch diesen String mit:
	public $AntwortSatz = "Das Resultat ist: "; 
	
	// Methode
	function rechne($anna) {
		/* $this (Zugreifen, was innerhalb der Klasse definiert wurde)
		- Mit $this wird auf die Eigenschaft zugegriffen, die in allen Methoden sichtbar sind ("Im Bauch der Methode suchen")
		- Mit $this macht man einen Verweis auf das eigene Objekt aus der VOREINSTELLUNG
		- Beachte, dass das $-Zeichen vor "AntwortSatz" fehlt!!!
		*/
		$resultat = $this->AntwortSatz.$anna * $anna;
		
		return $resultat;
	}
}

/* ---- MAIN FILE ---- */
$instanz = new QuadratZahl2();
$ausgabe1 = $instanz -> rechne(5); // "rechne()" kümmert sich um "25", public gibt den String mit
$ausgabe2 = $instanz -> AntwortSatz; // Hier geben wir nur den String mit

/* ---- MAIN FILE HTML ---- */
echo $ausgabe1; // Das Resultat ist 25
echo $ausgabe2; // Das Resultat ist
```
<br>

**2.1 KONSTRUKTOR-METHODE:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class Konstruktiv {

	// Schlüsselwort Ausgabe
	public $ausgabe;

	// Konstruktormethode (Hier wird die GRUNDVERSORGUNG angegeben = WAS DAS OBJEKT ZUM ÜBERLEBEN BRAUCHT)
	function __construct() { // Immer mit 2x _ schreiben 
		$string = "Ich wurde geboren am ";
		$string .= date("d.m.y")." um ";
		$string .= date("H:i:s");
		// Hier wird mit echo gearbeitet, dies jedoch nur aus didaktischen Gründen (KEIN RETURN)!!!
		echo $string; // KEIN return sondern direkt das echo, wenn man __construct() verwendet
	}

}

/* ---- MAIN FILE ---- */
$instanz = new Konstruktiv();

/* ---- MAIN FILE HTML ---- */
// "ausgabe" NICHT $ausgabe nach -> da instanziert
echo $instanz -> ausgabe; // Ich wurde geboren am (Timestamp Datum) um (Timestamp Zeit)
```
<br>

**2.2 KONSTRUKTOR-METHODE MIT BRIEFKASTENVARIABLEN, WELCHE PARAMETER EMPFÄNGT:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class KonstruktivPara {
	
	// Die Konstruktormethode empfängt Parameter (Briefkastenvariablen reinschreiben)
	function __construct($param1,$param2) {
		$str = "Guten Tag ";
		// Hier wird mit echo gearbeitet, dies jedoch nur aus didaktischen Gründen!!!
		echo $str.$param1." ".$param2;
	}
}

/* ---- MAIN FILE ---- */

// Die Konstruktormethode wird mit Parameter in Form von x2 Strings"" aufgerufen
// Instanzierung mit new und Klassenname() (In $instanz ist der ganze Bauplan):
$instanz = new KonstruktivPara("Peter","Muster");
```
<br>

**2.3 KONSTRUKTOR-METHODE MIT MEHREREN AUSGABEN:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class Kreisberechnung {
	// Eigenschaften für das Festhalten der Ergebnisse
	public $flaeche = "";
	public $umfang = "";
	
	// Konstruktormethode
	function __construct($radius) {
		// Aufrufen der Hilfs-Methoden
		$this -> flaeche = $this -> calculateArea($radius);
		$this -> umfang = $this -> calculateCircumference($radius) ;
	}
	
	// Hilfs-Methode für das Berechnen der Kreisfläche
	public function calculateArea($r) {
		$fl = $r * $r * pi();
		$flGerundet = round($fl, 2);
		$flAntwort = "Die Kreisflaeche betraegt: ".$flGerundet;
		return $flAntwort;
	}
	
	// Hilfs-Methode für das Berechnen des Kreisumfangs
	public function calculateCircumference($r) {
		$um = 2 * $r * pi();
		$umGerundet = round($um, 2);
		$umAntwort = "Der Kreisumfang betraegt: ".$umGerundet;
		return $umAntwort;
	}
}

/* ---- MAIN FILE ---- */

$instanz = new Kreisberechnung(5);
// Lesen der Eigenschaften
$ausgabe1 = $instanz -> flaeche;
$ausgabe2 = $instanz -> umfang;

/* ---- MAIN FILE HTML ---- */
echo $ausgabe1;
echo "<br>";
echo $ausgabe2;
```
<br>

**3.1 VERERBUNG (INHERITANCE) SUPER- SUBKLASSENBEZIEHUNG:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class Kreisberechnung {
	// Eigenschaften für das Festhalten der Ergebnisse
	public $flaeche = "";
	public $umfang = "";
	
	// Konstruktormethode
	function __construct($radius) {
		// Aufrufen der Hilfs-Methoden
		$this -> flaeche = $this -> calculateArea($radius);
		$this -> umfang = $this -> calculateCircumference($radius) ;
	}
	
	// Hilfs-Methode für das Berechnen der Kreisfläche
	public function calculateArea($r) {
		$fl = $r * $r * pi();
		$flGerundet = round($fl, 2);
		$flAntwort = "Die Kreisflaeche betraegt: ".$flGerundet;
		return $flAntwort;
	}
	
	// Hilfs-Methode für das Berechnen des Kreisumfangs
	public function calculateCircumference($r) {
		$um = 2 * $r * pi();
		$umGerundet = round($um, 2);
		$umAntwort = "Der Kreisumfang betraegt: ".$umGerundet;
		return $umAntwort;
	}
}

/* ---- MAIN FILE ---- */

$instanz = new Kreisberechnung(5);
// Lesen der Eigenschaften
$ausgabe1 = $instanz -> flaeche;
$ausgabe2 = $instanz -> umfang;

/* ---- MAIN FILE HTML ---- */
echo $ausgabe1;
echo "<br>";
echo $ausgabe2;
```
<br>

<br>
<br>

## &nbsp;How to publish something at HEROKU.COM: 📩
***
| STEP |  What to do:  | 
|:--------------| :--------------|
|1| ... |


