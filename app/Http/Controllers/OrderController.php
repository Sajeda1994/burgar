<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=order::with(['meal','user'])->get();
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
  
    public function create(Request $order)
    {

        $macadd = Str::substr(shell_exec('getmac'), 159, 20);
        $exorder = order::where('user_mac', $macadd)->with(['meal'])->first();
        $QTY = 0;
      // return $exorder;
     try {
           
        if ($exorder) {
            foreach ($exorder->meal as $meal) {
                if ($meal->id == $order->m_id) {
                    $QTY = $meal->pivot->Quantity + $order->qty;
                    $exorder->meal()->syncwithpivotvalues($order->m_id, ['Quantity' => $QTY]);
                } else {
                    $exorder->meal()->attach($order->m_id, array('Quantity' => $order->qty));
                }
            }

        } else {
           $neworder = new order();
             $neworder->user_mac = $macadd;
            $neworder->user_id = Auth::user()->id ?? null;
               $neworder->location='Irbid';
           $neworder->save();
          //return json_decode('done');

        }
      
         $currentorder = order::where('user_mac', $macadd)->with(['meal'])->first();
         //return $currentorder->meal->count();
         return json_encode($currentorder->meal->count());
     } catch (\Throwable $th) {
       return $th->getMessage();
     }
       
        
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreorderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orderdetails=order::where('id',$id)->with('meal')->first();
        return view('/order.viewdetailsforadmin',compact('orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }

    public function getorderdetails(){
        $macadd = Str::substr(shell_exec('getmac'), 159, 20);
        $exorder = order::where('user_mac', $macadd)->with(['meal'])->first();

        if($exorder){
            $count=$exorder->meal->count();
            return view('order.orderdetailsforuser',compact('count','exorder'));
        }else{
            $count=0;
            return view('order.orderdetailsforuser',compact('count','exorder'));

        }
    }


}
