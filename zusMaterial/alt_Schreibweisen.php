<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Alternative Syntax</title>
</head>
	<h1>PHP: Alternative Syntax für Schleifen und Bedingungen</h1>
	<p>Das geht für <strong>if</strong>, <strong>while</strong>, <strong>for</strong>, <strong>foreach</strong> und <strong>switch</strong></p>
	<hr>
	<h2>if-Bedingung</h2>
	<?php
	// Ein "normaler" PHP Block
	$zahl1 = 5;
	?>
	
	<?php if ($zahl1 == 5): ?>
		<p>Ich bin HTML ganz ohne PHP :-)</p>
		<p>Die Zahl ist übrigens 5</p>
	<?php endif; ?>
	
	<hr>
	
	<h2>if/else</h2>
	<?php
	// Ein "normaler" PHP Block
	$zahl2 = 6;
	?>
	<?php if ($zahl2 == 6): ?>
		<p>Die Zahl  ist 6</p>
	<?php else:?>
		<p>Die Zahl ist nicht 6</p>
	<?php endif; ?>
	
	<hr>
	
	<h2>Quadratzahlen in eine Tabelle ausgeben mit einer for-Schleife</h2>
	<table>
		<tr>
			<th>Zahl</th>
			<th>Quadratzahl</th>
		</tr>
		<?php for ($x=0; $x <= 10; $x++): ?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $x*$x; ?></td>
			</tr>
		<?php endfor; ?>
	</tbody>
	</table>
	
	<hr>
	
	<h2>Es geht noch kürzer</h2>
	<table>
		<tr>
			<th>Zahl</th>
			<th>Quadratzahl</th>
		</tr>
		<?php for ($x=0; $x <= 10; $x++): ?>
			<tr>
				<td><?=$x?></td>
				<td><?=$x*$x?></td>
			</tr>
		<?php endfor; ?>
	</tbody>
	</table>
</body>
</html>
