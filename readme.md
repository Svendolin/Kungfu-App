## &nbsp;Content: 💬😀👍
***
| Folder: |  Content:  | 
|:--------------| :--------------|
|affenschwanz| "Affenschwanz-Prinzip" mit ISSET / FILTER_VAR and SANITIZING |
|bootstrap_formulare| Formular with Bootstrap |
|datum_Zeit | Date Time |
|einfaches_cms | Easy CMS without Database |
|einfaches_cms_db | Not-so-easy CMS with Database |
|einstieg OOP| (i) Classes / Superclasses / Method (class with function) / Extends / Constructors / functions / modificators|
|fit_fuer_MySQL| MySQL exercise|
|formular_validierung| Email / Regex Password / String length (filled fields)|
|formular-elemente| How to write a form properly (labels, buttons, POST)|
|joins3_2| Working with different join types like "innerjoin" and others |
|login| Procedural Login with password HASH and password VERIFY |
|OOP_uebungen| (i) Exercises to test what I've learned from "einstieg_OOP" |
|PDO| (i) |
|sessions| Mistakes / redirect / write / destroy |
|weiterfuehrend_OOP | (i) OPEN |
|zusMaterial| Additional Material |


<br>
<br>


## &nbsp;Licensing: ✅ 
***
* Basic structure, basic comments and design belongs to Rene Esposito, Instructor of 
https://www.sae.edu/

* Adjustments are made by me, Sven Kamm, for a better personal understanding and comfortable usage in the future

<br>
<br>

## &nbsp;Before to start: ✅ 
***
**Useful steps:**

1) Make sure you installed XAMPP or MAMP to work with a localhost on an apache-server
2) Copy this in your htdocs folder to work with your PHP-files
3) Have you heared about MVC (Model View Controller)? here you go: https://www.youtube.com/watch?v=3OKOe7CraGY

**Why OOP?**
- OOP uses seperate files with concerning tasks - Its better for group work and organized processes
- Do more in less time: Develop together, changes of code can be made collectively
- You can re-use the code (less code to compile)
- Easier to build larger websites
- Basic PHP (Procedural PHP) still has to be learned for the basic understanding

**Why MVC?**
 * it's a design pattern who takes care of database processes and CRUD-Operations
 * When you chose the way to write PHP-Code with OOP, you automatically start working to use MVC
 * Although connecting to MySQL-Database the procedural way is improved with i = MYSQLI, but for every other file
 you have to duplicate the code. MVC makes it much easer (1 to 3 are three different "people" or classes):
        
	
	   0) We want to share our secrets and content: DB
	   1) Model: CEO, which knows everything (only him) about the database stuff (connecting to database f.ex.)
	   2) View: "Sells stuff for custommers" and works as a communicator in between (gets data from the model and tries to sell it to the controller)
	   3) Controller: "Custommer who wants to buy stuff" (where the users do their input and catch infos from the model)


<br>
<br>

## &nbsp;OOP and PDO: Important TERMS in this WEBAPP_KUNGFU: 📈
***
| Term (word): |  Explenation:  | 
|:--------------| :--------------|
|**"INSTANZIERUNG" ->**| $instanz => "Bauplan" (Wichtig: Nach -> NICHT Dollarzeichen verwenden, da Variable dadurch instanziert wird) |
|**"AUSGABE"**| $ausgabe = Ausgabenvariable "Fernseher", um "Bauplan" durch Ausrufen der Instanz-> anzuzeigen |
|**"new"**| Instance a class from .class File to Main-File to create a new object (A) |
|**PROCEDURAL PHP**| Regular PHP with tons of code with NO SEPERATE FILES AND CONCERNING TASKS vs: |
|**OOP PHP with MVC**| Object Oriented Programming which uses a design pattern called Model View Controller |
|**MVC - Model View Controller**| In OOP, we divide the code into certain areas / files: 1)=> A model file (connecting to database) 2)=> A view file (to show what the user has done) and 3)=> A control area (where users do their input), and link them together. |
|**PDO**| PHP Data Object, which helps to connect to database in OOP {{{ *PDO > CRUD_beispiel / loginWithPDO* }}} |
|**ARRAY**| Data structure that stores one or more similar type of values in a single name |
|**CLASS (I)**| A OOP-package of Methods and Properties |
|**METHOD (II) + (visability)**| A OOP-function ...() in a class {} // Opt: you can use accessmodifier as well to change visability! |
|**PROPERTY (III) + Visability:**| "Eigenschaft in OOP": A variable "$" in a class {} to capture a value in this variable + you HAVE TO define the visability as public, protected or private... |
|**"public"**| Visability-Accessmodifier: "The counter is open for all" TIP: At first, set everything to Public to make sure your project works. |
|**"protected"**| Visability-Accessmodifier: "The counter is closed to the public, department among themselves can continue to operate". With "protected", the superclass can "lock the door", the subclasses "act as emergency keys" |
|**"private"**| Visability-Accessmodifier: With "private", access can neither be guaranteed via main and class files, nor via class inheritance. |
|**$this** | $this-Keyword is used to call Methods (II) and Properties (III) in a class (I) |
|**OBJECT (A) with "new" in main-processing-document**| Instance ("Instanzierung") of a class with an allocated memory ("Sammlung von Variablen") in the MAIN FILE (index file) |
|**MEMBERS**| Methods (II) and Properties (III) in an object (A)|
|**CONSTRUCTOR**| function __construct() => Konstruktor-Methode-Infrastrukur (angeben, was die Methode (II) zum leben braucht) |
|**INHERITANCE with:**| "Vererbung" with Superclasses (HEREDITARY = VERERBEND) and Subclasses (INHERITED = ERBEND) |
|**SUPERCLASS > SUBCLASS**| Subclasses are CHILDS, subordinated and inherited of their PARENTS,  known as Superclasses |
|**EXTENDS**| Keyword: "subclass of" => class HUND extends HAUSTIER = Therefore: "Hund ist eine Subklasse von Haustier" |

