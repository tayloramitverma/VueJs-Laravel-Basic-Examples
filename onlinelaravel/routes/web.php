<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//User Routes
Route::get("/User/","UserController@index");
Route::get("/User/list_user","UserController@list_user");
Route::post("/User/add_user","UserController@add_user");

//Site Routes
Route::get("/Site/","SiteController@index");
Route::post("/Site/add_site/","SiteController@add_site");
Route::post("/Site/update_site/","SiteController@update_site");
Route::get("/Site/list_site","SiteController@list_site");
Route::get("/Site/edit_site/{id}","SiteController@edit_site");
Route::get("/Site/delete_site/{id}","SiteController@delete_site");
Route::get("/Site/get_all_sites/","SiteController@fetch_all_site");

//Material Unit Routes
Route::get("/Materialunit/","MaterialunitController@index");
Route::post("/Materialunit/add_material_unit","MaterialunitController@add_material_unit");
Route::post("/Materialunit/update_material_unit","MaterialunitController@update_material_unit");
Route::get("/Materialunit/list_material_unit","MaterialunitController@list_material_unit");
Route::get("/Materialunit/edit_material_unit/{id}","MaterialunitController@edit_material_unit");
Route::get("/Materialunit/delete_material_unit/{id}","MaterialunitController@delete_material_unit");
Route::get("/Materialunit/get_all_materialunits/","MaterialunitController@get_all_materialunits");

//Category Routes
Route::get("/Category/","CategoryController@index");
Route::post("/Category/add_category","CategoryController@add_category");
Route::get("/Category/list_category","CategoryController@list_category");
Route::get("/Category/edit_category/{id}","CategoryController@edit_category");
Route::post("/Category/update_category","CategoryController@update_category");
Route::get("/Category/delete_category/{id}","CategoryController@delete_category");

//Vendor Routes
Route::get("/Vendor/","VendorController@index");
Route::post("/Vendor/add_vendor","VendorController@add_vendor");
Route::post("/Vendor/update_vendor","VendorController@update_vendor");
Route::get("/Vendor/list_vendor","VendorController@list_vendor");
Route::get("/Vendor/edit_vendor/{id}","VendorController@edit_vendor");
Route::get("/Vendor/delete_vendor/{id}","VendorController@delete_vendor");
Route::get("/Vendor/assign_site/{id}","VendorController@assign_site");
Route::post("/Vendor/do_site_assign/","VendorController@do_site_assign");


//Item Routes
Route::get("/Item/","ItemController@index");
Route::post("/Item/add_item","ItemController@add_item");
Route::get("/Item/list_item","ItemController@list_item");
Route::get("/Item/edit_item/{id}","ItemController@edit_item");
Route::post("/Item/update_item/","ItemController@update_item");
Route::get("/Item/delete_item/{id}","ItemController@delete_item");
Route::get("/Item/get_all_materials/","ItemController@get_all_materials");

//MR Routes
Route::get("/Mr/","MrController@index");
Route::get("/Mr/getSiteDetails/","MrController@getSiteDetails");
Route::post("/Mr/add_mr/","MrController@add_mr");
Route::get("/Mr/list_mr/","MrController@list_mr");
Route::get("/Mr/edit_mr/{id}","MrController@edit_mr");
Route::post("/Mr/update_mr/","MrController@update_mr");
Route::get("/Mr/delete_mr/{id}","MrController@delete_mr");

Route::get("dashboard","DashboardController@dashboard");