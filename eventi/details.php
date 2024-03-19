<?php
require __DIR__  . "/../private/database.php";
require_once __DIR__  . "/../private/Parsedown.php";

$db = new Database();
$event = $db->event_fetch_one($_GET["id"]);

$TITLE = "Programma dell'evento \"" . $event->title . "\"";
$DESCRIPTION = $event->description;

require "../private/header.php";
?>
<main>
<div class="container">

<h1>
	<?php echo $event->title;?>
</h1>

<header>
	<?php echo $event->render_metadata(); ?>
</header>

<?php require_once __DIR__ . "/../private/share_button.php"; ?>

<article>
	<?php $p = new Parsedown(); echo $p->text($event->full_text); ?>
</article>

</div>
</main>
<?php
require __DIR__  . "/../private/footer.php";
?>