<?php

    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './vue/modif_article.php';

    $article = New Article(null, null);
    $array = $article->showArticle($bdd); 
    foreach($array as $value){
        echo '<p>article : '.$value->nom_article.' prix : '.$value->prix_article.'</p>';
    }
    //test si $_GET['id'] existe
    if(isset($_GET['id'])AND !empty($_GET['id'])){
        //stocker dans id la valeur de l'id_util
        $id = $_GET['id'];
        $list = getUser($bdd, $id);
        echo '<script>
        setValueInput("'.$list[0]['nom_article'].'", "'.$list[0]['prix_article'].'");
        </script>';
        if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND isset($_POST['nom_article']) !='' AND isset($_POST['prix_article']) !=''){
            $nom = $_POST['nom_article'];
            $prix =$_POST['prix_article'];
            $article = new Article($nom,$prix);
            $article->modifArticle($bdd);
            echo "$nom a bien été ajouté !";
        }
        else{
            echo 'Veuillez compléter les champs du formulaire';
        }
    }

?>