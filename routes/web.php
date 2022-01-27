<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;

// Route::get('/',[Main::class,'home']);
// Route::get('/about',[Main::class,'about']);
// Route::get('/gallery',[Main::class,'gallery']);
// Route::get('/empp/{id?}',[Main::class,'emp']);
// Route::get("/products/{cat}/{subcat?}",function($catt,$subcatt=null){
//     echo "Category: $catt Subcategory: $subcatt";
// });

Route::get('/adminpanel', function () {
    return view('admin/login');
});

Route::get('/adminpanel/dashboard', [Main::class,'master']);
Route::get('/adminpanel/dashboard/changepass', [Main::class,'changepass']);
Route::get('/adminpanel/dashboard/home', [Main::class,'home']);
Route::get('/adminpanel/dashboard/posts', [Main::class,'posts']);
Route::post('/sendposts', [Main::class,'sendposts']);
Route::get('/adminpanel/dashboard/gallery', [Main::class,'gallery']);