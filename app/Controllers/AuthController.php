<?php

namespace App\Controllers;

use App\Models\AccountModel;



class AuthController extends BaseController
{
    public function getLogin()
    {
        return $this->view(
            "auth/login"
        );
    }

    public function getRegister()
    {
        return $this->view(
            "auth/register"
        );
    }
    public function login()
    {
        $data = $_POST;
        unset($data['g-recaptcha-response']);
        $accounts = AccountModel::all();
        $isLoginValid = false;
        foreach ($accounts as $account) {
            if (($account->username === $data['username'] || ($account->email === $data['username'])) && $account->password === $data['password']) {
                $isLoginValid = true;
                break;
            }
        }
        if ($isLoginValid) {
            $getAccount = AccountModel::findByUserName($data['username']);
            $_SESSION['account'] = $getAccount;
            if ($_SESSION['account']->role === 1) {

                redirect("admin/account");
                die;
            } else {
                redirect("home");
                die;
            }
        } else {
            echo "Đăng nhập không hợp lệ!";
        }
    }
    public function register()
    {


        $data = $_POST;
        // $accounts = AccountModel::where($data['username']);
        unset($data['g-recaptcha-response']);

        $isAccount = true;
        if (isset($accounts) > 1) {
            $isAccount = false;
        }
        if ($isAccount) {
            AccountModel::insert($data);
            if ($data['role'] === 1) {

                redirect("admin");
                die;
            } else {
                redirect("home");
                die;
            }
        }
    }
    public function getForgotPassword()
    {
        return $this->view(
            "auth/forgot-password"
        );
    }
    public function forgotPassword()
    {
        $data = $_POST;
        $errors = [];
        $result = [];
        if ($data['old-password'] === $data['new-password']) {
            $errors['password'] = "Mật khẩu mới phải khác mật khẩu cũ";
        }

        if ($data['new-password'] !== $data['password']) {
            $errors['password'] = "Mật khẩu nhập lại không khớp";
        }

        // Kiểm tra xem có lỗi hay không
        if (count($errors) > 0) {
            // Có lỗi xảy ra, hiển thị các thông báo lỗi
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            return;
        }

        $accounts = AccountModel::all();
        $getAccount = AccountModel::findBySomeThing($data['email']);

        $isLoginValid = false;

        foreach ($accounts as $account) {
            if ($account->email === $data['email'] && $account->username === $data['username']) {
                $isLoginValid = true;
                break;
            }
        }
        $id = $getAccount->id_user;
        $password = $data['password'];
        $elementsToRemove = [$data['old-password'], $data['new-password'], $data['g-recaptcha-response']];
        $result = array_diff($data, $elementsToRemove);
        $result['password'] = $password;
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        if ($isLoginValid) {
            AccountModel::update($result, $id);
            redirect("login");
            die;
        } else {
            echo "Thông tin đăng nhập không hợp lệ!";
        }
    }
}
