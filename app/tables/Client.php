<?php
    namespace app\tables;

    use app\App;

    class Client{

        /**
         * Function to get client informations
         * @return array 
         */

        public static function getClient()
        {
            $data = [];
            $query = "SELECT * FROM client";
            $data = App::getDatabase()->query($query);
            return $data;
        }


        /**
         * setclient function
         *
         * @param array $data
         * @return void
         */
        public static function setClient(array $data)
        {
            $query = "INSERT INTO client (nom_client,prenom_client,adresse_client,email_client) VALUES
            (?,?,?,?)";
            App::getDatabase()->prepare($query,$data);
        }
        
        /**
         * update client function
         *
         * @param array $data
         * @return void
         */
        public static function updateClient(array $data)
        {
            $query= "UPDATE client SET nom_client=?, prenom_client=?,adresse_client=?,email_client=?
            WHERE id_client =?";
            App::getDatabase()->prepare($query,$data);
        }

        /**
         * delete client function
         *
         * @param array $data
         * @return void
         */
        public static function deleteClient(array $data)
        {
            $query = "DELETE FROM client WHERE id_client=? ";
            APP::getDatabase()->prepare($query,$data);
        }

        
        /**
         * get client by is id function
         *
         * @param [type] $data
         * @return array
         */
        public static function getClientByid($data)
        {
            $query = "SELECT * FROM client WHERE id_client='$data'";
            $data = App::getDatabase()->query($query);
            return $data;
        }
    }