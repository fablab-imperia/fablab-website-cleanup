<?php
require "../private/header.php";
require "../private/database.php";
?>

<main>

<h1>
    Prossimi eventi
</h1>

<?php
$db = new \Database\Db();
$events = $db->event_fetch_future();
foreach ($events as $value)
{
    printf("
    <div class=\"card card-opaque\">
        <h1>%s</h1>
        <header>
            <ul>
                <li> <span class=\"bold\">🗓️ Quando:</span> %s</li>
                <li> <span class=\"bold\"> 🔄 Poi si ripete:</span> ogni secondo sabato del mese. SOLO per questo mese, anticipato al primo</li>
                <li> <span class=\"bold\"> 📍 Dove:</span> %s</li>
            </ul>
        </header>
        <button class=\"btn btn-primary\">
        Scopri il programma
        </button>
    </div>
    ",
    $value->title,
    date("j/n/Y, H:i", $value->event_timestamp),
    $value->where_address
    );
}
if (count($events)==0)
{
    echo "Nessun evento futuro";
}
?>



</main>

<?php
require "../private/footer.php";
?>