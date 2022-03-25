<?php
    namespace app\tables;

    use app\App;

    class Utilisateur{

        /**
         * Function to get client informations
         * @return array 
         */

        public static function getUtilisateur()
        {
            $data = [];
            $query = "SELECT id_utilisateur,nom_utilisateur,email_utilisateur,pass,role.nom_role
            FROM utilisateur
            INNER JOIN role
            ON utilisateur.roleid = role.id_role ORDER BY id_utilisateur ";
            $data = App::getDatabase()->query($query);
            return $data;
        }


        /**
         * setclient function
         *
         * @param array $data
         * @return void
         */
        public static function setUtilisateur(array $data)
        {
            $query = "INSERT INTO utilisateur (nom_utilisateur,email_utilisateur,pass,roleid )
             VALUES(?,?,?,?)";
            App::getDatabase()->prepare($query,$data);
        }
        
        /**
         * update client function
         *
         * @param array $data
         * @return void
         */
        public static function updateUtilisateur(array $data)
        {
            $query= "UPDATE utilisateur SET nom_utilisateur=?,email_utilisateur=?,pass=?,roleid=?
            WHERE id_utilisateur=?";
            App::getDatabase()->prepare($query,$data);
        }

        /**
         * delete client function
         *
         * @param array $data
         * @return void
         */
        public static function deleteUtilisateur(array $data)
        {
            $query = "DELETE FROM utilisateur WHERE id_utilisateur=? ";
            APP::getDatabase()->prepare($query,$data);
        }

        
        /**
         * get client by is id function
         *
         * @param [type] $data
         * @return array
         */
        public static function getUtilisateurtByid($data)
        {
            $query = "SELECT id_utilisateur,nom_utilisateur,email_utilisateur,pass,role.nom_role
            FROM utilisateur
            INNER JOIN role
            ON utilisateur.roleid = role.id_role
            WHERE id_utilisateur='$data'";
            $data = App::getDatabase()->query($query);
            return $data;
        }
    }