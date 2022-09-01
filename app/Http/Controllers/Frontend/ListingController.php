<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ListingController extends Controller
{
    public function index(Request $request)
    {
        $ads = Ad::latest();
        $categories = Category::select(['id', 'name'])->get();


        if ($request->filled('purpose')) {
                $ads->where('purpose', $request->purpose);
        }

        if(!empty($request->category)) {
            $ads = $ads->where('cate_id', $request->category);
        }

        if(!empty($request->selling_price)) {
            if($request->selling_price == '500000+') {
                $ads = $ads->where('selling_price', '>', 500000);
            }
            elseif($request->selling_price == '500000') {
                $ads = $ads->where('selling_price', '>', 400000)->where('selling_price', '<=', 500000);
            }
            elseif($request->selling_price == '400000') {
                $ads = $ads->where('selling_price', '>', 300000)->where('selling_price', '<=', 400000);
            }
            elseif($request->selling_price == '300000') {
                $ads = $ads->where('selling_price', '>', 200000)->where('selling_price', '<=', 300000);
            }
            elseif($request->selling_price == '200000') {
                $ads = $ads->where('selling_price', '>', 100000)->where('selling_price', '<=', 200000);
            }
            else {
                $ads = $ads->where('selling_price', '>', 0)->where('selling_price', '<=', 100000);
            }
        }

        if ($request->filled('bedrooms')) {
            $ads->where('bedrooms', $request->bedrooms);
        }
        if ($request->filled('bathrooms')) {
            $ads->where('bathrooms', $request->bathrooms);
        }

        $ads = $ads->paginate(10);

        return view('frontend.listing', ['ads' => $ads, 'categories' => $categories,]);
    }



    public function sort(Request $request)
    {
        $ads = Ad::whereNotNull('title');

        if ($request->sortBy){
            switch(request('sortBy')) {
                case 'oldtonew':
                    $ads->orderby('created_at');
                    break;
                case 'newtoold':
                    $ads->orderby('created_at', 'desc');
                    break;
                case 'lowtohigh':
                    $ads->orderby('selling_price');
                    break;
                case 'hightolow':
                    $ads->orderby('selling_price', 'desc');
                    break;
            }
        }else{
            $ads = $ads->orderBy('id', 'desc');
        }

        $ads = $ads->get();

        return view('frontend.listing', compact('ads'));
    }
}
