<?php
use App\Http\Controllers\InventoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//category
Route::get('/inventori', [InventoriController::class, 'dashboardInventori'])->name('inventoriDashboard');
Route::get('/inventori/category', [InventoriController::class, 'showcategory'])->name('inventoriCategory');
Route::post('/inventori/category', [InventoriController::class, 'storecategory'])->name('inventoriCategoryStore');
Route::get('/inventori/category/edit/{id}', [InventoriController::class, 'editcategory'])->name('inventoriCategoryEdit');
Route::put('/inventori/category/update/{id}', [InventoriController::class, 'updatecategory'])->name('inventoriCategoryUpdate');
Route::delete('/inventori/category/delete/{id}', [InventoriController::class, 'destroycategory'])->name('inventoriCategoryDelete');

//supplier
Route::get('/inventori/supplier', [SupplierController::class, 'showsupplier'])->name('inventoriSupplier');
Route::post('/inventori/supplier', [SupplierController::class, 'storesupplier'])->name('inventoriSupplierStore');
Route::get('/inventori/supplier/edit/{id}', [SupplierController::class, 'editsupplier'])->name('inventoriSupplierEdit');
Route::put('/inventori/supplier/update/{id}', [SupplierController::class, 'updatesupplier'])->name('inventoriSupplierUpdate');
Route::delete('/inventori/supplier/delete/{id}', [SupplierController::class, 'destroysupplier'])->name('inventoriSupplierDelete');

//item
Route::get('/inventori/urgentStock', [InventoriController::class, 'showUrgentStock'])->name('inventoriUrgentStock');
Route::get('/inventori/item', [ItemController::class, 'showitem'])->name('inventoriItem');
Route::post('/inventori/item', [ItemController::class, 'storeitem'])->name('inventoriItemStore');
Route::get('/inventori/item/edit/{id}', [ItemController::class, 'edititem'])->name('inventoriItemEdit');
Route::put('/inventori/item/update/{id}', [ItemController::class, 'updateitem'])->name('inventoriItemUpdate');
Route::delete('/inventori/item/delete/{id}', [ItemController::class, 'destroyitem'])->name('inventoriItemDelete');
