<?php
function camelCase($string, $hackFirst=true)
{
    $string = str_replace(' ', '', ucwords(
        str_replace('_', ' ', $string)
    ));
    if($hackFirst) {
        return preg_replace_callback('/^\w/', function($matches) {
            if(isset($matches[0])) {
                return strtoupper($matches[0]);
            }
        }, $string);
    }
    return $string;
}

function unCamelCase($string)
{
    $string = preg_replace('/\B([A-Z])/', '_$1', $string);
    return strtolower($string);
}
