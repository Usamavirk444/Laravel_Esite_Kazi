<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminProfile;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\SubSubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;



Route::middleware(['admin:admin'])->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');

});

// Admin Routes
Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfile::class,'profile'])->name('admin.profile');
Route::get('admin/profile/{id}',[AdminProfile::class,'profileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/update/{id}',[AdminProfile::class,'profileUpdate'])->name('admin.profile.update');
Route::get('admin/change-password/{id}',[AdminProfile::class,'changePassword'])->name('admin.change.password');
Route::post('admin/changed-password/{id}',[AdminProfile::class,'storeChangePassword'])->name('admin.changed.password');

// Admin Brands All routes
Route::prefix('brands')->group(function(){

    Route::get('/view',[BrandController::class, 'brandView'])->name('all.brands');
    Route::get('/add',[BrandController::class, 'brandAdd'])->name('brands.add');
    Route::post('/store',[BrandController::class, 'brandStore'])->name('brands.store');
    Route::get('/edit/{id}',[BrandController::class, 'brandEdit'])->name('brands.edit');
    Route::post('/update',[BrandController::class, 'brandUpdate'])->name('brands.update');
    Route::get('/delete/{id}',[BrandController::class, 'brandDelete'])->name('brands.delete');

});

// Admin Category All routes
Route::prefix('category')->group(function(){

    Route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.category');
    Route::get('/add',[CategoryController::class, 'CategoryAdd'])->name('category.add');
    Route::post('/store',[CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete');

});

// Admin Sub Category All routes
Route::prefix('subcategory')->group(function(){

    Route::get('/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::get('/add',[SubCategoryController::class, 'SubCategoryAdd'])->name('subcategory.add');
    Route::post('/store',[SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

});

// Admin Sub Sub Category All routes
Route::prefix('subsubcategory')->group(function(){

    Route::get('/view',[SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/add',[SubSubCategoryController::class, 'SubSubCategoryAdd'])->name('subsubcategory.add');
    Route::post('/store',[SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/edit/{id}',[SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/update',[SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/delete/{id}',[SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
    Route::get('/subcategory/ajax/{category_id}',[SubSubCategoryController::class, 'ajaxCall']);


});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});


// user all routes
Route::get('/', [IndexController::class,'index'])->name('user.home');
Route::get('/user/profile', [IndexController::class,'userProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class,'userProfileUpdate'])->name('user.profile.update');
Route::get('/user/logout', [IndexController::class,'userLogout'])->name('user.logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

