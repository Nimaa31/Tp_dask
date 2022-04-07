<?php
    //fonction qui ajoute un utilisateur en BDD(utilisateur)
    function adduser($bdd, $nom, $prenom, $mail,$mdp){
        try{
            $req = $bdd->prepare('INSERT INTO user(name_user, first_name_user,login_user, mdp_user) 
            VALUES(:name_user , :first_name_user, :login_user, :mdp_user)');
            $req->execute(array(
                'name_user' => $nom,
                'first_name_user' =>$prenom,
                'login_user' =>$mail,
                'mdp_user' =>$mdp
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    function getUserByMail($bdd, $login){
        try{
            $req = $bdd->prepare('SELECT mdp_user FROM user
            WHERE login_user=:login_user');
            $req->execute(array(
                'login_user' =>$login,
                ));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data[0]['mdp_user'];
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    function showAlltask($bdd){
        try{
            $req = $bdd->prepare('SELECT * FROM task');
            $req->execute();
            while($data = $req->fetch()){
                echo '<p> <input type="checkbox" 
                name="check[]" value="'.$data['id_task'].'"><a href="update_user.php?id='.$data['id_task'].'">Nom : '.$data['name_task'].' date: '.$data['date'].' 
                valide: '.$data['valide_task'].'</a></p>';
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

?>