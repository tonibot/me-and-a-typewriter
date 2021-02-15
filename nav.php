<?php
	include_once './lib/parsedown.inc.php';
	$files = glob('./md/*.{md}', GLOB_BRACE);

	echo'<a href="./index.php">'. $cfgNAV[0]. '</a>';
	
	if(in_array("./md/privacy.md", $files))
		echo'<a href="./index.php?site=privacy.md">'. $cfgNAV[1]. '</a>';
				
	if(in_array("./md/impress.md", $files))
		echo'<a href="./index.php?site=impress.md">'. $cfgNAV[2]. '</a>';
				
	if(in_array("./md/about.md", $files))
		echo'<a href="./index.php?site=about.md">'. $cfgNAV[3]. '</a>';

	echo'<a href="./tags.php">tags</a>';

	echo'<a href="./rss.php">RSS</a>';

?>
