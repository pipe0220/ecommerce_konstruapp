<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[WelcomeController::class,'index'])->name('welcome.index');

Route::get('families/{family}', [FamilyController::class, 'show'])->name('families.show');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('subcategories/{subcategory}', [SubcategoryController::class, 'show'])->name('subcategories.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); //return ('/')
    })->name('dashboard');
});

/*Route::get('prueba', function () {
    $array1 = ['a', 'b', 'Users/c'];
    $array2 = ['a', 'b', 'c'];
    $array3 = ['a', 'b', 'c'];

    $arrays = [$array1, $array2, $array3];

    $combinaciones = generarCombinaciones($arrays);

    return $combinaciones;

});

function  generarCombinaciones($arrays, $indice = 0, $combinacion = [])

{

    if ($indice == count($arrays)){

        return [$combinacion];

    }

    $resultado= [];

    foreach ($arrays[$indice] as $item){

        $combinacionTemporal = $combinacion;

        $combinacionTemporal[] = $item;

        $resultado = array_merge($resultado, generarCombinaciones($arrays, $indice + 1, $combinacionTemporal));

    }

    return  $resultado;

}*/

