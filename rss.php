<?php
	include_once 'lib/config.inc.php';
	include_once './lib/parsedown.inc.php';
	$files = glob('./md/*.{md}', GLOB_BRACE);

	arsort($files);

	header( "Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8'?>
	<rss version='2.0'>
	<channel>
	<title>$cfgTitle | RSS</title>
	<link>$cfgURL</link>
	<description>Cloud RSS</description>
	<language>$cfgLangCode</language>";
	
	foreach($files as $file) {
		$year = substr($file,5,4);
		$month  = substr($file,9,2);
		$day  = substr($file,11,2);
		$hour  = substr($file,13,2);
		$min  = substr($file,15,2);
		$anchor = substr($file,5,12);

		$contents = file_get_contents($file);
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode(true);
		$md = $Parsedown->text($contents);
		$headline = substr($md, strpos($md,'<h1>')+4, strpos($md,'</h1>')-4);
		$puller = strip_tags(substr($md, strpos($md,'<p>')+3, 300));
		echo "<item>";
		echo "<title>$headline</title>";
		echo "<link>$cfgURL/index.php#$anchor</link>";
		echo "<description>$puller [...] </description>";
		echo "</item>";
	}
?>	
