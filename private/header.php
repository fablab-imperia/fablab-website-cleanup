
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $TITLE; ?></title>
	<script defer src="/assets/scroll_into_main.js"></script>
	<script defer src="/assets/load_google_maps.js"></script>
	<link rel="sitemap" href="sitemap.xml" />
	<link rel="alternate" type="application/rss+xml" title="Eventi Fablab Imperia" href="/rss.xml" />
	<link rel="stylesheet" href="/assets/bootstrap-grid.min.css">
	<link rel="stylesheet" href="/assets/font_load.css">
	<link rel="stylesheet" href="/assets/fabstyle.min.css">
	<link rel="stylesheet" href="/assets/navbar.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
</head>


<header class="container">
		<nav>
			<a href="/">
				<div class="navbar-title">
					<img src="/assets/fab_icon.svg" alt="Icona rete fablab">
					<span class="bold">FAB</span>LAB&nbsp;<span class="bold">IMPERIA</span>
				</div>
			</a>
			<input type="checkbox" id="nav_toggle_checkbox" autocomplete="off">
			<div class="navbar-menu">
				<!-- <a href="/">Home</a> -->
				<a href="/eventi/">Eventi</a>
				<a href="/blog/">Blog</a>
				<a href="https://wiki.fablabimperia.org/">Wiki</a>

			</div>
			<label for="nav_toggle_checkbox">
				<img src="/assets/images/hamburger.svg" id="hamburger-menu-icon" alt="">
			</label>
		</nav>
</header>

<div class="bootstrap-wrapper">