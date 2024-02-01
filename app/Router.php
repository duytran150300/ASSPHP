<?php

namespace App;

class Router
{
    protected static $routes = [];
    public static function  get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }
    public static function  post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }
    // getMethod lấy thông tin của đường dẫn
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    // thực hiện việc điều hướng theo routes
    public function resolve()
    {
        $method = $this->getMethod();
        // lấy đường dẫn trên thanh địa chỉ trình duyệt
        $path = $_SERVER['REQUEST_URI'];
        // làm gọn đường dẫn
        $path = str_replace(ROOT_URI, "/", $path);
        // echo $path;
        // tìm vị trí xuất hiện ? trong $path;
        $position = strpos($path, "?");
        if ($position) {
            $path = substr($path, 0, $position);
        }
        $callback = false;
        // kiểm tra đường dẫn được khai báo chưa
        if (!empty(static::$routes[$method][$path])) {
            $callback = static::$routes[$method][$path];
        }

        if ($callback === false) {
            echo "404 not found";
            die;
        }
        if (is_callable($callback)) {
            return $callback();
        }
        // kiểm tra callback có phải mảng không
        // if (is_array($callback)) {
        //     $callback[0] = new $callback[0];
        //     return call_user_func($callback);
        // }
        if (is_array($callback)) {
            $callback[0] = new $callback[0];
            return call_user_func($callback);
        }
    }
}
