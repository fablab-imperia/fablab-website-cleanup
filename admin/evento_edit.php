<?php
require "../private/header.php";
?>
<main>
<div class="container">

<?php require "./_admin_back_button.php"; ?>

<h1>Aggiungi evento</h1> 

<?php var_dump($_POST); ?>

<form method="post">
    <?php
    if ($_GET["id"]=="-1")
    {
        echo "<input type=\"hidden\" name=\"id\" value=\"-1\">";
    }
    else
    {
        echo "<input type=\"number\" name=\"id\" value=\"-1\">";
    }
    ?>
    
    <div>
        <label for="title">Titolo</label>
        <input required type="text" name="title" id="title">
    </div>

    <div>
        <label for="description">Descrizione</label>
        <input required type="text" name="description" id="description">
    </div>

    <div>
        <label for="date">Data e ora</label>
        <input required type="date" name="date" id="date">
        <input required type="time" name="time" id="time">
    </div>

    <div>
        <label for="where_address">Luogo</label>
        <input required type="text" name="where_address" id="where_address">
    </div>

    <div>
        <label for="where_map_url">Link alla mappa</label>
        <input type="text" name="where_map_url" id="where_map_url">
    </div>

    <div>
        <label for="full_text">Programma dell'evento</label>
        <textarea rows=10 cols=50 name="full_text" id="full_text"></textarea>
    </div>

    <div>
        <button type="submit">Crea</button>
    </div>

</form>

</div>
</main>
<?php
require "../private/footer.php";
?>