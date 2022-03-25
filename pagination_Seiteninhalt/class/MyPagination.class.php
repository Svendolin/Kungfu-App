<?php
class MyPagination {

    /* Eigenschaften  */
    
    // Wie viele Datensätze möchte ich "pro Seite" anzeigen?
    // Wird hier definiert:
    private $numHits = 20;

    // Wie viele Datensätze gibt es total?
    // (Resultat aus eigener query im Konstruktor)
    private $total;

    // Ab welcher Grenze soll die Pagination (3. Variante) angezeigt werden?
    // Wird hier definiert
    private $showFullPagination = 6;

    // Wie viele Seiten gibt es?
    // Berechnet in eigener Methode "calculatePages()"
    private $numPages;

    // Was ist die aktuelle Seite, kommt als GET-Param herein,
    // desinfiziert in eigener Methode "currentPage()"
    private $currentPage;

    // Offset für query
    // Berechnet in eigener Methode calculateOffset()
    private $offset;

    // String für die Ausgabe im Feedback: von wo kommt man
    private $isCurrentPageValueFromGETParam;

    // Verbindung zur DB: eigentlich die Instanz von PDO
    private $dbh;

	// Konstruktor
    function __construct($hostname,$username,$password,$db) {
        // PDO starten
        $dsn = "mysql:host=$hostname;dbname=$db";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $this->dbh = new PDO($dsn, $username, $password,$options);

        // Query: Wie viele Datensätze gibt es insgesamt?
        $countQuery = "SELECT COUNT(*) FROM customers AS total";
        $result = $this->dbh->query($countQuery);
        $this -> total = $result->fetchColumn();
        
        /* "Hilfs"methoden aufrufen */
		// Anzahl der Seiten berechnen
        $this -> calculatePages();
		// Aktuelle Seite bestimmen (und desinfzieren)
        $this -> currentPage();
		// Offset berechnen
        $this -> calculateOffset();

    }

    // (Hilfsmethode) Wie viele "Seiten" gibt es?
    private function calculatePages() {
        // ceil() gibt die nächste Ganzzahl, die grösser oder gleich der Zahl ist, zurück.
        $this -> numPages = ceil($this -> total /  $this -> numHits);
    }

    // (Hilfsmethode) Was ist die aktuelle Seite?
    private function currentPage() {
        if (isset($_GET['page'])) {
	        $cleanPageNr = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
	        if (is_numeric($cleanPageNr)) {
		        $this -> currentPage = $cleanPageNr;
		        $this -> isCurrentPageValueFromGETParam = "<span style=\"color: green\">Ja</span>";
	        }
	        else {
		        $this -> currentPage = 1;
		        $this -> isCurrentPageValueFromGETParam = "<span style=\"color: red\">Nein, der GET-Param war keine Zahl</span>";
	        }
        }
        else {
	        $this -> currentPage = 1;
	        $this -> isCurrentPageValueFromGETParam = "<span style=\"color: red\">Nein, der GET-Param war nicht vorhanden.</span>";
        }
    }

    // (Hilfsmethode) Offset berechnen
   	private function calculateOffset() {
        // Was ist der OFFSET (Nummer des Start-Datensatz)
        $this -> offset = ($this->currentPage - 1) * $this -> numHits;
    }

    // Query zusammenbauen und Code für Tabelle generieren
    function makeTable() {
        // Query zusammensetzen
        $query = "SELECT customerNumber, customerName, contactLastName, contactFirstName, country
        FROM customers
        ORDER BY customerName
        LIMIT $this->offset, $this->numHits";
        $result = $this->dbh->query($query);

        $code = "";
        $code .= "<table class=\"db_table\" style=\"margin: 0 auto;\">";
        $code .= "<tr>";
        $code .= "<th>customerNumber</th>";
        $code .= "<th>customerName</th>";
        $code .= "<th>contactLastName</th>";
        $code .= "<th>contactFirstName</th>";
        $code .= "<th>country</th>";
        $code .= "</tr>";
  
        foreach($result as $row) {
            $code .= "<tr>";
            $code .= "<td>" . $row['customerNumber'] . "</td>";
            $code .= "<td>" . $row['customerName'] . "</td>";
            $code .= "<td>" . $row['contactLastName'] . "</td>";
            $code .= "<td>" . $row['contactFirstName'] . "</td>";
            $code .= "<td>" . $row['country'] . "</td>";
            $code .= "</tr>";
        }
        $code .= "</table>";

        return $code;
    }

