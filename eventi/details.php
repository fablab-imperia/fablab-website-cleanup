<?php
require "../private/header.php";
require "../private/database.php";

require_once "../private/Parsedown.php";

$db = new \Database\Db();
$event = $db->event_fetch_one($_GET["id"]);
?>

<main class="container">

<h1>
    <?php echo $event->title;?>
</h1>

<header>
    <ul>
        <li>
            <span class="bold">
            🗓️ Quando:
            </span>
            <?php echo date(
                "j/n/Y H:i",
                $event->event_timestamp
            ); ?>
        </li>
        <li>
            <span class="bold">
            🔄 Poi si ripete:
            </span>
            <?php echo $event->repeats; ?>
        </li>
        <li>
            <span class="bold">
                📍 Dove:
            </span>
            <?php echo $event->where_address; ?>
        </li>
    </ul>
</header>

<article>
    <?php $p = new Parsedown(); echo $p->text($event->description); ?>
</article>

</main>

<?php
require "../private/footer.php";
?>