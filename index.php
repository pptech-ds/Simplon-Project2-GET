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
            if (isset($_GET['step']) == false) {
                $_GET['step'] = '0';
            }
            if (isset($_GET['step'])) {
                if ($_GET['step'] == '0') { 
        ?> 
                    <h2>Questionnaire de satisfaction</h2>

                    <!-- step 0 : A afficher uniquement au chargement de la page -->
                    <p>Vous avez contacté notre service client et nous aimerions avoir votre avis sur la qualité de ce service</p>
                    <p>Commencez le questionnaire : <a href="index.php?step=1" role="button" class="btn btn-success">Commencer</a></p>
        <?php 
                } elseif ($_GET['step'] == '1') { 
        ?>
                    <!-- Etape 1 : A afficher uniquement une fois que le boutton "Commencer" a été pressé -->
                    <h2>Question 1</h2>
                    <p>L'agent a-t-il été agréable ?</p>

                    <a href="index.php?step=2&point=2" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
                    <a href="index.php?step=2&point=0" role="button" class="btn btn-danger">non</a> <!-- rapporte 0 point -->
                    <a href="index.php?step=2&point=1" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 1 point -->
        
        <?php 
                } elseif ($_GET['step'] == '2') { 
        ?>
                    <!-- Etape 2 : A afficher uniquement une fois que l'étape 1 a été résolue -->
                    <h2>Question 2</h2>
                    <p>L'agent a-t-il compris votre problème ?</p>
                    <a href="index.php?step=3&point=<?= $_GET['point'] + 2 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
                    <a href="index.php?step=3&point=<?= $_GET['point'] ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte 1 point -->
                    <a href="index.php?step=3&point=<?= $_GET['point'] + 1 ?>" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 0 point -->

        <?php 
                } elseif ($_GET['step'] == '3') {
                    $points_q2 = $_GET['point']; ?>
                    <!-- Etape 3 : A afficher uniquement une fois que l'étape 2 a été résolue -->
                    <h2>Question 3</h2>
                    <p>L'agent a-t-il résolu votre problème ?</p>
                    <a href="index.php?step=q3oui&point=<?= $_GET['point'] + 1 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 1 point -->
                    <a href="index.php?step=q3non&point=<?= $_GET['point'] - 1 ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte -1 point -->
        <?php
                } elseif (($_GET['step'] == 'q3oui') || ($_GET['step'] == 'validated')) {

                    $stars_and_circles = '';
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $_GET['point']) {
                            $stars_and_circles .= '⭐';
                        } else {
                            $stars_and_circles .= '⚫';
                        }
                    }
        ?>
                    <!-- Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue -->
                    <p class="mt-5">Merci pour votre notation : <?= $stars_and_circles ?> </p> <!-- le nombre d'étoiles représente le nombre de points cumulés -->

                    <p class="mt-5">
                        <a href="index.php?step=0" role="button" class="btn btn-danger">Recommencer</a>
                    </p>
        
        <?php
                } elseif ($_GET['step'] == 'q3non') { 
        ?>
                    <!-- Etape 4 : A afficher uniquement si "non" a été répondu à l'étape 3 -->
                    <p>Votre problème n'a pas été résolu.</p>
                    <p>Pour être rappelé, entrez votre numéro de téléphone dans le clavier virtuel et validez :</p>
                    <!-- Coder ici un clavier numérique permettant de saisir le numéro de téléphone -->

                    
                    
        <?php
                
                    for ($i = 0; $i < 10; $i++) {
        ?>
                        <a href="index.php?step=q3non&point=<?= $_GET['point'] ?>&number=<?= $_GET['number'].$i ?>" role="button" class="btn btn-secondary"><?= $i ?></a>
            
        <?php 
                    
                    }
                    
                    function checkPhoneNumber(string $phoneNumber)
                    {
                        if (strlen($phoneNumber) == 10) {
                            return true;
                        } else {
                            return false;
                        }
                    }
            
        ?>
                    

                    <!-- Afficher ici le numéro de téléphone qui s'affiche au fur et à mesure de la saisie-->
                    <p>Votre numéro : #numéro de téléphone saisi#</p>
                    <?= $_GET['number'].'<br>' ?>
                    <a href="index.php?step=checkPhoneNumber&point=<?= $_GET['point'] ?>&number=<?= $_GET['number'] ?>" role="button" class="btn btn-success">Valider</a> <!-- Validation du numéro de téléphone -->

                    <p class="mt-5">
                        <a href="index.php?step=validated&point=<?= $_GET['point'] ?>" role="button" class="btn btn-danger">Ne pas etre rappele</a>
                    </p>

                    <p class="mt-5">
                        <a href="index.php?step=0" role="button" class="btn btn-danger">Recommencer</a>
                    </p>
        <?php
                } elseif ($_GET['step'] == 'checkPhoneNumber') { 
                    // echo '<br>TEST NUM:'.strlen($_GET['number']).'<br>';
                    if (strlen($_GET['number']) == 10) {
                        $stars_and_circles = '';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $_GET['point']) {
                                $stars_and_circles .= '⭐';
                            } else {
                                $stars_and_circles .= '⚫';
                            }
                        }
        ?>
                        <!-- Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue -->
                        <p class="mt-5">Merci pour votre notation : <?= $stars_and_circles ?> </p> <!-- le nombre d'étoiles représente le nombre de points cumulés -->
                        
                        <p class="mt-5">
                        <a href="index.php?step=0" role="button" class="btn btn-danger">Recommencer</a>
                        </p>

                        
        <?php
                    } else {
        ?>
                        <a href="index.php?step=q3non&point=<?= $_GET['point'] ?>" role="button" class="btn btn-danger">Numero Invalide, merci ressaisir votre numero comportant 10 chiffres</a>
        <?php
                    }
        ?>
        <?php
                }
        ?>
        <?php 
                
            }
        ?>
    </div>
</body>

</html>