<br>
<br>

**1.1 METHODE (OHNE PROPERTIES) - EINE AUSGABE:**
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

/* ---- MAIN FILE (PROCESSING FILE) ---- */

// 0) Auf das ausgelagerte File zugreifen
require("class/QuadratZahl1.class.php");

// 1) Object-Instanzierung (Instanz erhält mit "new"-Anweisung die Spezielkraft, Klasse wird mit seinem Namen instanziert)
$instanz = new QuadratZahl1();

// 1.1) OPT: var_dump() zeigt den Inhalt dieser Klasse auf
var_dump($instanz);

// 2) Aufrufen in der Instanzvariable mit Parameter (hier 5) und als Ausgabevariable definieren für das spätere Echo
$ausgabe = $instanz -> rechne(5);

/* ---- MAIN FILE HTML ---- */

// 3) Als echo im HTML ausgeben
echo $ausgabe; // 25
```
<br>

**1.2 METHODE (OHNE PROPERTIES) - MEHRERE AUSGABEN:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class QuadratZahl1 {
	
	function rechne($anna) {
		$resultat = $anna * $anna;
		return $resultat; // return, kein echo notwendig
	}
}

/* ---- MAIN FILE ---- */
require("class/QuadratZahl1.class.php");

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

**1.3 METHODE - MIT PROPERTY (EIGENSCHAFT, VOREINSTELLUNG) public + $this + MEHREREN AUSGABEN:**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class QuadratZahl2 {
	
  // public-EIGENSCHAFT "PROPERTY" ist wie eine "VOREINSTELLUNG" in Variable $AntwortSatz. d.h:
  // Wir geben im Bauch des Antwortsatzes automatisch diesen String mit:
	public $AntwortSatz = "Das Resultat ist: "; 
	
	// Methode
	function rechne($anna) {
		/* $this (Zugreifen, was innerhalb der Klasse definiert wurde)
		- Mit $this wird auf die Eigenschaft zugegriffen, die in allen Methoden sichtbar sind 
			("Im Bauch der Methode suchen")
		- Mit $this macht man einen Verweis auf das eigene Objekt aus der VOREINSTELLUNG
		- Beachte, dass das $-Zeichen vor "AntwortSatz" fehlt!!!
		*/
		$resultat = $this->AntwortSatz.$anna * $anna;
		
		return $resultat;
	}
}

/* ---- MAIN FILE ---- */
require("class/QuadratZahl2class.php");

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
require("class/Konstruktiv.class.php");

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
require("class/KonstruktivPara.class.php");
// Die Konstruktormethode wird mit Parameter in Form von x2 Strings"" aufgerufen
// Instanzierung mit new und Klassenname() (In $instanz ist der ganze Bauplan):
$instanz = new KonstruktivPara("Peter","Muster");
```
<br>

**2.3 KONSTRUKTOR-METHODE MIT MEHREREN AUSGABEN: ------ (Siehe: konstruktor.php):**
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
require("class/Kreisberechnung.class.php");
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

