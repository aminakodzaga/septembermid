<?php
require_once "BaseDao.php";

class MidtermDao extends BaseDao {

    public function __construct(){
        parent::__construct();
        $this->conn = $this->getConnection();
    }

    /** TODO
    * Implement DAO method used to add content to database
    */
    public function input_data($data){
        $stmt = $this->conn->prepare("INSERT INTO location (from_value, to_value, code, Country, Region, City) VALUES (:from_value, :to_value, :code, :Country, :Region, :City)");
        $stmt->execute($data);
        $data['id'] = $this->conn->lastInsertId();
        return $data;
    }

    /** TODO
    * Implement DAO method to return summary as requested within route /midterm/summary/@country
    */
    public function summary($country){
         /** TODO
    * This endpoint is used to return total number of regions and cities from locations table
    * by country given as parameter
    * This endpoint should return output in JSON format
    * 30 points
    */
        $stmt = $this->conn->prepare("SELECT COUNT(DISTINCT Region) as regia, COUNT(DISTINCT City) as cities FROM location WHERE country=:country");
        $stmt->execute(['country' => $country]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** TODO
    * Implement DAO method to return list as requested within route /midterm/encoded
    */
    public function encoded(){
        $stmt = $this->conn->prepare("SELECT Country FROM location limit 10" );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /** TODO
    * Implement DAO method to return location(s) as requested within route /midterm/ip
    */
    public function ip($ip_address){
      

    }
}
?>
