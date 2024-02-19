<?php

namespace App\Controllers;

use App\Models\AccountModel;

class AccountController extends BaseController
{
    public function lists()
    {
        $users = AccountModel::all();
        $message = $_COOKIE['message'] ?? '';

        return $this->view("admin/account/list", ['users' => $users, "message" => $message]);
    }
    public function add()
    {
        $users = AccountModel::all();
        $message = $_COOKIE['message'] ?? '';

        return $this->view(
            "admin/account/create",
            ['users' => $users, "message" => $message]
        );
    }
    public function store()
    {
        $data = $_POST;
        $file = $_FILES['image'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/users/" . $image);
        $data['avatar'] = $image;
        AccountModel::insert($data);
        setcookie("message", "Thêm dữ liệu thành công", time() + 2);

        header('Location: ' . ROOT_PATH);
        die;
    }

    public function inforAccount()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $user = AccountModel::find((int)$id);
        $message = $_COOKIE['message'] ?? '';

        return $this->view(
            "admin/account/edit",
            ['user' => $user, "message" => $message]
        );
    }
    public function editAccount()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $data = $_POST;
        $file = $_FILES['image'];

        // Xử lý tệp tin hình ảnh
        if ($file['name']) {
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/users/" . $image);
        } else {
            $oldImage = AccountModel::find($id)->avatar;
            $image = $oldImage ?? '';
        }

        $data['avatar'] = $image;
        var_dump($id);
        AccountModel::update($data, $id);
        setcookie("message", "Cập nhật dữ liệu thành công", time() + 2);

        redirect("");
        // header('Location: ' . ROOT_PATH . "admin/account");
        die;
    }
    public function detailAccount()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $account = AccountModel::find((int)$id);
        return $this->view(
            "admin/account/detail",
            ['account' => $account]
        );
    }
    public function deleteAccount()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            AccountModel::delete((int)$id);
            setcookie("message", "Cập nhật dữ liệu thành công", time() + 2);
        }
        header('Location: ' . ROOT_PATH . "admin/account");
        die;
    }
}
