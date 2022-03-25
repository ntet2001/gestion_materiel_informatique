<?php
    namespace app\tables;

    use app\App;

    class TypeMateriel{

        /**
         * Function to get client informations
         * @return array 
         */

        public static function getTypeMateriel()
        {
            $data = [];
            $query = "SELECT * FROM type_materiel";
            $data = App::getDatabase()->query($query);
            return $data;
        }


        /**
         * setclient function
         *
         * @param array $data
         * @return void
         */
        public static function setTypeMateriel(array $data)
        {
            $query = "INSERT INTO type_materiel (marque)
             VALUES(?)";
            App::getDatabase()->prepare($query,$data);
        }
        
        /**
         * update client function
         *
         * @param array $data
         * @return void
         */
        public static function updateTypeMateriel(array $data)
        {
            $query= "UPDATE type_materiel SET marque=?
            WHERE id_typemateriel =?";
            App::getDatabase()->prepare($query,$data);
        }

        /**
         * delete client function
         *
         * @param array $data
         * @return void
         */
        public static function deleteTypeMateriel(array $data)
        {
            $query = "DELETE FROM type_materiel WHERE id_typemateriel=? ";
            APP::getDatabase()->prepare($query,$data);
        }

        
        /**
         * get client by is id function
         *
         * @param [type] $data
         * @return array
         */
        public static function getTypeMaterielByid($data)
        {
            $query = "SELECT * FROM type_materiel
            WHERE id_typemateriel='$data'";
            $data = App::getDatabase()->query($query);
            return $data;
        }
    }