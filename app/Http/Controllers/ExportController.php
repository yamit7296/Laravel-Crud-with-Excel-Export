<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ExportController extends Controller
{
    public function index(){
        return view('export-module.index');
    }
}
