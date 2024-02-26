<?php
require_once __DIR__  . "/database.php";

const BASE_URL ="https://www.fablabimperia.org";

function feed_generation()
{
	$db = new Database();


	$events = array_merge(
		array_reverse(
			$db->event_fetch_future()
		),
		$db->event_fetch_past()
	);


	// RSS
	$rss = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<rss version=\"2.0\">
<channel>
<title>Fablab Imperia</title>
<link>" . BASE_URL . "</link>
<description>Storico eventi Fablab Imperia, rimani aggiornato sulle nostre attività</description>
";

	$rss .= implode(
		"",
		array_map(function ($e){
			$st = "  <item>\n";
			$st .= "    <title>" . $e->title . "</title>\n";
			$st .= "    <link>" . BASE_URL . $e->generate_url() . "</link>\n";
			$st .= "    <description>" . $e->description . "</description>\n";
			$st .= "  </item>\n";
			return $st;
		},$events)
	);

	$rss .= "</channel>
</rss>";
	
	file_put_contents(
		__DIR__ . "/../rss.xml",
		$rss
	);


	// SITEMAP
	$sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
	$sitemap .= "  <url>\n    <loc>".BASE_URL."/eventi/</loc>\n  </url>\n";
	$sitemap .= "  <url>\n    <loc>".BASE_URL."/blog/</loc>\n  </url>\n";
	$sitemap .= "  <url>\n    <loc>".BASE_URL."</loc>\n  </url>\n";
	$sitemap .= implode(
		"",
		array_map(function ($e){
			$st = "  <url>\n";
			$st .= "    <loc>" . BASE_URL . $e->generate_url() . "</loc>\n";
			$st .= "  </url>\n";
			return $st;
		},$events)
	);
	$sitemap .= "</urlset>";
	file_put_contents(
		__DIR__ . "/../sitemap.xml",
		$sitemap
	);
}

echo feed_generation();
?>