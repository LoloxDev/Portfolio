<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoi d'un message par formulaire</title>
</head>

<body>
<?php

$myMail = "loris.labarre@outlook.fr";

        if (isset($_POST)) {
            $retour = mail($myMail,$_POST['motif'], $_POST['name'], $_POST['msg'], $_POST['email'], $_POST['tel']);
            if ($retour) {echo '<p>Votre message a bien été envoyé.</p>';
            } else {
                echo '<p>Problème quelque part</p>';
            }
        }
    ?>
</body>
</html>