<?php
require '../private/header.php';
require '../private/database.php';
?>
<main>
<div class="container">
<h1>
    Prossimi eventi
</h1>

<?php
$db = new \Database\Db();
$events = $db->event_fetch_future();
foreach ($events as $value) {
    $value->render_as_card();
}
if (count($events) == 0) {
    echo '<p>';
    echo 'Nessun evento organizzato nei prossimi giorni. </p><p>Vuoi passare a trovarci o hai un\'idea da proporci? <br> Contattaci a <a href="mailto:info@fablabimperia.org" >info@fablabimperia.org</a> per informazioni sugli orari di apertura.<br> Ti aspettiamo!';
    echo '</p>';
}
?>

<hr>
<div style="opacity:30%">
<h1>Eventi passati</h1>
<?php
$events = $db->event_fetch_past();
foreach ($events as $value) {
    $value->render_as_card();
}
?>
</div>


</div>
</main>

<?php
require '../private/footer.php';
?>