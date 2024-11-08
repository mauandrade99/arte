<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CpcrController;
use App\Http\Controllers\SiteController;



 Route::get('/', [SiteController::class,'index'])->name('site.index');

 Route::get('/cpcr/{id}', [SiteController::class,'details'])->name('site.details');


 Route::get('/cpcrUser/{id}', [SiteController::class,'cpcrUser'])->name('site.cpcrUser');
 

