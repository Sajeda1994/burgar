<?php

namespace App\Http\Controllers;

use App\Models\appetizers;
use App\Http\Requests\StoreappetizersRequest;
use App\Http\Requests\UpdateappetizersRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as Alerts;


class AppetizersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appets = appetizers::all();
        $categorys = category::all();
        return view('appetizers.index', compact('appets', 'categorys'));
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






    public function store(StoreappetizersRequest $request)
    {
        try {
            $filename = "";

            if (!file_exists(public_path('\appetphoto'))) {
                mkdir(public_path('\appetphoto/'), 0755);
            }
            if (!file_exists(public_path('\appetphoto\thumb'))) {
                mkdir(public_path('\appetphoto\thumb/'), 0755);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = Str::random(7) . '.' . $ext;
                $largefile = Image::make($file)->resize(400, 400);
                $thumbfile = Image::make($file)->resize(40, 40);
                $largefile->save(public_path('\appetphoto/') . $filename, 80);
                $thumbfile->save(public_path('\appetphoto\thumb/') . $filename, 80);

            }

            appetizers::create([
                'name' => ['ar' => $request->namear, 'en' => $request->nameen],
                'description' => ['ar' => $request->descar, 'en' => $request->descen],
                'price' => $request->price,
                'status' => $request->status,
                'category_id' => $request->category,
                'image' => $filename,
            ]);

            Alerts::success('Done', 'The Appetizers is added');
            return redirect()->route('appetizers.index');


        } catch (\Throwable $th) {
            Alerts::error('error', 'The Meal dose not added');
            return $th->getMessage();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(appetizers $appetizers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(appetizers $appetizers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateappetizersRequest $request, appetizers $appetizers)
    {
        try {
            $filename = "";

            if (!file_exists(public_path('\appetphoto'))) {
                mkdir(public_path('\appetphoto/'), 0755);
            }
            if (!file_exists(public_path('\appetphoto\thumb'))) {
                mkdir(public_path('\appetphoto\thumb/'), 0755);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = Str::random(7) . '.' . $ext;
                $largefile = Image::make($file)->resize(400, 400);
                $thumbfile = Image::make($file)->resize(40, 40);
                $largefile->save(public_path('\appetphoto/') . $filename, 80);
                $thumbfile->save(public_path('\appetphoto\thumb/') . $filename, 80);
                appetizers::where('id',$request->editappet)->update([
                    'image' => $filename,

                ]);

            }

            appetizers::where('id',$request->editappet)->update([
                'name' => ['ar' => $request->namear, 'en' => $request->nameen],
                'description' => ['ar' => $request->descar, 'en' => $request->descen],
                'price' => $request->price,
                'status' => $request->status,
                'category_id' => $request->category,
              
            ]);

            Alerts::success('Done', 'The Appetizers is edit');
            return redirect()->route('appetizers.index');


        } catch (\Throwable $th) {
            Alerts::error('error', 'The Meal dose not edit');
            return $th->getMessage();

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,appetizers $appetizers)
    {
        try {
            appetizers::where('id',$request->deleteappet)->delete();
            Alerts::success('Done','The Appetizers is deleted');
            return redirect()->route('appetizers.index');
        } catch (\Throwable $th) {
            Alerts::error('Error','The Appetizers dose not delete');
            return redirect()->route('appetizers.index');
        }
    }
}
