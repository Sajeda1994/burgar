<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alerts;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys= category::all();
        return view("category.index",compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoryRequest $request)
    {

        try {
          category::create([
            'name'=>["ar"=>$request->namear,"en"=>$request->nameen],
            'description'=>["ar"=>$request->descar,"en"=>$request->descen],
          ]);
         Alerts::Success('Done','category is added');
         return redirect()->route('category.index');

        } catch (\Throwable $th) {
            Alerts::error('error','category dose not added');
           return redirect()->route('category.index');


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
       // return $request;
       try {
        category::where('id',$request->editcategory)->update([
            'name'=>['ar'=>$request->upnamear,'en'=>$request->upnameen],
            'description'=>['ar'=>$request->updescar,'en'=>$request->updescen],
        ]); 
        Alerts::success('Done','Category is edit');         
        return redirect()->route('category.index');

    } catch (\Throwable $th) {
        Alerts::error('error','category dose not edit');
       return redirect()->route('category.index');
       }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,category $category)
    {
        try {
           category::where('id',$request->deletecat)->delete();
           Alerts::success('Done','Category is deleted');
          return redirect()->route('category.index');

        } catch (\Throwable $th) {
           Alerts::error('error','Category dose not delete');
            return $th->getMessage();
        }
    }
}
