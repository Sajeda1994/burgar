<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\drink;
use App\Http\Requests\StoredrinkRequest;
use App\Http\Requests\UpdatedrinkRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as Alerts;


class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinks = drink::all();
        $categorys = category::all();
        return view('drinks.index', compact('drinks', 'categorys'));
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
    public function store(StoredrinkRequest $request)
    {
        try {
            $filename = "";
            if (!file_exists(public_path('\drinkphoto'))) {
                mkdir(public_path('\drinkphoto/'));
            }
            if (!file_exists(public_path('drinkphoto\thumb'))) {
                mkdir(public_path('\drinkphoto\thumb/'));
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = Str::random(7) . '.' . $extention;
                $largefile = Image::make($file)->resize(400, 400);
                $thumbfile = Image::make($file)->resize(40, 40);
                $largefile->Save(public_path('\drinkphoto') . $filename, 80);
                $thumbfile->save(public_path('\drinkphoto\thumb') . $filename, 80);

            }

            drink::create([
                'name' => ['ar' => $request->namear, 'en' => $request->nameen],
                'description' => ['ar' => $request->descar, 'en' => $request->descen],
                'price' => $request->price,
                'status' => $request->status,
                'category_id' => $request->category,
                'image' => $filename,
            ]);
            Alerts::success('Done', 'The Drink is added');
            return redirect()->route('drink.index');
        } catch (\Throwable $th) {
            Alerts::error('Error', 'The drink does not add');
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(drink $drink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedrinkRequest $request, drink $drink)
    {
        try {
            $filename = "";
            if (!file_exists(public_path('\drinkphoto'))) {
                mkdir(public_path('\drinkphoto/'));
            }
            if (!file_exists(public_path('drinkphoto\thumb'))) {
                mkdir(public_path('\drinkphoto\thumb/'));
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = Str::random(7) . '.' . $extention;
                $largefile = Image::make($file)->resize(400, 400);
                $thumbfile = Image::make($file)->resize(40, 40);
                $largefile->Save(public_path('\drinkphoto') . $filename, 80);
                $thumbfile->save(public_path('\drinkphoto\thumb') . $filename, 80);
                drink::where('id', $request->editdrink)->update([
                    'image' => $filename,

                ]);

                drink::where('id', $request->editdrink)->update([
                    'name' => ['ar' => $request->namear, 'en' => $request->nameen],
                    'description' => ['ar' => $request->descar, 'en' => $request->descen],
                    'price' => $request->price,
                    'status' => $request->status,
                    'category_id' => $request->category,
                ]);

                Alerts::success('Done', 'The Drink is updated');
                return redirect()->route('drink.index');


            }
        } catch (\Throwable $th) {
            Alerts::error('Error', 'The drink does not update');
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, drink $drink)
    {
        try {
            drink::where('id', $request->deletedrink)->delete();
            Alerts::success('Done', 'The drink is deleted');
            return redirect()->route('drink.index');
        } catch (\Throwable $th) {
            Alerts::error('Error', 'The drink does not delete');
            return redirect()->route('drink.index');
        }
    }
}
