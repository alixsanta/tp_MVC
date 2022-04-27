<?php

    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './vue/vue_article.php';


    if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND isset($_POST['nom_article']) !='' AND isset($_POST['prix_article']) !=''){
            $nom = $_POST['nom_article'];
            $prix =$_POST['prix_article'];
        $article = new Article($nom,$prix);
        $article->addArticle($bdd);
        echo "$nom a bien été ajouté !";
    }
    else{
        echo 'Veuillez compléter les champs du formulaire';
    }
?>