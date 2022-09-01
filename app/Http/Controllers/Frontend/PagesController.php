<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Image;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index() {

        $featured_ads = Ad::where('featured', '1')->take(6)->get();
        $category = category::all();

        return view('welcome', compact('featured_ads', 'category'));
    }


    public function singlead($id) {

        $category = Category::all();

        $ad = Ad::find($id);

        return view('frontend.single_ad', compact('ad', 'category'));
    }


    public function viewcategory($slug){
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $ads = Ad::where('cate_id', $category->id)->get();
            return view('frontend.ads.index', compact('category', 'ads'));
        }
        else{
            return redirect('/')->with('status', "slug does not exist");
        }
    }

    public function adview($cate_slug, $ad_slug)
    {
        $category = Category::all();

        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Ad::where('slug', $ad_slug)->exists())
            {
                $ad = Ad::where('slug', $ad_slug)->first();

                return view('frontend.ads.view', compact('ad', 'category'));
            }
            else{
                return redirect('/')->with('status', "The link was broken");
            }
        }
        else{
            return redirect('/')->with('status', "No such category found");
        }
    }
}
