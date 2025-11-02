<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Can;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function brands()
    {
        $brands = Brand::all();
        return view('admin.brands', compact('brands'));
    }

    public function cans()
    {
        $cans = Can::all();
        return view('admin.cans', compact('cans'));
    }

    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }
}
