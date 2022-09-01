<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('manage-ads')){
            return redirect('dashboard')->with('message',"Access denied!");
        }
        $ads = Ad::all();

        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('admin.ads.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $rules = [
            'cate_id'           => 'required',
            'title'             => 'required',
            'slug'              => 'required',
            'description'       => 'required',
            'selling_price'     => 'required',
            'address'           => 'required',
            'city'              => 'required',
        ];

        $this->validate($request, $rules);

        $ad = new Ad();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext= $file->getClientOriginalName();
            $filename = time().'_'.$ext;

            $request->file('image')->move(public_path(). '/assets/uploads/images/' ,$filename);

            $img = Image::make(public_path().'/assets/uploads/images/' . $filename);
            $img->resize(400,null,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save();
            $ad->image = $filename;
        }

        $ad->cate_id = $request->input('cate_id');
        $ad->title = $request->input('title');
        $ad->slug = $request->input('slug');
        $ad->description = $request->input('description');
        $ad->square_feet = $request->input('square_feet');
        $ad->selling_price = $request->input('selling_price');
        $ad->purpose = $request->input('purpose');
        $ad->bedrooms = $request->input('bedrooms');
        $ad->bathrooms = $request->input('bathrooms');
        $ad->address = $request->input('address');
        $ad->featured = $request->input('featured') == TRUE ? '1':'0';
        $ad->city = $request->input('city');
        $ad->user_id = $user_id;
        $ad->save();

        return redirect('/ads')->with('message',"ad Added Succesfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::find($id);
        $category = category::all();

        return view('admin.ads.show', compact('category', 'ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);
        $category = category::all();
        return view('admin.ads.edit', compact('category', 'ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $ad = Ad::find($id);

        $rules = [
            'cate_id'           => 'required',
            'title'             => 'required',
            'slug'              => 'required',
            'description'       => 'required',
            'selling_price'     => 'required',
            'address'           => 'required',
            'city'              => 'required',
        ];

        $this->validate($request, $rules);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/images/'.$ad->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext= $file->getClientOriginalName();
            $filename = time().'_'.$ext;
            $file->move('assets/uploads/images',$filename);

            $img = Image::make(public_path().'/assets/uploads/images/' . $filename);
            $img->resize(400,null,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save();
            $ad->image = $filename;
        }

        $ad->cate_id = $request->input('cate_id');
        $ad->title = $request->input('title');
        $ad->slug = $request->input('slug');
        $ad->description = $request->input('description');
        $ad->square_feet = $request->input('square_feet');
        $ad->selling_price = $request->input('selling_price');
        $ad->purpose = $request->input('purpose');
        $ad->bedrooms = $request->input('bedrooms');
        $ad->bathrooms = $request->input('bathrooms');
        $ad->address = $request->input('address');
        $ad->featured = $request->input('featured') == TRUE ? '1':'0';
        $ad->city = $request->input('city');
        $ad->user_id = $user_id;
        $ad->update();

        return redirect('/ads')->with('message',"ad Updated Succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::find($id);

        $path = 'assets/uploads/images/'.$ad->image;
        if(File::exists($path))
        {
            File::delete($path);
        }

        $ad->delete();

        return redirect()->back()->with('status','Ad Deleted Succesfully!');
    }

    public function myads(Ad $ad)
    {
        $user = auth()->user();
        $results = Ad::with(['user'])->where('user_id',$user->id);
        $ads = $results->get();

        return view('admin.ads.myads', compact('ads'));
    }
}
