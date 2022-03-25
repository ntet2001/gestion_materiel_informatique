<?php
    namespace app\tables;

    use app\App;

    class Role{

        /**
         * Function to get client informations
         * @return array 
         */

        public static function getRole()
        {
            $data = [];
            $query = "SELECT * FROM Role";
            $data = App::getDatabase()->query($query);
            return $data;
        }
    }
    