<?php

namespace App\Http\Controllers;

use App\Models\HomeHeader;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'home';
        return view('admin.index', ['title' => $title]);
    }

    public function headerImage()
    {
        $title = 'header image';
        return view('admin.header_image', ['title' => $title]);
    }

    public function saveHeaderImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $save = new HomeHeader();
        $save->name = $name;
        $save->path = $path;

        $save->save();
    }
}
