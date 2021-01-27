<?php
	include_once './lib/parsedown.inc.php';
	include_once './lib/main.inc.php';
	common_header();
	$files = glob('./md/*.{md}', GLOB_BRACE);

	arsort($files);
	foreach($files as $file) {
		$year = substr($file,5,4);
		$month  = substr($file,9,2);
		$day  = substr($file,11,2);
		$hour  = substr($file,13,2);
		$min  = substr($file,15,2);
		$anchor = substr($file,5,12);

		print"<a id=\"$anchor\"></a>";
		print'<article class="contentBlock">';
		$contents = file_get_contents($file);
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode(true);
		echo $Parsedown->text($contents);
			print"<p>code: <a href=\"https://www.robotisch.de/blog.php#$anchor\" id=\"node\">$anchor</a></p>";
		print'</article>';
	}			
?>
