<?php
require __DIR__ . "/../../private/blog_management.php";
require __DIR__ . "/../../private/database.php";
?>

<?php
$db = new Database();
$cur_post = $db->blog_fetch_one(intval($_GET["id"]));
if (!isset($cur_post))
{
    header('Location: /admin/blog/');
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
        imagejpeg($resized_low,  $cur_post->gen_image_path_low());
        imagejpeg($resized_big,  $cur_post->gen_image_path());
        header('Location: /admin/blog/');
    }
    else
    {
        echo "ERRORE SERVER";
        die;
    }
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

<h1>Carica immagine anteprima</h1>

<h2>Post "<?php echo $cur_post->title; ?>"</h2>


<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $cur_post->id; ?>">
    <div>
        <label for="img">Immagine dell'evento</label>
        <input type="file" name="img" id="img" accept=".jpg" required>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Carica</button>
    </div>
</form>


</div>
</main>
<?php
require "../../private/footer.php";
?>