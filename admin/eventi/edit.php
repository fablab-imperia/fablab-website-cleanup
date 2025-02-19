<?php
require __DIR__ . "/../../private/event_management.php";
require __DIR__ . "/../../private/database.php";

$db = new Database();
$cur_event = $db->event_fetch_one(intval($_GET["id"]));
if (!isset($cur_event))
{
    header('Location: /admin/eventi/');
}
?>


<?php require "../../private/header.php"; ?>

<main>
<div class="container">

<p>
    <a href="./"> <i class="fa fa-arrow-left"></i> Torna a pagina Eventi</a>
</p>

<h1>Modifica evento</h1> 

<p>
    Anteprima evento <a class="btn" href="/admin/eventi/upload_preview_img.php?id=<?php echo $cur_event->id?>" target="_blank" rel="noopener noreferrer">Carica <i class="fa fa-file-picture-o"></i></a>
</p>

<hr>


<form method="post" action="/admin/eventi/edit_do.php" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $cur_event->id; ?>">    
    <div>
        <label for="title">Titolo</label>
        <input required maxlength="50" type="text" name="title" id="title" value="<?php echo htmlentities($cur_event->title); ?>" >
    </div>

    <div>
        <label for="description">Descrizione</label>
        <input required maxlength="150" type="text" name="description" id="description" value="<?php echo htmlentities($cur_event->description); ?>">
    </div>

    <div>
        <label for="date">Data e ora</label>
        <input required type="date" name="date" id="date" value="<?php echo date("Y-m-d", $cur_event->event_timestamp) ?>">
        <input required type="time" name="time" id="time" value="<?php echo date("H:i", $cur_event->event_timestamp) ?>">
    </div>

    <div>
        <label for="repeats">Si ripete ogni:</label>
        <input type="text" name="repeats" id="repeats" value="<?php echo $cur_event->repeats; ?>">
    </div>

    <div>
        <label for="where_address">Luogo</label>
        <input required type="text" name="where_address" id="where_address" value="<?php echo htmlentities($cur_event->where_address); ?>">
    </div>

    <div>
        <label for="where_map_url">Link alla mappa</label>
        <input type="text" name="where_map_url" id="where_map_url" value="<?php echo htmlentities($cur_event->where_map_url); ?>">
    </div>

    <div>
        <label for="published">Hai prenotato la sala avvisando Donatella?</label>
        <input type="checkbox" name="published" id="published" <?php if ($cur_event->published){echo "checked";} ?>>
    </div>

    <div>
        <label for="open_day">È un open day aperto a non-soci?</label>
        <input type="checkbox" name="open_day" id="open_day" <?php if ($cur_event->open_day){echo "checked";} ?>>
    </div>

    <div>
        <label for="full_text">Programma dell'evento</label>
        <textarea rows=10 cols=50 name="full_text" id="full_text"><?php echo htmlentities($cur_event->full_text); ?></textarea>
    </div>

    <div>
        <button class="btn btn-primary" type="submit">Salva</button>
    </div>
</form>

<div style="margin-top:5rem;">
    <a class="btn" href="/admin/eventi/delete.php?id=<?php echo $cur_event->id; ?>">
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
require "../../private/footer.php";
?>