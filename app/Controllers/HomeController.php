<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BlogModel;

class HomeController extends BaseController
{
    function checkLogin()
    {

        if (isset($_SESSION['account'])) {
            // Đã đăng nhập
            if ($_SESSION['account'] === 1) {

                redirect("admin");
                die;
            } else {
                redirect("home");
                die;
            }
        } else {
            // Chưa đăng nhập
            redirect("login");;
            exit();
        }
    }
    public function index()
    {
        $products = ProductModel::all();
        $categories = CategoryModel::all();

        return $this->view(
            "client/home/index",
            [
                'products' => $products,
                'categories' => $categories,
            ]
        );
    }
    public function productsByCategory()
    {
        $products = ProductModel::all();
        $categories = CategoryModel::all();
        $productsByCategory = [];
        foreach ($categories as $category) {
            // Lấy tất cả sản phẩm có id_category trùng khớp với id của danh mục hiện tại
            $productsByCategory[$category->id] = ProductModel::where('id_category', '=', $category->id)->get();
        }
        return $this->view(
            "client/products/productsByCategory",
            [
                'productsByCategory' => $productsByCategory
            ]
        );
    }
    public function detail()
    {
        $id = $_GET['id'];
        $product = ProductModel::find($id);
        return $this->view("client/products/product/detail", ['product' => $product]);
    }
    public function blog()
    {
        // $id = $_GET['id'];
        $blogs = BlogModel::all();
        // $blogDetail = BlogModel::getCategories();

        return $this->view("client/blog/blog", ['blogs' => $blogs]);
    }
}
