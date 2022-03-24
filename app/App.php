<?php

    namespace app;

    class App
    {
        const DB_NAME='gestion_materiel';
        const DB_PASS='';
        const DB_USER='root';
        const DB_HOST='127.0.0.1';
        private static $database;

        public static function getDatabase()
        {
          if(self::$database === null)
          {
            self::$database= new Database(self::DB_NAME,self::DB_USER,self::DB_PASS,self::DB_HOST);
          }
          return self::$database;
        }

        public static function unsetDatabase()
        {
          self::$database = null;
        }
    }