**3.1 VERERBUNG (INHERITANCE) SUPER- SUBKLASSENBEZIEHUNG: ----- [(Click HERE to view full example)](https://github.com/Svendolin/Kungfu-App/tree/master/einstieg_OOP/vererbung1_beispielskripte)**
```php
/* ---- ERSTES .CLASS FILE AUSGELAGERT (SUPERKLASSE) ---- */
//  * Superklasse *
class Haustier {
	// Es hat drin: Eigenschaften (properties) für ALLE Haustiere
	public $geschlecht;
	public $name;
	public $art;
		
	// Es hat drin: Methode (method =  function()) für ALLE Haustiere
	function WasBinIch() {
		$string = "Über mich: Ich bin ein/e ";
		$string .= $this->art.", "; // $this = Referenz auf Objekt public $art
		$string .= "ich heisse ".$this->name;
		$string .= " und ich bin ".$this->geschlecht;
		return $string;
	}
}

/* ---- ZWEITES .CLASS FILE AUSGELAGERT (SUBKLASSE) ---- */
// Hier braucht's das Schlüsselwort "extends"
// Somit ist diese Klasse HUND offiziell eine Subklasse von HAUSTIER
class Hund extends Haustier {
		
	// Diese METHODE gibt's NUR HIER, in der Subklasse
	function bellen() {
		$meineWoerter = "Wuff, Wuff";
		return $meineWoerter;
	}
}

/* ---- MAIN FILE ---- */
require("class/Haustier.class.php");
require("class/Hund.class.php");

// Instanziiert wird hier NUR DIE SUBKLASSE! - "new Hund()" reicht
// Trotzdem stehen darauf die Mitglieder der Superklasse im Objekt zur Verfügung.
$instanz = new Hund();

// Eigenschaften schreiben, man beachte:
// diese gehören zur Instanz der Subklasse, obwohl sie in der Superklasse definiert wurden!!!
// Über die Instanz ansprechen:
$instanz -> geschlecht = "männlich";
$instanz -> name = "Waldi";
$instanz -> art = "Hund";

// 1) Methode der SUPERKLASSE aufrufen, man beachte:
// diese gehört zur Instanz der Subklasse, obwohl sie in der Superklasse definiert wurde!!!
$ausgabe1 = $instanz -> WasBinIch();

// 2) Methode der SUBKLASSE aufrufen:
$ausgabe2 = $instanz -> bellen();

/* ---- MAIN FILE HTML ---- */
echo $ausgabe1;
echo "<br>";
echo $ausgabe2;
```
<br>

**3.2 VERERBUNG SICHTBARKEIT mit ACCESS MODIFIERS (private, protected, public) an Methoden:**
```php
/* ---- ERSTES .CLASS FILE AUSGELAGERT (SUPERKLASSE) ---- */
//  * Superklasse *
class SchatzkistePrivate {

	/* Opt:
	- Ändere private zu protected, um die Subklasse zu schützen und den Error hier zu löschen! Somit kann die Subklasse ihren part übernehmen
	- Ändere private zu public, so wird die Superklasse direkt ausgeführt und die Subklasse wäre eigentlich hinfällig
	*/
	private function zeigeCodeFuerSchatz() { 
		$source = "<img src=\"bilder/treasurechest.png\">";
		return $source;
	}
}

/* ---- ZWEITES .CLASS FILE AUSGELAGERT (SUBKLASSE) ---- */
// Hier braucht's ebenfalls das Schlüsselwort "extends"
/class SchatzkisteKind2 extends SchatzkistePrivate {

	public function KindMethode() {
		// Aufruf einer Methode in der Superklasse SchatzkistePrivate, die mit private definiert ist
		// Dies schlägt fehl
		$raus = $this -> ZeigeCodeFuerSchatz();
		return $raus;
	}
}

/* ---- MAIN FILE ---- */

require("class/SchatzkistePrivate.class.php"); // Auslagerung der Superklasse (set to private)
require("class/SchatzkisteKind2.class.php"); // Auslagerung der Subklasse (set to public)
$instanz = new SchatzkisteKind2();
// 1) Zugriff auf eine öffentliche Methode der Subklasse SchatzkisteKind2...
// 2) ...die (intern) auf eine Methode der Superklasse SchatzkistePrivate zugreift...
// 3) ...welche ihrerseits mit private definiert ist.
// 4) Das schlägt fehl! Der Notschlüssel
$ausgabe = $instanz -> KindMethode();

/* ---- MAIN FILE HTML ---- */
echo $ausgabe;
```
<br>

**3.3 Wie kann man den ACCESS MODIFIER private korrekt anwenden?**
```php
/* ---- .CLASS FILE AUSGELAGERT ---- */
class SchatzkistePrivatePlus {
	// Properties kann man mit Sichtbarkeit schalten, METHODEN enbenfalls!
	// Somit setzen wir die ertse Methode auf PRIVATE...
	private function zeigeCodeFuerSchatz() {
		$source = "<img src=\"bilder/treasurechest.png\">";
		return $source;
	}
	// ...und die zweite Methode auf PUBLIC:
	// Innerhalb der KLASSE kann auf die obige Methode zugegriffen werden, auch wenn diese mit private definiert ist:
	public function zweiteMethode() {
		$sourceVonOben = $this -> zeigeCodeFuerSchatz();
		return $sourceVonOben;
	
	}
}

/* ---- MAIN FILE ---- */

require("class/SchatzkistePrivatePlus.class.php");
$instanz = new SchatzkistePrivatePlus();
// Zugriff auf eine öffentliche Methode,
// die (intern) auf eine andere Methode der gleichen Klasse zugreift,
// welche ihrerseits mit private definiert ist
$ausgabe = $instanz -> zweiteMethode();

/* ---- MAIN FILE HTML ---- */
echo $ausgabe;
```
<br>

<br>
<br>



