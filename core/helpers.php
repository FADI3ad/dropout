<?php





function view(string $view)
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