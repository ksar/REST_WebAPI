<?php
/**
 * Created by PhpStorm.
 * User: Ksar
 * Date: 06.12.2018
 * Time: 14:17
 */

class Address {

    private $db_conn;
    private $address_table_name;

    public function __construct ( $db_conn ) {
        $address_config = new AddressConfig();
        $this->db_conn = $db_conn;
        $this->address_table_name = $address_config->address_table_name;
    }

    function getData ( $where_condition = null ) {
        $address_model = new AddressModel ( $this->db_conn, $this->address_table_name );
        $return_data = $address_model->getData( $where_condition );
//var_dump($return_data);
        return $return_data;
    }










    // signup user
    function signup() {

        if($this->isAlreadyExist()) {
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, created=:created";

        // prepare query
        $stmt = $this->db_conn->prepare($query);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->created=htmlspecialchars(strip_tags($this->created));

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);

        // execute query
        if($stmt->execute()) {
            $this->id = $this->db_conn->lastInsertId();
            return true;
        }

        return false;

    }


    // login user
    function login() {
        // select all query
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->db_conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function isAlreadyExist() {
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";
        // prepare query statement
        $stmt = $this->db_conn->prepare($query);
        // execute query
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}
