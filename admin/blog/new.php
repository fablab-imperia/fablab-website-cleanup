<?php
require __DIR__ . "/../../private/blog_management.php";
require __DIR__ . "/../../private/database.php";
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $obj = $_POST;
    $obj["creation_timestamp"] = strtotime($obj["date"] . " " . $obj["time"]);
    $e = new Blog($obj);
    $db = new Database();
    $db->blog_save($e);
    require __DIR__ . "/../../private/feed_generation.php";
    header('Location: /admin/blog.php');
}
?>

<?php
require "../../private/header.php";
?>

<main>
<div class="container">

<p>
    <a href="./"> <i class="fa fa-arrow-left"></i> Torna a pagina Blog</a>
</p>

<h1>Aggiungi post nel Blog</h1> 


<form method="post">
    <input type="hidden" name="id" value="-1">    
    <div>
        <label for="title">Titolo</label>
        <input required type="text" name="title" id="title" maxlength="50">
    </div>

    <div>
        <label for="description">Descrizione</label>
        <input required type="text" name="description" id="description"  maxlength="150">
    </div>

    <div>
        <label for="date">Data e ora</label>
        <input required type="date" name="date" id="date">
        <input required type="time" name="time" id="time">
    </div>

    <div>
        <label for="full_text">Testo del post</label>
        <textarea rows=10 cols=50 name="full_text" id="full_text"></textarea>
    </div>

    <div>
        <button class="btn btn-primary" type="submit">Crea</button>
    </div>

</form>

<!-- Load simplemde -->
<script src="/assets/simplemde/dist/simplemde.min.js"></script>
<link rel="stylesheet" href="/assets/simplemde/dist/simplemde.min.css">
<script src="/assets/load_simplemde.js"></script>

</div>
</main>
<?php
require "../../private/footer.php";
?>