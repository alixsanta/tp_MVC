<?php
    class Article{
        /*-----------------------------------------
                        ATTRIBUTS
        ----------------------------------------*/
        private $id_article;
        private $nom_article;
        private $prix_article;
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($nom, $prix){
            $this->nom_article = $nom;
            $this->prix_article = $prix;
        }
        /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/
        public function getIdArticle():int{
            return $this->id_article;
        }
        public function getNomArticle():string{
            return $this->nom_article;
        }
        public function getPrixArticle():float{
            return $this->prix_article;
        }
        public function setIdArticle($id):void{
            $this->id_article = $id;
        }
        public function setNomArticle($nom):void{
            $this->nom_article = $nom;
        }
        public function setPrixArticle($prix):void{
            $this->prix_article = $prix;
        }


        public function addArticle($bdd):void{
            $nom = $this->nom_article;
            $prix = $this->prix_article;
            try{
                $req = $bdd->prepare('INSERT INTO article(nom_article, prix_article) 
                VALUES(:nom_article, :prix_article)');
                $req->execute(array(
                    'nom_article' => $nom,
                    'prix_article' => $prix
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function showArticle($bdd) {
            try{
                $req = $bdd->prepare("SELECT * FROM article");
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
                $id= $data['id_article'];
                $nom = $data['nom_article'];
                echo '<p><input type="checkbox" name="id_article[]" value="'.$id.'">
                <a href="modifArticle.php?id='.$id.'">'.$nom.'</a></p>';
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        public function modifArticle($bdd, $article, $prix, $id):void{
            try{
                $req = $bdd->prepare('UPDATE article SET nom_article = :nom_article, prix_article = :prix_article 
                WHERE id_article = :id_article');
                $req->execute(array(
                    'nom_article' => $article,
                    'prix_article' =>$prix,
                    'id_article' =>$id
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function suppArticle($bdd, $value):void{
            try{
                $req = $bdd->prepare('DELETE FROM article WHERE id_article = :id_article');
                $req->execute(array(
                    'id_article' => $value
                    ));
            }
            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }
        }
    }
?>