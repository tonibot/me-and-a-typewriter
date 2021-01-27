<?php
	include_once './lib/parsedown.inc.php';
	include_once './lib/main.inc.php';
	common_header();
	
	if(isset($_GET['site'])) {
		if($_GET['site'] == "privacy") {
			$files = glob('./md/privacy.{md}', GLOB_BRACE);
		}

		if($_GET['site'] == "impress") {
			$files = glob('./md/impress.{md}', GLOB_BRACE);
		}

		if($_GET['site'] == "about") {
			$files = glob('./md/about.{md}', GLOB_BRACE);
		}
		
	} else {
		$files = array_diff(glob('./md/*.{md}', GLOB_BRACE), array('./md/privacy.md','./md/impress.md','./md/about.md'));
	}


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
