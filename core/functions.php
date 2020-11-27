<?php 

function viewbag($name, $data = null) {
	
	if ($data != null) {
        if (empty($data))
            return false;
		$data = serialize($data);
		$_SESSION[$name] = $data;
	} else {
        if (isset($_SESSION[$name])) {
            $d = unserialize($_SESSION[$name]);
            unset($_SESSION[$name]);
            return $d;
        } 
        return false;
	}
    
    return true;
}

function load_global_js() {
    if (is_array($GLOBALS['js']) && count($GLOBALS['js']) > 0) {
        foreach ($GLOBALS['js'] as $js) {
            echo '<script type="text/javascript" src="'.$js.'" ></script>';
        }
    }
}
	
function load_global_css() {
    if (is_array($GLOBALS['css']) && count($GLOBALS['css']) > 0) {
        foreach ($GLOBALS['css'] as $css) {
            echo '<style type="text/css" rel="stylsheet" href="'.$css.'" />';
        }
    }
}

function load_file($file) {
    $path = DOC_ROOT.ROOT.'app/views/'.$file;
    if (file_exists($path))
        require $path;
}

function url($url) {
    global $obj;
    global $page;
    if ($obj != null && $page != null) {
        return "../$url";
    }
    return $url;
}

?>