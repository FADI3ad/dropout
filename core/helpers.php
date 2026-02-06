<?php





function view(string $view , $data='',$dataa = [])
{
    if (file_exists(__DIR__ . "/../resources/views/$view")) {
        
        include __DIR__ . "/../resources/views/$view";
    }else{
        echo "no view";
    }
}
function redirect() {
    
}
function to_route(){
    
}

function authCheck(): bool {
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}