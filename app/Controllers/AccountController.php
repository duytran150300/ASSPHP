<?php

namespace App\Controllers;

use App\Models\AccountModel;

class AccountController extends BaseController
{
    public function lists()
    {
        $users = AccountModel::all();
        return $this->view("admin/account/list", ['users' => $users]);
    }
    public function add()
    {
        $users = AccountModel::all();
        return $this->view(
            "admin/account/create",
            ['users' => $users]
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
        header('Location: ' . ROOT_PATH . "admin/account");
        die;
    }

    public function inforAccount()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $user = AccountModel::find((int)$id);
        return $this->view(
            "admin/account/edit",
            ['user' => $user]
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
        header('Location: ' . ROOT_PATH . "admin/account");
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
        }
        header('Location: ' . ROOT_PATH . "admin/account");
        die;
    }
}
