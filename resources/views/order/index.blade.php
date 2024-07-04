@extends('dashboard.dashboard')
@section('dashbody')

<div class="table-responsive">
    <table class="table table-dark table-hover">
        <thead class="">
            <tr>
                <th>{{__('trans.ID')}}</th>
                <th>{{__('trans.UserMac/UserId')}}</th>
                <th>{{__('trans.Location')}}</th>
                <th>{{__('trans.Status')}}</th>
                <th>{{__('trans.Total')}}</th>
                <th>{{__('trans.Operation')}}</th>
            </tr>
        </thead>

        <tbody class="bg-info">
            <?php
$i = 1;
$total = 0;
               ?>



            @foreach ($orders as $order)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->user_id ? $order->user_id : $order->user_mac}}</td>
                    <td>{{$order->location}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('order.show',$order->id)}}"
                           >{{__('trans.ViewrDeatails')}}</a>
                        <button class="btn btn-warning" data-target="#deleteorder-{{$order->id}}"
                            data-toggle="modal">{{__('trans.Delete')}}</button>
                    </td>
                    @include('order.update')
                    @include('order.delete')
                </tr>

            @endforeach
        </tbody>
        @foreach($order->meal as $meal)

                <?php
            $total += $meal->price * $meal->pivot->Quantity;
                ?>
        @endforeach
        <tfoot>
            <td colspan="4">Total</td>
            <td>{{$total}}</td>
        </tfoot>
    </table>
</div>

@endsection