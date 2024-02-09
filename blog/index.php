<?php
require "../private/header.php";
require "../private/database.php";
?>

<main class="container">

<h1>
    Blog dei <em>maker</em>
</h1>
<p>
    A
</p>

<?php
$db = new \Database\Db();
$events = $db->event_fetch_future();
foreach ($events as $value)
{
    printf("
    <article class=\"card card-opaque\">
        <h1>%s</h1>
        <header>
            <ul>
                <li> <span class=\"bold\">🗓️ Quando:</span> %s</li>
                <li> <span class=\"bold\"> 🔄 Poi si ripete:</span> ogni secondo sabato del mese. SOLO per questo mese, anticipato al primo</li>
                <li> <span class=\"bold\"> 📍 Dove:</span> %s</li>
            </ul>
        </header>
        <a href=\"%s\" class=\"btn btn-primary\">
        Scopri il programma
        </a>
    </article>
    ",
    $value->title,
    date("j/n/Y, H:i", $value->event_timestamp),
    $value->where_address,
    "/eventi/details.php?id=" . $value->id
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