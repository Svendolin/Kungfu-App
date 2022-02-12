<?php
// Auch hier muss zuerst mit session_start() angefangen werden, auch wenn das leicht crazy tönt
session_start();

/* Script von: https://www.php.net/manual/de/function.session-destroy.php */

// Löschen aller Session-Variablen (das Array wird durch einen leeren Zustand überschrieben)
$_SESSION = array();

// Lösche auch das dazugehörige Session-Cookie (Session ist immer zum Browser eines Users gekoppelt, dadurch auch dessen gestreuten Cookies)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"],
        $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Zum Schluss: Löschen der Session
session_destroy();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Session zerstören</title>
</head>
<body>
<h2>Session zerstören</h2>
<p>Diese Seite soll ein Logout andeuten. Die Session wurde <strong>zertört</strong>.<p>
<p>Der direkte Aufruf einer Seite im angedeuteten geschützten Bereich ist nun nicht mehr möglich ...</p>
</body>
</html>
