<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\BlogModel;

class BlogController extends BaseController
{
    public function list()
    {
        $blogs = BlogModel::all();
        $categories = CategoryModel::all();
        $message = $_COOKIE['message'] ?? '';
        return $this->view("admin/blog/lists", ['blogs' => $blogs, 'categories' => $categories, "message" => $message]);
    }
    public function add()
    {
        $blogs = BlogModel::all();
        $categories = CategoryModel::all();
        $message = $_COOKIE['message'] ?? '';

        return $this->view("admin/blog/create", ['blogs' => $blogs, 'categories' => $categories, "message" => $message]);
    }
    public function store()
    {
        $data = $_POST;
        // echo "<pre>";
        // print_r($data);

        // echo "</pre>";
        BlogModel::insert($data);
        setcookie("message", "Thêm dữ liệu thành công", time() + 2);

        header("Location: " . ROOT_PATH);
        die;
    }
    public function getInfoBlog()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $message = $_COOKIE['message'] ?? '';

        $blog = BlogModel::find((int)$id);
        $categories = CategoryModel::all();
        return $this->view(
            "admin/blog/edit",
            ['blog' => $blog, 'categories' => $categories, "message" => $message]
        );
    }
    public function updateBlog()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $data = $_POST;
        BlogModel::update($data, $id);
        setcookie("message", "Cập nhật dữ liệu thành công", time() + 2);

        header("Location: " . ROOT_PATH);
        die;
    }
    public function deleteBlog()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            BlogModel::delete($id);
            setcookie("message", "Xóa dữ liệu thành công", time() + 2);
        }
        header("Location: " . ROOT_PATH . 'admin/blog');
        die;
    }
}
