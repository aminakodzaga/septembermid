<?php

class BaseDao {

    protected $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {

        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */
        $host = "localhost";
        $user = "root";
        $password = "123456";
        $schema = "neka";
        $port = 3306;


        /** TODO
        * Create new connection
        */
      $this->conn = new PDO("mysql:host=$host;dbname=$schema;port=$port", $user, $password);
        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }
    protected function getConnection() {
      return $this->conn;
  }

}
?>
