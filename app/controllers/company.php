<?php
/**
 * Description of company
 *
 * @author Mtcy
 */
class company extends controller {
    
    public function banner() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
       
        $this->content("banner");
    }
    
    public function banner_json() {
        $b_obj = $this->banner_load();
        
        foreach($b_obj->banners as $banner){ //get an array which has the names of all the files and loop through it 
            $obj['name'] = $banner; //get the filename in array
            $obj['size'] = filesize(DOC_ROOT.LIBS."banners/$banner"); //get the flesize in array
            $result[] = $obj; // copy it to another array
        }
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    
    
    public function banner_upload() {
 
        $storeFolder = 'banners/';

        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];            

            $targetPath = DOC_ROOT.LIBS.$storeFolder; 
            $ext = explode('.', $_FILES['file']['name']);
            $ext = $ext[count($ext)-1];
            $filename = $_FILES['file']['name'];
            $allowed_ext = array("jpeg", "jpg", "png", "gif");
            //$allowed_mime = array('image/jpeg', 'image/png', 'image/gif');
            
            $operation = false;
            
            //$mime = mime_content_type($filename);
            if (in_array(strtolower($ext), $allowed_ext)) {
                
                if ($_FILES['file']['size'] <= (2 * 1024 * 1024)) { // 2mb max
                    $targetFile =  $targetPath.$filename;

                    $obj = $this->banner_load();
                    $banners = null;

                    if ($obj != null && count($obj->banners)>0) {
                        if (count($obj->banners) < 5) { // 5 banners max
                            if (!in_array($filename, $obj->banners)) {
                                $banners = $obj->banners;
                                $banners[] = $filename;
                                $banners = array("banners"=>$banners);
                                $operation = true;
                            }
                        }
                    } else {
                        $banners = array('banners'=>array($filename));
                        $operation = true;
                    }
                }
            
            }
            
            if ($operation) { 
                move_uploaded_file($tempFile,$targetFile);
                $json = json_encode($banners);
                $file = fopen(DOC_ROOT.LIBS.'json/banners.json',"w");
                fwrite($file, $json);
                fclose($file);
            }
        }
    }
    
    public function banner_load() {
        $f = DOC_ROOT.LIBS.'json/banners.json';
        $file = fopen($f, "r");
        $json = fread($file, filesize($f));
        fclose($file);
        $obj = json_decode($json);
        return $obj;
    }
    
    public function banner_delete() {
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = $_POST['name'];
            unlink(DOC_ROOT.LIBS.'banners/'.$name);
            $obj = $this->banner_load();
            $banners = $obj->banners;
            if (in_array($name, $banners)) {
                $index = array_search($name, $banners);
                unset($banners[$index]);
                $result = array("banners"=> array_values($banners));
                $json = json_encode($result);
                $file = fopen(DOC_ROOT.LIBS.'json/banners.json',"w");
                fwrite($file, $json);
                fclose($file);
            }
        }
    }
    
    # load banner image
    public function banner_each($img) {
        DOC_ROOT.LIBS."banners/$banner";
    }
    
    public function about_load() {
        $f = DOC_ROOT.LIBS.'json/about.json';
        $file = fopen($f, "r");
        $json = fread($file, filesize($f));
        fclose($file);
        $about = json_decode($json);
        return $about;
    }
    
    public function about() {
        $role = new role();
        $role->isRole(cookie::get("id"), Constant::Admin);
        $about = $this->about_load();
        viewbag("about", $about->about);
        
        $this->content("about");
    }
    
    public function about_process() {
        if (isset($_POST['about']) && !empty($_POST['about'])) {
            $about = $_POST['about'];
            $about = json_encode(array('about'=>$about));
            $file = fopen(DOC_ROOT.LIBS.'json/about.json',"w");
            fwrite($file, $about);
            fclose($file);
            
            $this->redirect('about');
        }
    }
    
}

?>
