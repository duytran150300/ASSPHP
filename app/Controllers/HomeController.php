<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class HomeController extends BaseController
{
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
}
