<?php
require __DIR__ . "/../../private/header.php";
require __DIR__ . "/../../private/database.php";
?>
<main>
<div class="container">

<p>
    <a href="../"> <i class="fa fa-arrow-left"></i> Torna a pagina admin</a>
</p>

<h1>Elenco eventi</h1>

<p>
    <a class="btn" href="/admin/eventi/new.php"> <i class="fa fa-plus"></i> Nuovo evento</a>
</p>

<?php
$db = new Database();
$events = $db->event_fetch_future();
echo "<ul>";
foreach ($events as $value)
{
    echo "<li>";
    echo "<a href=\"/admin/eventi/edit.php?id=" . $value->id . "\">";
    echo "<i class=\"fa fa-edit\"></i>";
    echo "&nbsp;";
    echo date("d/m/Y, H:i", $value->event_timestamp);
    echo "&nbsp;";
    echo $value->title;
    echo "</a>";
    echo "</li>";
}
echo "</ul>"
?>


<hr>
<h1>Eventi passati</h1>

<?php
$events = $db->event_fetch_past();
echo "<ul>";
foreach ($events as $value)
{
    echo "<li>";
    echo "<a href=\"/admin/eventi/edit.php?id=" . $value->id . "\"><i class=\"fa fa-edit\"></i></a>";
    echo "&nbsp;";
    echo date("d/m/Y, H:i", $value->event_timestamp);
    echo "&nbsp;";
    echo $value->title;
    echo "</li>";
}
echo "</ul>"
?>



</div>
</main>
<?php
require "../../private/footer.php";
require __DIR__ . "/../../private/feed_generation.php";
?>
