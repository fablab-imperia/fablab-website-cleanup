<?php
require __DIR__ . "/../private/event_management.php";
require __DIR__ . "/../private/database.php";
?>

<?php
$db = new Database();
$cur_event = $db->event_fetch_one(intval($_GET["id"]));
if (!isset($cur_event))
{
    header('Location: /admin/eventi.php');
}

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
)
{
    if (isset($_FILES["img"]) && isset($_POST["id"]) && intval($_POST["id"]))
    {
        $original = imagecreatefromjpeg($_FILES["img"]["tmp_name"]);
        if ($original === false){echo "ERRORE SERVER";die;}
        $resized_low = imagescale($original, 400);
        $resized_big = imagescale($original, 1000);
        imagejpeg($resized_low,  $cur_event->gen_image_path_low());
        imagejpeg($resized_big,  $cur_event->gen_image_path());
        header('Location: /admin/eventi.php');
    }
    else
    {
        echo "ERRORE SERVER";
        die;
    }
}
?>

<?php
require "../private/header.php";
?>

<main>
<div class="container">

<?php require "./_admin_back_button.php"; ?>

<h1>Carica immagine anteprima</h1>

<h2>Evento "<?php echo $cur_event->title; ?>"</h2>


<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $cur_event->id; ?>">
    <div>
        <label for="img">Immagine dell'evento</label>
        <input type="file" name="img" id="img" accept=".jpg" required>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Carica</button>
    </div>
</form>

<!-- Load simplemde -->
<script src="/assets/simplemde/dist/simplemde.min.js"></script>
<link rel="stylesheet" href="/assets/simplemde/dist/simplemde.min.css">
<script src="/assets/load_simplemde.js"></script>

</div>
</main>
<?php
require "../private/footer.php";
?>