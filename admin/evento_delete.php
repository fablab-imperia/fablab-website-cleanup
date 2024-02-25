<?php
require "../private/event_management.php";
require "../private/database.php";
?>

<?php
$db = new Database();
$ev = $db->event_fetch_one($_GET["id"]);

if (!isset($ev))
{
    header('Location: /admin/eventi.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST["elimina"]))
    {
        $db->event_delete($_GET["id"]);
        header('Location: /admin/eventi.php');
        die;
    }
}

require "../private/header.php";

?>

<main>
<div class="container">

<?php require "./_admin_back_button.php"; ?>



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