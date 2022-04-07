

<?php
    /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    include './view/navHome.php';
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_inscription.php';

    /*---------------------------------------
                    TEST
    -----------------------------------------*/
    //test si le bouton submit à été cliqué
        //test pour vérifier si les champs du formulaire sont remplis
        if(isset($_POST['name_user']) AND isset($_POST['first_name_user']) 
            AND isset($_POST['login_user']) AND isset($_POST['mdp_user']) AND 
            $_POST['name_user'] !='' AND $_POST['first_name_user'] !='' AND 
            $_POST['login_user'] !='' AND $_POST['mdp_user'] !=''AND isset($_POST['submit'])){
            //stocker les super globales POST dans des variables
            $nom =$_POST['name_user'];
            $prenom =$_POST['first_name_user'];
            $mail =$_POST['login_user'];
            $mdp =$_POST['mdp_user'];
            //option pour hash
        $options = [
            'cost' => 8,
        ];
        //hash
        $mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);
            //appel de la fonction ajouter  un user en BDD
            adduser($bdd, $nom, $prenom, $mail,$mdp) ;
            //message
            echo "$nom vien de s'inscrire bien jouer bg ";
            echo '<script>
         setTimeout(()=>{
         document.location.href="./connexion.php"; 
         }, 1500);</script>';
        }
        //sinon vides
        else{
            echo 'Veuillez compléter les champs du formulaire';
        }
?>

