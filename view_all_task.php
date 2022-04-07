<?php
     /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_all_task.php';
    include './view/navbar.php';
    /*---------------------------------------
                    LOGIQUE
    -----------------------------------------*/
    //version 1
    showAlltask($bdd);

    ?>
    <input type="submit" value="Supprimer">
</form>
<?php
    if(isset($_POST['check'])){
        //boucle pour parcourir chaque case cochés ($value équivaut à value en HTML)
        foreach($_POST['check'] as $value){
            deleteUser($bdd, $value);
            echo "<p>Suppression de l'article $value</p>";
        }
        echo '<script>
        setTimeout(()=>{
        document.location.href="show_all_user.php"; 
        }, 1000);</script>';
    }
    else{
    echo "<p>Veuillez cocher un ou plusieurs produit à supprimer</p>";
    }
?>