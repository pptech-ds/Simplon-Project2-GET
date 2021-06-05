<?php if ($_GET['step'] == '2') { ?>

<!-- Etape 2 : A afficher uniquement une fois que l'étape 1 a été résolue -->
<h2>Question 2</h2>
<p>L'agent a-t-il compris votre problème ?</p>
<a href="?step=3&point=<?= $_GET['point'] +
    2 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
<a href="?step=3&point=<?= $_GET[
    'point'
] ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte 1 point -->
<a href="?step=3&point=<?= $_GET['point'] +
    1 ?>" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 0 point -->

<?php }
