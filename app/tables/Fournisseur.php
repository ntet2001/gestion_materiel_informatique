<?php
    namespace app\tables;

    use app\App;

    class Fournisseur{

        /**
         * Function to get client informations
         * @return array 
         */

        public static function getFournisseur()
        {
            $data = [];
            $query = "SELECT * FROM fournisseur";
            $data = App::getDatabase()->query($query);
            return $data;
        }


        /**
         * setclient function
         *
         * @param array $data
         * @return void
         */
        public static function setFournisseur(array $data)
        {
            $query = "INSERT INTO fournisseur (nom_fournisseur,adresse_fournisseur,telephone)
             VALUES(?,?,?)";
            App::getDatabase()->prepare($query,$data);
        }
        
        /**
         * update client function
         *
         * @param array $data
         * @return void
         */
        public static function updateFournisseur(array $data)
        {
            $query= "UPDATE fournisseur SET nom_fournisseur=?,adresse_fournisseur=?,telephone=?
            WHERE id_fournisseur =?";
            App::getDatabase()->prepare($query,$data);
        }

        /**
         * delete client function
         *
         * @param array $data
         * @return void
         */
        public static function deleteFournisseur(array $data)
        {
            $query = "DELETE FROM fournisseur WHERE id_fournisseur=? ";
            APP::getDatabase()->prepare($query,$data);
        }

        
        /**
         * get client by is id function
         *
         * @param [type] $data
         * @return array
         */
        public static function getFournisseurByid($data)
        {
            $query = "SELECT * FROM fournisseur
            WHERE id_fournisseur='$data'";
            $data = App::getDatabase()->query($query);
            return $data;
        }
    }