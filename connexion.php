<?php
    /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    include 'navHome.php';
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_connexion.php';
    if(isset($_POST['login_user']) AND isset($_POST['mdp_user']) AND
    !empty($_POST['login_user']) AND !empty($_POST['mdp_user'])){
        //récup super globale post
        $login = $_POST['login_user'];
        $mdp = $_POST['mdp_user'];
        //récup du hash en bdd
        $hash = getUserByMail($bdd, $login);
        //test du mot de passe
        if(password_verify($mdp,$hash)){
            echo '<p>connecté</p>';
            echo '<script>
            setTimeout(()=>{
            document.location.href="./userConnecter.php"; 
            }, 1500);</script>';

        }
        //si mauvais mdp
        else{
            echo '<p>Mauvais mdp</p>';
        }
    }
    else{
        echo '<p>Veuillez remplir le  formulaire</p>';
    }
?>