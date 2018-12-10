<?php
/**
 * Created by PhpStorm.
 * User: Ksar
 * Date: 06.12.2018
 * Time: 15:54
 */

class AddressModel {
    private $db_connection;
    private $table_name;

    function __construct ($db_connection, $table_name) {
        $this->db_connection = $db_connection;
        $this->table_name = $table_name;
    }

    function getData ( $where_condition = null ) {
print("where=".$where_condition."#<br>");
        $query = 'SELECT id, country, city, street, number, postcode, coordinates' .
                ' FROM ' . $this->table_name;
        if ( !is_null($where_condition) && strlen(where_condition) > 0 ) {
#            $query .= ' WHERE ' . Functions::sanitizeData($where_condition);
            $query .= ' WHERE ' . $where_condition;
        }
print("q=".$query."<br>");
        $prepared_query = $this->db_connection->prepare($query);
        $prepared_query->execute();
        $result = $prepared_query->fetchAll();
        return $result;
    }
}
