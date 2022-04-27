<?php

    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './vue/show_article.php';

    $article = New Article(null, null);
    $array = $article->showArticle($bdd);
    // var_dump($array); 
    foreach($array as $value){
        echo '<p>article : '.$value->nom_article.' prix : '.$value->prix_article.'</p>';
    }
?>