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

<div class="hero-container" style="background-image: url('/assets/images/compressed/1000_circuiti.jpg');">
    <div class="container">
        <div class="hero">
            <small class="text-highlight">
                LABORATORIO DIGITALE CONDIVISO
            </small>
            <h1>Hai trovato l'articolo interessante?</h1>
            <p>
            Stampanti 3D, Fresatrice CNC, banco elettronica,
            componenti e attrezzi meccanici e
            tutto l'occorrente per creare (quasi) qualsiasi cosa&#8230; <span class="text-highlight" style="">insieme</span>
            </p>

            <div class="hero-buttons">
                <a href="/eventi/" class="btn btn-primary" style="border-color:white;"> <i class="fa fa-user-plus"></i> Partecipa al Fablab!</a>
                <a type="button" href="/#main_content" class="btn">Scopri di più</a>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__  . "/../private/footer.php";
?>