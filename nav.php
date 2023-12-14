<?php
	include("./lib/languages.inc.php");
	include("./lib/config.inc");

	$pages = ["","?site=privacy.md","?site=impress.md","?site=about.md","?site=tags","?site=rss"];

	for($n=0; $n<6; $n++) {
		if($cfgNav[$n] == true) {
				print '<a href="./index.php'. $pages[$n] .'">'. $language[$cfgLang][$n+6] . '</a>';
		}
	}
?>
