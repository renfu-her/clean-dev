<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SearchController;

route::get('searchApi', [SearchController::class, 'search'])->name('searchApi');
