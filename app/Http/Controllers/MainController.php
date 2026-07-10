<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Blog;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Models\MasterCategory;
use App\Models\SectionOneHeading;

class MainController extends Controller
{
    public function home()
    {

        // $masters = MasterCategory::get();

        $categories = Category::get();
        $section_one = LandingPage::get();
        $addresses = Address::get();
        $abouts = LandingPage::get();
        $heading = SectionOneHeading::first();
        return view('index', compact('categories','section_one','addresses','abouts','heading'));
    }
    public function aboutFone(){

        return view('frontend.about_fone.index');
    }
    public function faq(){

        return view('frontend.faq.index');
    }
    public function lifeBlood(){

        return view('frontend.life_blood.index');
    }
    public function battery(){

        return view('frontend.battery.index');
    }
    public function blogs(){
        $blogs = Blog::get();
        $blogPost = BlogPost::where('id',1)->first();
        return view('frontend.blog.index',compact('blogs','blogPost'));
    }
    public function blogsDetail($id){
        $blog = Blog::where('id', $id)->first();
        return view('frontend.blog.detail',compact('blog'));
    }

}
