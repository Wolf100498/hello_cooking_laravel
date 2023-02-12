<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroSlideFormRequest;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.heroSlide.index', ['heroslides' => HeroSlide::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $heroslide = new HeroSlide;
        
        if($request->hasFile('heroslide_img')){
            $path = 'uploads/heroslides/'.$heroslide->image;
        if(File::exists($path)){
            File::delete($path);
        }
            $file = $request->file('heroslide_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/heroslides/', $filename);
            $heroslide->image = 'uploads/heroslides/'.$filename;
        }
        $heroslide->save();

        return redirect()->route('heroslide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeroSlide $heroslide)
    {
        $heroslide->delete();
        return redirect()->route('heroslide.index');
    }
}
