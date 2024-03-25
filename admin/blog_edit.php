<?php
require __DIR__ . "/../private/event_management.php";
require __DIR__ . "/../private/database.php";

$db = new Database();
$cur_event = $db->event_fetch_one(intval($_GET["id"]));
if (!isset($cur_event))
{
    header('Location: /admin/blog.php');
}
?>


<?php require "../private/header.php"; ?>

<main>
<div class="container">

<?php require "./_admin_back_button.php"; ?>

<h1>Modifica post</h1> 

<p>
    Anteprima evento <a class="btn" href="/admin/blog_upload_preview_img.php?id=<?php echo $cur_event->id?>" target="_blank" rel="noopener noreferrer">Carica <i class="fa fa-file-picture-o"></i></a>
</p>

<hr>


<form method="post" action="/admin/blog_edit_do.php" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $cur_event->id; ?>">    
    <div>
        <label for="title">Titolo</label>
        <input required maxlength="50" type="text" name="title" id="title" value="<?php echo htmlentities($cur_event->title); ?>" >
    </div>

    <div>
        <label for="description">Descrizione</label>
        <input
            required maxlength="150"
            type="text"
            name="description"
            id="description"
            value="<?php echo htmlentities($cur_event->description); ?>">
    </div>

    <div>
        <label for="date">Data e ora</label>
        <input required type="date" name="date" id="date" value="<?php echo date("Y-m-d", $cur_event->event_timestamp) ?>">
    </div>

    <div>
        <label for="published">Pubblicato?</label>
        <input type="checkbox" name="published" id="published" <?php if ($cur_event->published){echo "checked";} ?>>
    </div>

    <div>
        <label for="full_text">Testo del post</label>
        <textarea rows=10 cols=50 name="full_text" id="full_text"><?php echo htmlentities($cur_event->full_text); ?></textarea>
    </div>

    <div>
        <button class="btn btn-primary" type="submit">Salva</button>
    </div>
</form>

<div style="margin-top:5rem;">
    <a class="btn" href="/admin/blog_delete.php?id=<?php echo $cur_event->id; ?>">
    Elimina <i href="" class="fa fa-remove"></i>
    </a>
</div>

<!-- Load simplemde -->
<script src="/assets/simplemde/dist/simplemde.min.js"></script>
<link rel="stylesheet" href="/assets/simplemde/dist/simplemde.min.css">
<script src="/assets/load_simplemde.js"></script>

</div>
</main>
<?php
require "../private/footer.php";
?>