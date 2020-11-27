<?php

/**
 * Description of m_product
 *
 * @author Mtcy
 */

class m_product extends model {
    
    public function get_product_list() {
        
        $statement = "SELECT p.id as product_id, p.name as product_name,
                             p.price as product_price, p.image as product_image, p.code as product_code,
                             p.status as product_status, p.description as product_description,
                             pa.name as part_name, c.name as category_name
                                    FROM 
                            `".TABLE_PRODUCTS."` p 
                                    INNER JOIN 
                            `".TABLE_PARTS."` pa 
                                    ON p.p_id = pa.id
                                    INNER JOIN
                            `".TABLE_CATEGORIES."` c
                                    ON pa.c_id = c.id ";
        
        $list = $this->query($statement, true);
        return $list;
    }
    
    public function delete_product($id) {
        return $this->run("DELETE FROM `".TABLE_PRODUCTS."` WHERE id = '".$id."';");
    }
    
    public function activate_product($id, $data) {
        return $this->update(TABLE_PRODUCTS, array("status"=>$data), array("id"=>$id));
    }
    
    public function get_product_images($id) {
        $statement = "SELECT `name` FROM `".TABLE_PRODUCT_IMAGES."` WHERE `p_id` = '$id' ;";
        return $this->query($statement, true);
    }
    
    public function get_parts($id) {
        return $this->get("assoc", TABLE_PARTS, array("*"), array("c_id"=>$id));
    }
    
    public function add_part($c_id, $name) {
        return $this->insert(TABLE_PARTS, array("c_id"=>$c_id, "name"=>$name));
    }
    
}

?>
