@extends('outherpages.landoutherpage')
@section('bodysection')


<div class="table-responsive">
    <table class=" table table-dark" id="ordertable">
        <thead>
            <tr>
                <th>'#'</th>
                <th>{{__('trans.Name')}}</th>
                <th>{{__('trans.Description')}}</th>
                <th>{{__('trans.Quantity')}}</th>
                <th>{{__('trans.Price')}} </th>
                <th>{{__('trans.Image')}}</th>
                <th>{{__('trans.Total')}}</th>
            </tr>
        </thead>
        <tbody>
            <?php
$i = 1;
$total = 0; ?>
            @foreach ($exorder->meal as $meal)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->description }}</td>
                    <td>{{ $meal->pivot->Quantity }}</td>
                    <td>{{ $meal->price }}</td>
                    <td>
                        <img class="rounded" src="{{ '\MealPhoto/small/' . $meal->image_link }}" alt="" srcset="">
                    </td>

                    @foreach ($exorder->meal as $meal)
                        <?php        $total = $meal->price * $meal->pivot->Quantity; ?>
                    @endforeach
                    <td>{{ $total = $meal->price * $meal->pivot->Quantity }}</td>


                </tr>
            @endforeach
            <?php $Final_total = 0;

                 ?>

            <tr>

                <td colspan=5 class="text-center">{{__('trans.Final Total')}}</td>
                @foreach ($exorder->meal as $meal)
                                <?php    $total = $meal->price * $meal->pivot->Quantity;
                    $Final_total += $total; ?>
                @endforeach
                <td>{{ $Final_total }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection