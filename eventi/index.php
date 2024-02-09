<?php
require "../private/header.php";
require "../private/database.php";
?>

<main class="container">

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
                <li> <span class=\"bold\"><i class=\"fa fa-fw fa-calendar\"></i> Quando:</span> %s</li>
                <li> <span class=\"bold\"> <i class=\"fa fa-fw fa-repeat\"></i> Poi si ripete:</span> %s</li>
                <li> <span class=\"bold\"> <i class=\"fa fa-fw fa-map-marker\"></i> Dove:</span> %s</li>
            </ul>
        </header>
        <a href=\"%s\" class=\"btn btn-primary\">
        Scopri il programma
        </a>
    </div>
    ",
    $value->title,
    date("j/n/Y, H:i", $value->event_timestamp),
    $value->repeats,
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