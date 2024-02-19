<?php
const ROOT_PATH = "http://localhost:3000/";
const ROOT_URI = "/";
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}
// hàm chuyển hướng website 
function redirect($route)
{
    header('Location:' . ROOT_PATH . $route);
}