    // Feedback zusammenbauen in der Testphase
    // Die berechneten Werte werden zur Kontrolle angezeigt
    function makeFeedbackforTesting() {
        $code = "";
        
        $code .= "<p><strong>Die Basis für die Algorithmen:</strong><br>";
        $code .= "Ergebnis einer Query: die Anzahl <strong>aller</strong>  Datensätze beträgt: $this->total<br>";
        $code .= "Die Anzahl der Datensätze, die <strong>pro Seite</strong> angezeigt werden soll: $this->numHits<br>";
        $code .= "Die daraus berechnete Anzahl <strong>aller Seiten</strong> beträgt: $this->numPages<br>";
        $code .= "Die <strong>aktuelle Seite</strong> ist: $this->currentPage<br>";
        $code .= "Wurde der Wert für die aktuelle Seite durch den GET-Param bestimmt: $this->isCurrentPageValueFromGETParam<br>";
        $code .= "Der Start-Datensatz zum Anzeigen, der sog. <strong>&quot;offset&quot;</strong> ist: $this->offset<br>";
        $code .= "Ab dieser Grenze wird die volle Pagination (3. Variante) angezeigt: $this->showFullPagination</p>";
        
        return $code;
    }

    // 1. Pagination-Variante (für Spartaner)
    function makePagination1() {
        $code = "";
        
        // Pfeil für "Zurück", wird auf der ersten Seite ausgeblendet
        if ($this->currentPage != 1) {
	        $code .= "<a style=\"text-decoration: none;\" href=\"pagination.php?page=".($this->currentPage - 1)."\">&lt;</a>";
        }
        $code .= "&nbsp;&nbsp;".$this->currentPage."/".$this->numPages."&nbsp;&nbsp;";
        // Pfeil für "Vorwärts", wird auf der letzten Seite ausgeblendet
        if ($this->currentPage < $this->numPages) {
	        $code .= "<a style=\"text-decoration: none;\" href=\"pagination.php?page=".($this->currentPage + 1)."\">&gt;</a>";
        }
        
        return $code;
    }

	// 2. Pagination-Variante für Kontrollfreaks 
    function makePagination2() {
        $code = "";
        
		for ($i = 1; $i<=$this->numPages; $i++) {
			$code .= "<a href=\"pagination.php?page=".$i."\"";
			// Markiere im Link, welches die aktive Seite ist
			if ($i == $this->currentPage) {
				$code .= " style=\"color: red; text-decoration: none; font-weight: bold;\"";
			}
			$code .= ">".$i."</a>&nbsp;&nbsp;";
		}
		
		return $code;
    }

	// 3. Pagination-Variante für Nerds
    function makePagination3() {
        $code = "";
        
		$code .= "<ul class=\"pagination\">\n";
		if ($this->numPages > $this->showFullPagination) {
			// Zeige "grosse" Variante
			// Variable für den Code für die "Zwischenräume"
			$dots = "<li class=\"dots\">...</li>\n";

			// "Prev" Button, wird dann angezeigt, wenn man NICHT auf der ersten Seite ist
			if ($this->currentPage > 1) {
				$code .= "<li class=\"prev\"><a href=\"pagination.php?page=".($this->currentPage - 1)."\">Prev</a></li>\n";
			}

			// Der erste Zahl-Button wird IMMER angezeigt
			$code .= "<li class=\"start";
			if ($this->currentPage == 1) {
				$code .= " currentpage";
			}
			$code .= "\"><a href=\"pagination.php?page=1\">1</a></li>\n";

			// Zeige dots links vom Feld
			if ($this->currentPage >= 5) {
				$code .= $dots;
			}

			// Zeige "Feld" mit den Buttons, zwei Zahlen links und zwei rechts von der aktuellen Seite
			$startFieldNr = $this->currentPage - 2;
			$endFieldNr = $this->currentPage + 2;
			for ($i=$startFieldNr; $i<=$endFieldNr; $i++) {
				if ($i > 1 && $i < $this->numPages) {
					$code .= "<li";
					if ($i == $this->currentPage) {
						$code .= " class=\"currentpage\"";
					}
					$code .= "><a href=\"pagination.php?page=".$i."\">".$i."</a></li>\n";
				}
			}

			// Zeige dots rechts vom Feld
			if ($this->currentPage < ($this->numPages - 3)) {
				$code .= $dots;
			}

			// Der letzte Zahl-Button wird IMMER angezeigt
			$code .= "<li class=\"end";
			if ($this->currentPage == $this->numPages) {
				$code .= " currentpage";
			}
			$code .= "\"><a href=\"pagination.php?page=".$this->numPages."\">".$this->numPages."</a></li>\n";

			// "Next" Button, wird dann angezeigt, wenn man NICHT auf der letzten Seite ist
			if ($this->currentPage < $this->numPages) {
				$code .= "<li class=\"next\"><a href=\"pagination.php?page=".($this->currentPage + 1)."\">Next</a></li>\n";
			}
		}
		else {
			// Zeige "kleine" Variante
			for ($i = 1; $i<=$this->numPages; $i++) {
				$code .= "<li";
				if ($i == $this->currentPage) {
					$code .= " class=\"currentpage\"";
				}
				$code .= "><a href=\"pagination.php?page=".$i."\">".$i."</a></li>\n";
			}
		}
		$code .= "</ul>\n";
		
		return $code;
	}
}