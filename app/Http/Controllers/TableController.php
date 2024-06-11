<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Http\Requests\StoretableRequest;
use App\Http\Requests\UpdatetableRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alerts;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables=table::all();
        return view('table.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretableRequest $request)
    {
        try {
            table::create([
                'username'=>$request->yourname,
                'phonenumber'=>$request->phone,
                'useremail'=>$request->email,
                'numperson'=>$request->person,
                'datebook'=>$request->datebook,
            ]);
            Alerts::success('Done','تم الحجز');
            //  return redirect()->route('');
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetableRequest $request, table $table)
    {
        try {
            table::where('id',$request->editbook)->update([
                'username'=>$request->yourname,
                'phonenumber'=>$request->phone,
                'useremail'=>$request->email,
                'numperson'=>$request->person,
                'datebook'=>$request->datebook,
            ]);
            Alerts::success('Done','Book Table is Update');
            return redirect()->route('table.index');
        } catch (\Throwable $th) {
            Alerts::success('Done','Book Table is Update');
            return redirect()->route('table.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,table $table)
    {
        try {
            table::where('id',$request->deletebook)->delete();
            Alerts::success('Done','Book is deleted');
            return redirect()->route('table.index');
        } catch (\Throwable $th) {
            Alerts::error('Error','Book dose not deleted');
            return $th->getMessage();
        }
    }
}
