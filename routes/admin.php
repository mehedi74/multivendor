<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\superadmin\SuperAdminController;
use App\Http\Controllers\vendor\VendorController;
use App\Http\Controllers\admin\ProductController;


Route::prefix('/admin')->namespace('App\Http\Controllers\admin')->group(function () {

    //admin login...
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login'])->name('admin.login');

    Route::middleware('all.admin.check')->group(function () {

        //Request for all type of admin...
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.home');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('error', [AdminController::class, 'error'])->name('admin.error');

        //admins/sub-admins/super-admin/vendor all can see vendor details in same route and page ...
        Route::get('/vendor-details{id}', [AdminController::class, 'vendorDetails'])->name('admin.view.vendor.details');

        //update all admin password....
        Route::match(['get', 'post'], 'update/password', [AdminController::class, 'updatePassword'])->name('admin.update.password');
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword'])->name('admin.check-current-password');

        //super-admin/admin/sub-admin can access all module if provide  request option using  these....
        Route::prefix('/section')->controller(SectionController::class)->group(function () {
            Route::match(['get', 'post'], '/create', 'create')->name('section.create');
            Route::get('/', 'index')->name('section.index');
            Route::match(['get', 'post'], '/edit{id}', 'edit')->name('section.edit');
            Route::get('/update/status{id}', 'updateStatus')->name('section.update.status');
            Route::get('/delete{id}', 'delete')->name('section.delete');

        });

        Route::prefix('/category')->controller(CategoryController::class)->group(function () {
            Route::match(['get', 'post'], '/create', 'create')->name('category.create');
            Route::get('/', 'index')->name('categories.index');
            Route::match(['get', 'post'], '/edit{id}', 'edit')->name('category.edit');
            Route::get('/update/status{id}', 'updateStatus')->name('category.update.status');
            Route::get('/delete{id}', 'delete')->name('category.delete');

        });

        Route::prefix('/sub-category')->controller(SubCategoryController::class)->group(function () {
            Route::post('/select/category', 'selectCategory')->name('select-all-category');
            Route::match(['get', 'post'], '/create', 'create')->name('sub-category.create');
            Route::get('/', 'index')->name('sub-categories.index');
            Route::match(['get', 'post'], '/edit{id}', 'edit')->name('sub-category.edit');
            Route::get('/update/status{id}', 'updateStatus')->name('sub-category.update.status');
            Route::get('/delete{id}', 'delete')->name('sub-category.delete');

        });

        Route::prefix('/brand')->controller(BrandController::class)->group(function () {
            Route::match(['get', 'post'], '/create', 'create')->name('brand.create');
            Route::get('/', 'index')->name('brand.index');
            Route::match(['get', 'post'], '/edit{id}', 'edit')->name('brand.edit');
            Route::get('/status/update{id}', 'statusUpdate')->name('brand.status.update');
            Route::get('/delete{id}', 'delete')->name('brand.delete');

        });

        Route::prefix('/product')->controller(ProductController::class)->group(function () {
            Route::match(['get', 'post'], '/create', 'create')->name('product.create');
            Route::post('/check-section', 'sectionCheck')->name('product.check-current-section');
            Route::get('/', 'index')->name('product.index');
//            Route::match(['get', 'post'], '/edit{id}', 'edit')->name('brand.edit');
            Route::get('/status/update{id}', 'statusUpdate')->name('product.update.status');
            Route::get('/delete{id}', 'delete')->name('product.delete');

        });

        //Super admin can make these request only ...
        Route::middleware('super_admin.check')->group(function () {
            Route::match(['get', 'post'], 'update/details', [SuperAdminController::class, 'updateDetails'])->name('admin.update.details');

            //view admins/sub-admins/customer/summery...
            Route::get('/{slug}-overview', [SuperAdminController::class, 'adminManagement'])->name('superadmin.view.admin');

            //update admin status(giving approval)...
            Route::get('/update/status{id}', [SuperAdminController::class, 'updateAdminStatus'])->name('admin.update.status');
            Route::get('/delete{id}', [SuperAdminController::class, 'deleteAdmin'])->name('admin.delete');
        });

        //Vendor admin can make these request only ...
        Route::middleware('vendor.check')->group(function () {
            Route::match(['get', 'post'], 'update/vendor/{slug}/details/', [VendorController::class, 'updateVendorDetails'])->name('admin.update.vendor.details');
        });

    });

});
