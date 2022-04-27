<?php

    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './vue/supp_article.php';

    $article = New Article(null, null);
    $array = $article->suppArticle($bdd);
        foreach($array as $value){
        echo "<p>article : '.$value->nom_article.' a été supprimé '</p>";
    }
?>