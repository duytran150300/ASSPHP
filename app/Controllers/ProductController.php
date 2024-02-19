<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{

    public function list()
    {
        $products = ProductModel::all();
        $categories = CategoryModel::all();
        $message = $_COOKIE['message'] ?? '';
        return $this->view(
            "admin/product/list",
            [
                'products' => $products,
                'categories' => $categories,
                "message" => $message
            ]
        );
    }
    public function add()
    {
        $categories = CategoryModel::all();
        $message = $_COOKIE['message'] ?? '';
        return $this->view(
            "admin/product/add",
            [

                'categories' => $categories,
                "message" => $message
            ]
        );
    }
    public function store()
    {
        $data = $_POST;
        $file = $_FILES['images'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $image);
        $data['images'] = $image;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        ProductModel::insert($data);
        setcookie("message", "Thêm dữ liệu thành công", time() + 2);
        header('Location: ' . ROOT_PATH . "admin/product");
        die;
    }
    public function getProduct()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $product = ProductModel::find((int)$id);
        $categories = CategoryModel::all();
        $message = $_COOKIE['message'] ?? '';
        return $this->view(
            "admin/product/edit",
            [
                'product' => $product,
                "categories" => $categories,
                "message" => $message
            ]
        );
    }
    public function editProduct()
    {
        // if (isset($_GET['id'])) {
        //     $id = $_GET['id'];
        // }
        $data = $_POST;
        $file = $_FILES['images'];

        // Xử lý tệp tin hình ảnh
        if ($file['name']) {
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/" . $image);
        } else {
            $oldImage = ProductModel::find($data['id'])->images;
            $image = $oldImage ?? '';
        }

        $data['images'] = $image;
        setcookie("message", "Cập nhật dữ liệu thành công", time() + 2);

        ProductModel::update($data, $data['id']);
        redirect("product/edit?id=" . $data["id"]);
        die;
    }
    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            setcookie("message", "Cập nhật dữ liệu thành công", time() + 2);
            ProductModel::delete($id);
        }
        redirect("admin/product");
        die;
    }
}
