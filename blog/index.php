<?php
$TITLE = "Il blog dei maker";
require '../private/header.php';
require '../private/database.php';
?>

<main>
<div class="container">
<h1>
    Blog dei <em>maker</em>
</h1>
<p>
    In questa sezione i soci Fablab Imperia possono pubblicare le proprie creazioni, opinioni o altri articoli.
</p>

<div class="card card-opaque">
	<h2>
	ZONA DEL SITO ATTUALMENTE IN MANUTENZIONE
	</h2>
	<p>Torna alla <a href="/">pagina iniziale</a></p>
</div>

<!-- 
<div class="row">
<?php
$counter = 0;
$db = new Database();
$events = $db->blog_fetch_all();
foreach ($events as $value)
{
	if ($value->published)
	{
		$counter++;
		echo '<div class="col-lg-6">';
		$value->render_as_card($counter > 3);
		echo '</div>';
	}
}
if ($counter == 0) {
	echo '<p>';
	echo 'Nessun post del blog!';
	echo '</p>';
}
?>
</div> -->


</div>
</main>
<?php
require '../private/footer.php';
?>