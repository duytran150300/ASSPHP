<?php
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/vendor/autoload.php";

use App\Models\ProductModel;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\AccountController;
use App\Controllers\CategoryController;

$router = new Router();
Router::get('/home', [HomeController::class, 'index']);
Router::get('/productsByCategory', [HomeController::class, 'productsByCategory']);
Router::get('/detail', [HomeController::class, 'detail']);
Router::get('/admin/account', [AccountController::class, 'lists']);
Router::get('/account/create', [AccountController::class, 'add']);
Router::post('/account/create', [AccountController::class, 'store']);
Router::get('/account/edit', [AccountController::class, 'inforAccount']);
Router::post('/account/edit', [AccountController::class, 'editAccount']);
Router::get('/account/detail', [AccountController::class, 'detailAccount']);
Router::get('/admin/account/delete', [AccountController::class, 'deleteAccount']);
Router::get('/admin/category', [CategoryController::class, 'lists']);
Router::get('/category/create', [CategoryController::class, 'add']);
Router::post('/category/create', [CategoryController::class, 'store']);
Router::get('/category/edit', [CategoryController::class, 'getInfoCategory']);
Router::post('/category/edit', [CategoryController::class, 'updateCategory']);
Router::get('/admin/category/delete', [CategoryController::class, 'deleteCategory']);

$router->resolve();
