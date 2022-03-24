<?php
    namespace app;

    /**
     * class fonction where you have all my functions
     */

    class Fonction{
        //ajout de session
        public static function ajoutsession(){
            session_start();
        }

        //retirer session
        public static function retirersession(array $data){
            session_unset($data);
            session_destroy();
            header('Location: ../../index.php');
        }

        // fonction pour verifier si l'utilisateur est connecte
        public static function estconnecte(){
            if($_SESSION['connecte'] != 1){
                header('Location: ../../index.php');
            }
        }

        // fonction pour verifier id passer par l'url
        public static function checkinput($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    }