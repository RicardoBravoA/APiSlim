<?php

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/db_connect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }


    // Places By Description
    public function getPlaceByDescription($description) {

        if($description=='All'){
            $description='';
        }

        $response = array();
        $stmt = $this->conn->prepare("SELECT place_id, description FROM place 
              WHERE description LIKE '%$description%'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["place_id"] = $dataQuery['place_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
            $response["_meta"] = $meta;
        }
        return $response;
    }

    // All Places
    public function getAllPlace() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT place_id, description FROM place");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["place_id"] = $dataQuery['place_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
            $response["_meta"] = $meta;
        }
        return $response;
    }

}

?>
