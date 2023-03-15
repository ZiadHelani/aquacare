<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
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
        $image = HomeHeader::first();
        return view('admin.header_image', ['title' => $title, 'image' => $image]);
    }

    public function saveHeaderImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images_home_header', $name);
        $save = new HomeHeader();
        $save->image = $path;
        $save->save();
        return back()->with(['success' => 'Uploaded', 'error' => 'Error']);
    }

    public function aboutUs()
    {
        $about = AboutUs::first();
        // return $about;
        $title = 'About Us';
        return view('admin.about_us', ['title' => $title, 'about' => $about]);
    }

    public function saveAboutUs(Request $request, $id)
    {
        $about = AboutUs::where(['id' => $id])->update([
            'text_en' => $request->texten,
            'text_de' => $request->textar,
        ]);
        if ($about) {
            return back()->with(['success' => 'Updated']);
        } else {
            return back()->with(['error' => 'Error']);
        }
    }
}
