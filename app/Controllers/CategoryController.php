<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function lists()
    {
        $categories = CategoryModel::all();
        return $this->view("admin/category/lists", ['categories' => $categories]);
    }
    public function add()
    {
        $categories = CategoryModel::all();
        return $this->view("admin/category/create", ['categories' => $categories]);
    }
    public function store()
    {
        $data = $_POST;
        $file = $_FILES['thumnail'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/products/" . $image);
        $data['thumnail'] = $image;
        CategoryModel::insert($data);
        header("Location: " . ROOT_PATH . 'admin/category');
        die;
    }
    public function getInfoCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $category = CategoryModel::find($id);
        return $this->view('admin/category/edit', ['category' => $category]);
    }
    public function updateCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $data = $_POST;
        $file = $_FILES['thumnail'];
        if ($file['name']) {
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/products/" . $image);
        } else {
            $oldImage = CategoryModel::find($id)->thumnail;
            $image = $oldImage ?? '';
        }
        $data['thumnail'] = $image;
        CategoryModel::update($data, $id);
        header("Location: " . ROOT_PATH . 'admin/category');
        die;
    }
    public function deleteCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            CategoryModel::delete($id);
        }
        header("Location: " . ROOT_PATH . 'admin/category');
        die;
    }
}
