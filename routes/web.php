<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\DarkModeController;
use App\Http\Controllers\Backend\ColorSchemeController;

use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\RegionsController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\BoxTypeController;
use App\Http\Controllers\Backend\DistributorSubController;


use App\Http\Controllers\Frontend\FrontendPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::get('change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change.language');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::controller(AuthController::class)->middleware('loggedin')->group(function () {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});

// Route::get('/login-page', [AuthController::class, 'loginView']);
// Route::post('/login', [AuthController::class, 'login']);


Route::controller(FrontendPageController::class)->group(function () {
});

Route::middleware('sessionlogin')->group(function () {
});


Route::get('login-system', [AuthController::class, 'backendLogin'])->name('backendLogin');
Route::get('/login', [FrontendPageController::class, 'loginPage'])->name('loginPage');
Route::get('/', [FrontendPageController::class, 'indexPage'])->name('indexPage');
Route::get('home', [FrontendPageController::class, 'homePage'])->name('homePage');
Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('backend')->group(function () {

        Route::get('/', [BackendPageController::class, 'backendDashboard'])->name('backendDashboard');

        Route::prefix('users')->group(function () {

            Route::get('', [UsersController::class, 'BN_users'])->name('BN_users');
            Route::get('add', [UsersController::class, 'BN_users_add'])->name('BN_users_add');
            Route::post('add-action', [UsersController::class, 'BN_users_add_action'])->name('BN_users_add_action');
            Route::get('edit/{id}', [UsersController::class, 'BN_users_edit'])->name('BN_users_edit');
            Route::post('edit-action', [UsersController::class, 'BN_users_edit_action'])->name('BN_users_edit_action');
        });

        Route::prefix('products')->group(function () {

            Route::get('', [ProductsController::class, 'products'])->name('products');
            Route::get('add', [ProductsController::class, 'products_add'])->name('products_add');
            Route::post('add-action', [ProductsController::class, 'products_add_action'])->name('products_add_action');
            Route::get('edit/{id}', [ProductsController::class, 'products_edit'])->name('products_edit');
            Route::post('edit-action', [ProductsController::class, 'products_edit_action'])->name('products_edit_action');
        });


        Route::prefix('regions')->group(function () {
            Route::get('', [RegionsController::class, 'regions'])->name('regions');
            Route::get('add', [RegionsController::class, 'regions_add'])->name('regions_add');
            Route::post('add-action', [RegionsController::class, 'regions_add_action'])->name('regions_add_action');
            Route::get('edit/{id}', [RegionsController::class, 'regions_edit'])->name('regions_edit');
            Route::post('edit-action', [RegionsController::class, 'regions_edit_action'])->name('regions_edit_action');
        });

        Route::prefix('unit')->group(function () {
            Route::get('', [UnitController::class, 'unit'])->name('unit');
            Route::get('add', [UnitController::class, 'unit_add'])->name('unit_add');
            Route::post('add-action', [UnitController::class, 'unit_add_action'])->name('unit_add_action');
            Route::get('edit/{id}', [UnitController::class, 'unit_edit'])->name('unit_edit');
            Route::post('edit-action', [UnitController::class, 'unit_edit_action'])->name('unit_edit_action');
        });

        Route::prefix('box_type')->group(function () {
            Route::get('', [BoxTypeController::class, 'box_type'])->name('box_type');
            Route::get('add', [BoxTypeController::class, 'box_type_add'])->name('box_type_add');
            Route::post('add-action', [BoxTypeController::class, 'box_type_add_action'])->name('box_type_add_action');
            Route::get('edit/{id}', [BoxTypeController::class, 'box_type_edit'])->name('box_type_edit');
            Route::post('edit-action', [BoxTypeController::class, 'box_type_edit_action'])->name('box_type_edit_action');
        });

        Route::prefix('distributor_sub')->group(function () {
            Route::get('', [DistributorSubController::class, 'distributor_sub'])->name('distributor_sub');
            Route::get('add', [DistributorSubController::class, 'distributor_sub_add'])->name('distributor_sub_add');
            Route::post('add-action', [DistributorSubController::class, 'distributor_sub_add_action'])->name('distributor_sub_add_action');
            Route::get('edit/{id}', [DistributorSubController::class, 'distributor_sub_edit'])->name('distributor_sub_edit');
            Route::post('edit-action', [DistributorSubController::class, 'distributor_sub_edit_action'])->name('distributor_sub_edit_action');
        });


        Route::prefix('settings')->group(function () {
            Route::get('', [BackendPageController::class, 'BN_settings'])->name('BN_settings');
        });
    });
});
