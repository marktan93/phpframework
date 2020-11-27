<?php


class model {
    
    protected $dbc;
    
    public function __construct() {
        try {
                $this->connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            } catch (Exception $e) {
                echo "{$e->getMessage()}";
            }
    }
   
    /**
     * Use to establish the database connection
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @return type
     * @throws exception
     */
	public function connect($host, $username, $password, $database) {
            try {
                $dbc = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                return $this->dbc = $dbc;
            } catch (PDOException $e) {
                //throw new exception(DB_ERROR);
            }
	}
        
	
    /**
     * Database Update
     * @param string $table
     * @param array $attr
     * @param array $where
     * @return boolean|int
     */
	public function update($table, $attr, $where = null) {
		$dbc = $this->dbc;
                
                $field_array = array();
                $data_array = array();
                foreach ($attr as $field => $data) {
                    array_push($field_array, "`".$field."` = ?");
                    array_push($data_array, $data);
                }
                
                if ($where == null) {
                    $sql = "UPDATE `".$table."` SET ".implode(", ", $field_array)." ";
                } else {
                    $where_array = array();
                    foreach ($where as $field=> $data) {
                        array_push($where_array, "`".$field."` = ?");
                        array_push($data_array, $data);
                    }
                    
                    $sql = "UPDATE `".$table."` SET ".implode(", ", $field_array)." WHERE ".implode(", ", $where_array)." ;";
                }
                
                $stmt = $dbc->prepare($sql);
                
                $count = $stmt->execute($data_array);
                $dbc = null;
                if ($count > 0) {
                    return $count;
                }
                return false;
		
	}
	
   /**
    * Select records from database
    * @param String $type
    * @param String $table
    * @param Array $attr
    * @param Assoc_array $where
    * @param Array $range
    * @return boolean|array
    */
	public function get($type = 'assoc', $table, $attr, $where = null, $range = null) {
		$dbc = $this->dbc;
                
                $type = strtolower($type);
                
                if ($where == null) {
                    $sql = "SELECT ".implode(", ", $attr)." FROM `".$table."` ";
                    if ($range != null) {
                        $sql .= "LIMIT ".implode(", ", $range)." ;";
                    } else {
                        $sql .= ";";
                    }    
                    $stmt = $dbc->prepare($sql);
                    $stmt->execute();
                } else {
                    $where_array = array();
                    $data_array = array();
                    foreach ($where as $field => $data) {
                        array_push($where_array, "`".$field."` = ?");
                        array_push($data_array, $data);
                    }
                    $sql = "SELECT ".implode(", ", $attr)." FROM `".$table."` WHERE ".implode(", ", $where_array)." ";
                    if ($range != null) {
                        $sql .= "LIMIT ".implode(", ", $range)." ;";
                    } else {
                        $sql .= ";";
                    }    
                    $stmt = $dbc->prepare($sql);
                    $stmt->execute($data_array);
                }
                
                
                $result = null;
                
                switch($type) {
                    case "assoc":
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        break;
                    case "num":
                        $stmt->setFetchMode(PDO::FETCH_NUM);
                        break;
                    case "both":
                        $stmt->setFetchMode(PDO::FETCH_BOTH);
                    default:
                        return false;
                }
                
                $result = $stmt->fetchAll();
                
                $dbc = null; // close connection
                
                return $result;
	}
        
    /**
     * Run sql statement
     * @param String $sql
     * @return boolean
     */
	public function run($sql) {
		if (empty($sql)) return false;
		$dbc = $this->dbc;
		$result = $dbc->query($sql);
                $dbc = null;
                if ($result == null)
                    return false;
                return true;
	}
    
    /**
     * Run sql statement return result
     * @param String $sql
     * @return boolean
     */
	public function query($sql, $all = null) {
		if (empty($sql)) return false;
		$dbc = $this->dbc;
		$result = $dbc->query($sql);
                $dbc = null;
                if ($result == null)
                    return false;
        $result->setFetchMode(PDO::FETCH_ASSOC);
        if ($all == null)
            return $result->fetchObject(); // object
        return $result->fetchAll(); // array
	}
	
    /**
     * Insert records into database
     * @param String $table
     * @param Array $attr
     * @return boolean|int
     */
	public function insert($table, $attr) {
		$dbc = $this->dbc;
		
		$field = array();
                $pre_data = array();
		$data = array();
		foreach ($attr as $f => $d) {
			array_push($field, '`'.$f.'`');
                        array_push($pre_data, " ? ");
			array_push($data, $d);
		}
		$sql = "INSERT INTO " . $table . "(" . implode(', ', $field) . ") VALUES(" . implode(', ', $pre_data) . ") ;";
                
                $stmt = $dbc->prepare($sql);
                $count = $stmt->execute($data);
                
                $dbc = null;
                
                if ($count > 0) 
                    return $count;
                else 
                    return false;
	}
    
    /**
     * Get last insert id
     * @return int
     */
    public function last_id() {
       return $this->dbc->lastInsertId();
    }
    
}

?>
