<?php
require "private/header.php";
?>

<?php
require "private/database.php";
$db = new \Database\Db();
print_r($db->event_fetch_one(1));
?>

<div style='background-image:url("/assets/images/hero-alto.opti.webp")' class="hero-container">
    <div class="bootstrap-wrapper">
        <div class="container">
            <div class="hero">
                <small>
                    LABORATORIO DIGITALE CONDIVISO
                </small>
                <h1>Dai vita alle tue idee</h1>
                <p>
                Stampanti 3D, Fresatrice CNC, banco elettronica,
                componenti e attrezzi meccanici e
                tutto l'occorrente per creare (quasi) qualsiasi cosa... insieme
                </p>

                <div class="hero-buttons">
                    <a href="" class="btn btn-primary">Iscriviti al Fablab!</a>
                    <a  href="" class="btn">Scopri di più</a>
                </div>
            </div>
        <!-- <img class="hero-img" src="/assets/images/hero-alto.opti.webp" alt=""> -->
        </div>
    </div>
</div>    




<main>

<div class="bootstrap-wrapper">
<section>
<div class="row">
    <div class="col-md-6">
        <small>IL LABORATORIO</small>
        <h2>Sperimenta con la tecnologia</h2>
        <p>
        Tutti i servizi del Fablab possono essere utilizzati autonomamente dagli associati (previo corso).
        </p>
        <p>
            Vorresti realizzare un oggetto con la Stampa 3D?
            <br>
            Hai già un'idea e vuoi realizzare un prototipo?
        </p>

        <div class="row">
            <div class="col-md-6">
                <img class="corner" src="/assets/images/IMG_5350 cropped-min.jpg" alt="">
                <p>AAA</p>
            </div>
            <div class="col-md-6">
                <img class="corner" src="/assets/images/ruoterover cropped-min.opti.png" alt="">
                <p>AAA</p>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <img src="/assets/images/IMG_2557-min.jpg" alt="" class="corner">
    </div>
</div>

</section>
</div>

</main>

<?php
require "private/footer.php";
?>