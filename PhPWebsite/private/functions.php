<?php 

//Zorgt voor een kortere kortere code - (Haalt de default folder & zorgt ervoor dat het automatisch wordt gelinkt.)
function url_for($script_path) {
    if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

?>