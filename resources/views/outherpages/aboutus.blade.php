@extends('outherpages.landoutherpage')
@section('bodysection')
<div class="container">
            <div class="heading_container">
                <h2>
                {{__('trans. About Us')}}
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6 " >
                    <h5>{{__('trans.We are aresturant we prepare fast food such as:pasta,burgar,appetizers and drinks cold and hot drinks.our restaurant estabilished since 1994')}}</h5>
                    <h5>{{__('trans.you can book a table until our website when you was in your house and come at the time')}}</h5>
                    <h5>{{__('trans.We have delivery')}}</h5>
                    <h5>{{__('trans.Our website:www.pasta_burgar.com')}}</h5>
                    <h5>{{__('trans.Our Phone:+962770000000')}}</h5>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection