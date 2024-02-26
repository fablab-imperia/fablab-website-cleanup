<?php
require "../private/header.php";
require "../private/database.php";

require_once "../private/Parsedown.php";

$db = new Database();
$event = $db->event_fetch_one($_GET["id"]);
?>
<main>
<div class="container">

<h1>
	<?php echo $event->title;?>
</h1>

<header>
	<?php echo $event->render_metadata(); ?>
</header>

<article>
	<?php $p = new Parsedown(); echo $p->text($event->full_text); ?>
</article>

</div>
</main>
<?php
require "../private/footer.php";
?>