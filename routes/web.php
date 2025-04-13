<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\AdminControl;

Route::get('/',[Admincontroller::class, 'homepage']);

Route::get('/home',[Admincontroller::class,'index'])->name('home');

Route::get('/post_page',[AdminControl::class, 'post_page']);

Route::post('/add_post',[AdminControl::class, 'add_post']);

Route::get('/show_post',[AdminControl::class,'show_post']);

Route::get('/delete_post/{id}',[AdminControl::class,'delete_post']);

Route::get('/edit_page/{id}',[AdminControl::class,'edit_page']);

Route::post('/update_post/{id}',[AdminControl::class,'update_post']);

Route::get('/post_details/{id}',[Admincontroller::class,'post_details']);
