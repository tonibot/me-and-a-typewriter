<?php
if(isset($_REQUEST['site'])) {
	if($_REQUEST['site'] == "tags") {
		header('location: ./tags.php');
	}
	if($_REQUEST['site'] == "rss") {
		header('location: ./rss.php');
	}

}
function common_header(){
include ("./lib/config.inc");
include ("./lib/languages.inc.php");
print'
<!DOCTYPE html>
<html lang="'. $cfgLang .'">
	<head>
		<title>'. $cfgTitle .'</title>
			<meta charset="utf-8">
			<meta name="content-language" content="'. $language[$cfgLang][2] .'" />
			<meta name="language" content="'. $language[$cfgLang][3] .'" />
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