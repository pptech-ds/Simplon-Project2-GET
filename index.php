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
            if(isset($_GET['step'])==false){
                $_GET['step'] = '0';
            }
            if(isset($_GET['step'])) {
                if($_GET['step'] == '0'){
        ?> 
                    <h2>Questionnaire de satisfaction</h2>

                    <!-- step 0 : A afficher uniquement au chargement de la page -->
                    <p>Vous avez contacté notre service client et nous aimerions avoir votre avis sur la qualité de ce service</p>
                    <p>Commencez le questionnaire : <a href="index.php?step=1" role="button" class="btn btn-success">Commencer</a></p>
        <?php
                }
                if($_GET['step'] == '1'){
        ?>
                    <!-- Etape 1 : A afficher uniquement une fois que le boutton "Commencer" a été pressé -->
                    <h2>Question 1</h2>
                    <p>L'agent a-t-il été agréable ?</p>

                    <a href="index.php?step=2&point=2" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
                    <a href="index.php?step=2&point=0" role="button" class="btn btn-danger">non</a> <!-- rapporte 0 point -->
                    <a href="index.php?step=2&point=1" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 1 point -->
        
        <?php
                    
                }
                if($_GET['step'] == '2'){
                    $points_q1 = $_GET['point'];
        ?>
                    <!-- Etape 2 : A afficher uniquement une fois que l'étape 1 a été résolue -->
                    <h2>Question 2</h2>
                    <p>L'agent a-t-il compris votre problème ?</p>
                    <a href="index.php?step=3&point=2" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
                    <a href="index.php?step=3&point=0" role="button" class="btn btn-danger">non</a> <!-- rapporte 1 point -->
                    <a href="index.php?step=3&point=1" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 0 point -->

        <?php
                    // $total_point = $total_point + $_GET['point'];
                    echo "<br>";
                    var_dump($points_q1);
                
                }
                if($_GET['step'] == '3'){
                    $points_q2 = $_GET['point'];
        ?>
                    <!-- Etape 3 : A afficher uniquement une fois que l'étape 2 a été résolue -->
                    <h2>Question 3</h2>
                    <p>L'agent a-t-il résolu votre problème ?</p>
                    <a href="index.php?step=q3oui&point=2" role="button" class="btn btn-success">oui</a> <!-- rapporte 1 point -->
                    <a href="index.php?step=q3non&point=0" role="button" class="btn btn-danger">non</a> <!-- rapporte -1 point -->
        <?php
                    // $total_point = $total_point + $_GET['point'];
                    echo "<br>";
                    var_dump($points_q1);
                    echo "<br>";
                    var_dump($points_q2);
                    
                    
                }
                if($_GET['step'] == 'q3oui'){
                    $points_q3 = $_GET['point'];
                    echo "<br>";
                    var_dump($points_q1);
                    echo "<br>";
                    var_dump($points_q2);
                    echo "<br>";
                    var_dump($points_q3);

                    $total_points = $points_q1 + $points_q2 + $points_q3;
                    echo "<br>";
                    var_dump($total_points);
        ?>
                    <!-- Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue -->
                    <p class="mt-5">Merci pour votre notation :⭐⭐⭐⚫⚫ </p> <!-- le nombre d'étoiles représente le nombre de points cumulés -->
                    
                    <p class="mt-5">
                        <a href="index.php?step=0" role="button" class="btn btn-danger">Recommencer</a>
                    </p>
        
        <?php
                    
                }
                if($_GET['step'] == 'q3non'){
        ?>
                    <!-- Etape 4 : A afficher uniquement si "non" a été répondu à l'étape 3 -->
                    <p>Votre problème n'a pas été résolu.</p>
                    <p>Pour être rappelé, entrez votre numéro de téléphone dans le clavier virtuel et validez :</p>
                    <!-- Coder ici un clavier numérique permettant de saisir le numéro de téléphone -->
                    <input type="number" pattern="[0-9]*" inputmode="numeric">


                    <!-- Afficher ici le numéro de téléphone qui s'affiche au fur et à mesure de la saisie-->
                    <p>Votre numéro : #numéro de téléphone saisi#</p>
                    <a href="" role="button" class="btn btn-success">Valider</a> <!-- Validation du numéro de téléphone -->

                    <p class="mt-5">
                        <a href="index.php?step=0" role="button" class="btn btn-danger">Recommencer</a>
                    </p>
        <?php
                }
            }
        ?>
    </div>
</body>

</html>