<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMDB</title>
  </head>
  <body>
  <p><img src="logo.svg" width="208" height="150"></p>
	<h1>Erste Schritte</h1>
	
	<ul>
		<li><a href="https://code-boxx.com/receive-json-data-php-curl/" target="_blank">Einfaches CURL-Beispiel mit PHP</a></li>
		<li><a href="https://www.themoviedb.org/signup" target="_blank">TMDB Account erstellen</a></li>
		<li><a href="https://developers.themoviedb.org/3/getting-started/introduction" target="_blank">Handbuch TMDB API Developer</a></li>
	</ul>
	
	<h2>Script Beispiele</h2>
	
	<ul>
		<li><a href="suchen.php">Suche nach Film</a></li>
		<li><a href="start.php">Start</a></li>
	</ul>
	
	<h2>Beispiele Requests</h2>
	<p>https://api.themoviedb.org/3/movie/550?api_key=1234&language=en-US<br>
	https://api.themoviedb.org/3/search/movie?api_key=1234&language=en-US&page=1&include_adult=false&year=2022<br>
	https://api.themoviedb.org/3/genre/movie/list?api_key=1234&language=de<br>
	https://api.themoviedb.org/3/search/movie?api_key=1234&language=de&query=Jack+Reacher</p>
  </body>
</html>