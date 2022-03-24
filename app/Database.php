<?php
    namespace app;
    use PDO;
    

    /**
     * Database class for connection to my database
     */
    class Database{

        /**
         * property
         */

        private $db_name;
        private $db_user;
        private $db_pass;
        private $db_host;
        private $pdo;
        /**
         *function __construct where you have the parameters of the connection string
         */
        public function __construct($db_name,$db_user='root',$db_pass='',$db_host='127.0.0.1')
        {
            $this->db_name=$db_name;
            $this->db_user=$db_user;
            $this->db_pass=$db_pass;
            $this->db_host=$db_host;
        }

        /**
         * Private function for connection to database
         * @return pdo
         */
        private function getPDO()
        {
            if ($this->pdo === null) {

                $pdo = new PDO('mysql:dbname='.$this->db_name.';host=127.0.0.1','root','');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo=$pdo;    
            }
            return $this->pdo;
        }

        /**
         * @return  array
         */

        public function query(string $statement)
        {
            $req= $this->getPDO()->query($statement);
            $datas=$req->fetchAll(PDO::FETCH_ASSOC);
            return $datas;
        }

        public function prepare(string $statement, $options){
            $req=$this->getPDO()->prepare($statement);
            $req->execute($options);
        }
    }