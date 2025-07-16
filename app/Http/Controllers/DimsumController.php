<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class DimsumController extends Controller
{
    public function dimsum()
{
    
    $menus = Menu::all(); // Gantilah dengan nama jamak lebih deskriptif
    return view('dimsum', compact('menus'));
}

}
