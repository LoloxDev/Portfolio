<?php
    include 'index.php';
    include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();
?>

<section id="projets">

    <div>
        <h1 class="text-center">Les utilisateurs</h1>
        <table class="table table-dark">

            <thead>

                <tr>

                    <th>Identifiant</th>
                    <th>Mot de passe</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>

                </tr>

            </thead>
            
            <tbody>

                <?php // Ici la requête pour le tableau

                        $requeteAdmin = $sgbd->query ('SELECT utilisateurs.login, utilisateurs.mdp, utilisateurs.prenom, utilisateurs.nom, utilisateurs.mail
                        FROM utilisateurs');

                        $requeteAdmin->execute();

                        $resultat_requeteAdmin = $requeteAdmin->fetchAll((PDO::FETCH_ASSOC));

                        // On affiche le tableau 

                        foreach ($resultat_requeteAdmin as $articleAdmin) {


                            echo   '<tr>
                                        <td>'.($articleAdmin['login']).'</td>
                                        <td>'.($articleAdmin['mdp']).'</td>
                                        <td>'.($articleAdmin['prenom']).'</td>
                                        <td>'.($articleAdmin['nom']).'</td>
                                        <td>'.($articleAdmin['mail']).'</td>';
                                        /*
                                        <td class="col-md-1 edit">
                                            <a class="tablebutton" href="index.php?ind=desc&id_edit='.($articleAdmin['id_produit']).'">
                                                <img src="src/img/icons8-modifier.svg" class="testcolor">
                                            </a>
                                        </td>
                                        <td class="col-md-1 delete">
                                            <a class="tablebutton" onclick="window.open(\'./src/exec/delete_produits.php?id_delete='.($articleAdmin['id_produit']).'\',\'pop_up\',\'width=300, height=200, toolbar=no status=no\');">
                                                <img src="src/img/poubelle.svg" class="testcolor">
                                            </a>
                                        </td>
                                    </tr>';*/

                        }

                ?>

            </tbody>

        </table>
    </div>
</section>