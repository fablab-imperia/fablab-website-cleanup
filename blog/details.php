<?php
require __DIR__  . "/../private/database.php";
require_once __DIR__  . "/../private/Parsedown.php";

$db = new Database();
$blog = $db->blog_fetch_one($_GET["id"]);

$TITLE = $blog->title;
$DESCRIPTION = $blog->description;

require "../private/header.php";
?>
<main>
<div class="container">

<h1>
	<?php echo $blog->title;?>
</h1>

<header>
	<?php echo $blog->description; ?>
</header>

<?php require_once __DIR__ . "/../private/share_button.php"; ?>

<article>
	<?php $p = new Parsedown(); echo $p->text($blog->full_text); ?>
</article>

</div>
</main>
<?php
require __DIR__  . "/../private/footer.php";
?>