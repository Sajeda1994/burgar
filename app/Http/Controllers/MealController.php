<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\meal;
use App\Http\Requests\StoremealRequest;
use App\Http\Requests\UpdatemealRequest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as Alerts;




class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = category::all();
        $meals = meal::all();
        return view('meal.index', compact('categorys', 'meals'));
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
    public function store(StoremealRequest $request)
    {
        try {
            $filename = "";
            if (!file_exists(public_path('\mealphoto'))) {
                mkdir(public_path('\mealphoto/'), 0755);
            }
            if (!file_exists(public_path('\mealphoto\thumb'))) {
                mkdir(public_path('\mealphoto\thumb/'), 0755);
            }

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = Str::random(7) . '.' . $extention;
                $largefile = Image::make($file)->resize(400, 400);
                $thumbfile = Image::make($file)->resize(40, 40);
                $largefile->save(public_path('\mealphoto/') . $filename, 80);
                $thumbfile->save(public_path('\mealphoto\thumb/') . $filename, 80);

            }

            meal::create([
                'name' => ['ar' => $request->namear, 'en' => $request->nameen],
                'description' => ['ar' => $request->descar, 'en' => $request->descen],
                'price' => $request->price,
                'status' => $request->status,
                'category_id' => $request->category,
                'image' => $filename,
            ]);

            Alerts::success('Done','The Meal is added');
            return redirect()->route('meal.index');
            

        } catch (\Throwable $th) {
           Alerts::error('error','The Meal dose not added');
           return $th->getMessage();
        }

        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemealRequest $request, meal $meal)
    {
        try {
            $filename = "";
            if (!file_exists(public_path('\mealphoto'))) {
                mkdir(public_path('\mealphoto/'), 0755);
            }
            if (!file_exists(public_path('\mealphoto\thumb'))) {
                mkdir(public_path('\mealphoto\thumb/'), 0755);
            }

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = Str::random(7) . '.' . $extention;
                $largefile = Image::make($file)->resize(400, 400);
                $thumbfile = Image::make($file)->resize(40, 40);
                $largefile->save(public_path('\mealphoto/') . $filename, 80);
                $thumbfile->save(public_path('\mealphoto\thumb/') . $filename, 80);
                meal::where('id',$request->editmeal)->update([
                  'image'=>$filename,
            
                ]);

            }

            meal::where('id',$request->editmeal)->update([
                'name'=>['ar'=>$request->upnamear,'en'=>$request->upnameen],
                'description'=>['ar'=>$request->updescar,'en'=>$request->updescen],
                'price'=>$request->upprice,
                'status'=>$request->upstatus,
                'category_id'=>$request->upcategory,

            ]);
            Alerts::success('Done','The Meal is edited');
            return redirect()->route('meal.index');
        } catch (\Throwable $th) {
            Alerts::error('error','The Meal dose not edit');
            return redirect()->route('meal.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,meal $meal)
    {
       try {
       meal::where('id',$request->deletemeal)->Delete();
       Alerts::success('Done','The Meal is deleted');
       return redirect()->route('meal.index');
       } catch (\Throwable $th) {
       Alerts::error('Error','The Meal dose not delete');
       return $th->getMessage();
       }
    }
}
