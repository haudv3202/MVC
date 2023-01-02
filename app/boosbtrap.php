<?php
//config
require_once 'config/Config.php';

//auto require_once vào
spl_autoload_register(function($className){
    require_once('libraries/' . $className . '.php');
});
function dd($msg) {
    if(is_array($msg)){
            echo '<div style="background-color:#000000;color:#0FEF4C;padding:10px;margin-top:10px;">';
            echo "<pre>";
            print_r($msg);
            echo '</div>';
    }else {
        echo <<<END
        <div style="background-color:#000000;color:gold;padding:10px;margin-top:10px;">$msg</div>
END;
    }

    exit;
}


?>