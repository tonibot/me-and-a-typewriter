<?php
	
function common_header(){
include 'lib/config.inc.php';
print'
<!DOCTYPE html>
<html lang="'. $cfgLang .'">
	<head>
		<title>'. $cfgTitle .'</title>
			<meta charset="utf-8">
			<meta name="content-language" content="'. $cfgLang .'" />
			<meta name="language" content="'. $cfgLangExt .'" />
			<meta name="keywords" content="" />
			<meta name="robots" content="INDEX,FOLLOW" />
			<meta name="format-detection" content="telephone=yes">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="apple-touch-icon" href="./img/site/icon.png"/>
			<link rel="favicon" href="./img/site/icon.png"/>
			<link rel="stylesheet" href="./lib/css/base.css"/>
			<link rel="stylesheet" href="./lib/css/'. $cfgTheme .'"/>
	</head>
	<body>
		<header>
			<div class="headline">'. $cfgTitle .'</div>
		</header>
		<nav>';
		include_once './nav.php';
		
echo'	
		</nav>
		<main>';
}

function common_footer() {
	print'
		</main>
		<footer>
		</footer>
	</body>
</html>';
}