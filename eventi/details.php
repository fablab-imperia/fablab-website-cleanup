<?php
require "../private/header.php";
require "../private/database.php";

$db = new \Database\Db();
$event = $db->event_fetch_one($_GET["id"]);
?>

<main>

<h1>
    <?php echo $event->title;?>
</h1>

<header>
    <ul>
        <li>
            <span class="bold">
            🗓️ Quando:
            </span>
            <?php echo $event->get_datetime(); ?>
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

</main>

<?php
require "../private/footer.php";
?>