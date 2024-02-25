<?php
require "../private/event_management.php";
require "../private/database.php";

$db = new Database();
$cur_event = $db->event_fetch_one(intval($_GET["id"]));
if (!isset($cur_event))
{
    header('Location: /admin/eventi.php');
}
?>


<?php require "../private/header.php"; ?>

<main>
<div class="container">

<?php require "./_admin_back_button.php"; ?>

<h1>Modifica evento</h1> 


<form method="post" action="/admin/evento_edit_do.php" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $cur_event->id; ?>">    
    <div>
        <label for="title">Titolo</label>
        <input required type="text" name="title" id="title" value="<?php echo $cur_event->title; ?>" >
    </div>

    <div>
        <label for="description">Descrizione</label>
        <input required type="text" name="description" id="description" value="<?php echo $cur_event->description; ?>">
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
        <input required type="text" name="where_address" id="where_address" value="<?php echo $cur_event->where_address; ?>">
    </div>

    <div>
        <label for="where_map_url">Link alla mappa</label>
        <input type="text" name="where_map_url" id="where_map_url" value="<?php echo $cur_event->where_map_url; ?>">
    </div>

    <div>
        <label for="published">Hai avvisato Donatella?</label>
        <input type="checkbox" name="published" id="published" <?php if ($cur_event->published){echo "checked";} ?>>
    </div>

    <div>
        <label for="full_text">Programma dell'evento</label>
        <textarea rows=10 cols=50 name="full_text" id="full_text"><?php echo $cur_event->full_text; ?></textarea>
    </div>

    <div>
        <button class="btn btn-primary" type="submit">Salva</button>
    </div>
</form>

<div style="margin-top:5rem;">
    <a class="btn" href="/admin/evento_delete.php?id=<?php echo $cur_event->id; ?>">
    Elimina <i href="" class="fa fa-remove"></i>
    </a>
</div>

</div>
</main>
<?php
require "../private/footer.php";
?>