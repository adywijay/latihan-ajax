<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Cara1ForAjaxController;
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

Route::prefix('jabatan')->group(

    function () {

        Route::get('/', [BaseController::class, 'index'])->name('Dashboard');
        Route::post('/add', [BaseController::class, 'addJabatan'])->name('addJabatan');
        Route::get('/getlist_jbt', [BaseController::class, 'getJsonJbt']);
        Route::get('/getview_edit/{id}', [BaseController::class, 'getJbtById']);
        Route::put('/editjbt', [BaseController::class, 'updateJbt']);
        Route::delete('/delete_jbt/{id}', [BaseController::class, 'delJbt']);

        /*==================== Function for about ===============================================*/

        Route::get('/abouts', [BaseController::class, 'about']);

        /*==================== Function for roles ===============================================*/
        Route::get('/getroles_all', [BaseController::class, 'indexRoles'])->name('Roles-Dashboard');
        Route::post('/addroles', [BaseController::class, 'addRoles']);
        Route::get('/get_role_view/{id}', [BaseController::class, 'getViewRoleById']);
        Route::get('/get_role_view_edit/{id}', [BaseController::class, 'getRoleById']);
        Route::put('/editrole', [BaseController::class, 'updateRole']);
        Route::delete('/delete_role/{id}', [BaseController::class, 'delRole']);
    }
);