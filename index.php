<?php

require ('inc/bootstrap.php');
require ('functions.php');

$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);


$articles = getListArticle();


require ('inc/header.phtml');
?>
<main>
    <h1>Une collection originale</h1>
    <section>

        <?php
        foreach ($articles as $iK => $aValues){
            ?>
            <article>
                <p>
                    <img src="<?=$aValues['image']; ?>"/><br/>
                <p class="description"><?=$aValues['description']; ?><p><br/>
                <p>
                    <span><?=$aValues['prix']; ?> euros</span>
                    <span>
                <?php
                if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])))
                {
                    // le login a été enregistré dans la session, j'affiche le lien du profil
                    echo '<a href="http://localhost/coque/login.phtml">Commander</a>';
                }
                else
                {
                    // pas de login en session : proposer la connexion
                    echo '<a href="http://localhost/coque/login.phtml">Commander</a>';
                }
                ?>
                    </span></p>
                </p>
            </article>
            <?php
        }
        ?>

</section>
</main>
<?php
include ('inc/footer.phtml');