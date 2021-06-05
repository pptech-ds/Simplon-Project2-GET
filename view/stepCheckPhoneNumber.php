<?php if ($_GET['step'] == 'checkPhoneNumber') {
    if (checkPhoneNumber($_GET['number'])) { ?>

            <!-- Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue -->
            <p class="mt-5">Merci pour votre notation : <?= printNotation(
                $_GET['point']
            ) ?> </p> <!-- le nombre d'étoiles représente le nombre de points cumulés -->

            <p class="mt-5">
                <a href="?step=0" role="button" class="btn btn-danger">Recommencer</a>
            </p>
            <?php } else { ?>

<a href="index.php?step=callback&point=<?= $_GET[
    'point'
] ?>&number" role="button" class="btn btn-danger">Numero Invalide, merci ressaisir votre numero comportant 10 chiffres</a>

<?php }
}
