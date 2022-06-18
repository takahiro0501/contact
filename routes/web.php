<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


//お問い合わせ初期画面
Route::get('/form', [ContactController::class, 'form'])->name('form');

//お問い合わせ「確認」ボタン押下時
Route::post('/comfirm', [ContactController::class, 'comfirm'])->name('comfirm');

//お問い合わせ「送信」ボタン押下時
Route::post('/register', [ContactController::class, 'register'])->name('register');



//管理システム初期画面
Route::get('/admin', [ContactController::class, 'admin'])->name('admin');

//ページネーションがGetなので定義
Route::get('/adminSearch', [ContactController::class, 'adminSearch'])->name('adminSearch');

//「検索」ボタン押下時と、「削除」ボタン押下時
Route::post('/adminSearch', [ContactController::class, 'adminSearch'])->name('adminSearch');

//「リセット」ボタン押下時は、管理システム初期画面へ
Route::get('/admin', [ContactController::class, 'admin'])->name('reset');
