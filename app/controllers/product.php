<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author Mtcy
 */
class product extends controller {
    
    public function add() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
        $this->content('add');
    }
    
    public function plist() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
        $m_product = new m_product();
        $list = $m_product->get_product_list();
        viewbag("products", $list);
        $this->content("plist");
    }
    
    public function upload() {
        error_reporting(E_ALL | E_STRICT);
        $upload_handler = new UploadHandler();
    }
    
    public function delete() {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $m_product = new m_product();
            if ($m_product->delete_product($id) != false)  {
                echo "true";
                die();
            }
        }
        echo "false";
    }
    
    public function activate() {
        if (isset($_POST['id']) && !empty($_POST['id']))
        if (isset($_POST['status']) && !empty($_POST['status'])) {
            $id = $_POST['id'];
            $status = $_POST["status"];
            if ($status == Constant::Activated || $status == Constant::Deactivated) {
                $m_product = new m_product();
                if ($m_product->activate_product($id, $status) != false) {
                    echo "true";
                    die();
                }
            }
        }
        echo "false";
    }
    
    public function product_images($id) {
        if (!empty($id[0])) {
            $m_product = new m_product();
            $images = $m_product->get_product_images($id[0]);
            for ($i=0; $i<count($images); $i++) {
                $images[$i]["size"] = filesize(DOC_ROOT.ROOT.'files/'.$images[$i]['name']);
                $images[$i]["delete_type"] = "DELETE";
                $images[$i]["delete_url"] = "img_delete/".$images[$i]['name'];
                $images[$i]["thumbnail_url"] = ROOT.'files/thumbail/'.$images[$i]['name'];
                $images[$i]["url"] = ROOT.'files/'.$images[$i]['name'];
            }
            echo json_encode(array('files'=>$images));
        }
    }
    
    public function img_delete($name) {
        if (!empty($name[0])) {
            $name = $name[0];
            unlink(DOC_ROOT.ROOT."files/".$name);
            unlink(DOC_ROOT.ROOT."files/thumbnail/".$name);
        }
        
    }
    
    public function get_parts($id) {
        if (!empty($id[0])) {
            $id = $id[0];
            $m_product = new m_product();
            echo json_encode($m_product->get_parts($id));
            die();
        }
        echo 'false';
    }
    
    public function add_part() {
        
        if(isset($_POST['name']) && isset($_POST['c_id']) && !empty($_POST['name']) && !empty($_POST['c_id']) ) {
            $name = $_POST['name'];
            $c_id = $_POST['c_id'];
            $m_product = new m_product();
            $parts = $m_product->get_parts($c_id);
            $exist = false;
            foreach ($parts as $part) {
                if ($part['name'] == $name) {
                    $exist = true;
                    break;
                }
            }
            
            if ($exist) {
                echo 'false';
                die();
            } else {
                $result = $m_product->add_part($c_id, $name);
                if ($result != false) {
                    echo 'true';
                    die();
                }
            }
        }
        echo 'false';
    }
    
}

?>
