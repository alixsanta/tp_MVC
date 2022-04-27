<?php
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    include './vue/view_header.php';
    /*-------------------------------------------
    ROUTER
    -------------------------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        //route /routing/test -> ./test.php
        case $path === "/cours_php/tp_MVC/test":
        include './test.php';
        break;
        //route /routing/addUser -> ./controler/controler_add_user.php
        case $path === "/cours_php/tp_MVC/addArticle":
        include './Controler/controler_article.php';
        echo "cas deux";
        break;

        case $path === "/cours_php/tp_MVC/showArticle":
        include './Controler/controler_show_article.php';
        break;

        case $path === "/cours_php/tp_MVC/bidon":
        include './Controler/controler_bidon.php';
        break;

        case $path === "/cours_php/tp_MVC/modifierArticle":
        include './Controler/controler_modif_article.php';
        break;

        case $path === "/cours_php/tp_MVC/suppArticle":
        include './Controler/controler_supp_article.php';
        break;
    }
?>