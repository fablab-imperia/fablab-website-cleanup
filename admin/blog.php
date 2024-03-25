<?php
require __DIR__ . "/../private/header.php";
require __DIR__ . "/../private/database.php";
?>
<main>
<div class="container">

<h1>Elenco post del blog</h1>

<p>
    <a class="btn" href="/admin/blog_new.php"> <i class="fa fa-plus"></i> Nuovo post</a>
</p>

<?php
$db = new Database();
$posts = $db->blog_fetch_all();
echo "<ul>";
foreach ($posts as $value)
{
    echo "<li>";
    echo "<a href=\"/admin/blog_edit.php?id=" . $value->id . "\">";
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




</div>
</main>
<?php
require "../private/footer.php";
?>