<?php
$TITLE = "Scopri i prossimi eventi";
require '../private/header.php';
require '../private/database.php';
?>
<main>
<div class="container">
<h1>
	Prossimi eventi
</h1>

<?php
$counter_eventi = 0;
$db = new Database();
$events = $db->event_fetch_future();
foreach ($events as $value)
{
	if ($value->published)
	{
		$counter_eventi++;
		$value->render_as_card($counter_eventi > 3);
	}
}
if ($counter_eventi == 0) {
	echo '<p>';
	echo 'Nessun evento organizzato nei prossimi giorni. </p><p>Vuoi passare a trovarci o hai un\'idea da proporci? <br> Contattaci a <a href="mailto:info@fablabimperia.org" >info@fablabimperia.org</a> per informazioni sugli orari di apertura.<br> Ti aspettiamo!';
	echo '</p>';
}
?>

<hr>
<div style="opacity:80%">
<h1>Eventi passati</h1>
<?php
$events = $db->event_fetch_past();
foreach ($events as $value)
{
	$counter_eventi++;
	$value->render_as_card($counter_eventi > 3);
}
?>
</div>


</div>
</main>

<?php
require '../private/footer.php';
?>