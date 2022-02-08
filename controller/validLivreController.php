<?php

    class validLivreController {

        public function __construct(){       
            session_start();
            error_reporting(0);
            require_once "controller/Controller.php";
            require_once "PDO/connectionPDO.php";
            require_once "PDO/LivreDB.php";
            require_once "Constantes.php";
            require_once "metier/Livre.php";

            $titre = $_POST['nom'] ?? null;
            $auteur = $_POST['auteur'] ?? null;
            $edition = $_POST['edition'] ?? null;
            $_GET['id'] = substr($_GET['id'], 0, -8);
            if(isset($_POST['information'])){
                $info = 'Bonne etat';
            }else{
                $info = 'Mauvaise etat';
            }

            if(Controller::auth()){
                $accesLivreBDD = new LivreDB($pdo);
                $livre = new Livre(0,$titre,$edition,$info,$auteur);
                $accesLivreBDD->ajout($livre);
                echo 'Insertion du livre : '.$titre.'. Réussi';
            }else{
                echo 'erreur';
            }
        }
    }
?>