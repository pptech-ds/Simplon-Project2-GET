<?php if ($_GET['step'] == 'notation') { ?>

<!-- Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue -->
<p class="mt-5">Merci pour votre notation : <?= getNotation() ?> </p> <!-- le nombre d'étoiles représente le nombre de points cumulés -->

<p class="mt-5">
    <a href="?step=0" role="button" class="btn btn-danger">Recommencer</a>
</p>

<?php }
