<?php
require __DIR__ . "/../../private/event_management.php";
require __DIR__ . "/../../private/database.php";
?>

<?php
$db = new Database();
$ev = $db->event_fetch_one($_GET["id"]);

if (!isset($ev))
{
    header('Location: /admin/eventi/');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST["elimina"]))
    {
        $db->event_delete($_GET["id"]);
        require __DIR__ . "/../../private/feed_generation.php";
        header('Location: /admin/eventi/');
        die;
    }
}

require "../../private/header.php";

?>

<main>
<div class="container">

<p>
    <a href="./"> <i class="fa fa-arrow-left"></i> Torna a pagina Eventi</a>
</p>

<h1>Eliminare evento "<?php echo $ev->title; ?>"?</h1>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $ev->id; ?>">
    <input type="hidden" name="elimina" value="true">
    <div>
        <button style="background-color:red;" class="btn btn-primary" type="submit">
        Elimina <i class="fa fa-remove"></i>
        </button>
    </div>
</form>



</div>
</main>
<?php
require "../private/footer.php";
?>