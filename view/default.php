<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- meta référencement -->
        <meta name="description" content="Web Dev PHP : Conditions, requêtes GET">
        <meta name="author" content="Camile Ghastine">

        <title>Questionnaire de satisfaction du service client Amazin</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>

    <body>
        <div class="container">
            <h1 class="mb-5">AMAZIN</h1>
            <?php
            require 'view/step0.php';
            require 'view/step1.php';
            require 'view/step2.php';
            require 'view/step3.php';
            require 'view/stepNotation.php';
            require 'view/stepPhone.php';
            ?>
        </div>
    </body>

</html>
