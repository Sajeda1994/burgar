@extends('outherpages.landoutherpage')
@section('bodysection')
<div class="container">
            <div class="heading_container" style="align-items:center; !important">
                <h2>
                    {{__('trans.Book A Table')}}
                </h2>
            </div>
            <div class="row ">

                <div class="form_container ">
                    <form action="{{route('table.store')}}" method="post">
                        @csrf
                        <div>

                            <input type="text" name="yourname" class="form-control text-center"
                                placeholder="{{__('trans.Your Name')}}" />
                        </div>
                        <div>
                            <input type="text" name="phone" class="form-control text-center"
                                placeholder="{{__('trans.Phone Number')}}" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control text-center"
                                placeholder="{{__('trans.Your Email')}}" />
                        </div>
                        <div>
                            <input type="number" name="person" class="form-control text-center"
                                placeholder="{{__('trans.How Many Person?')}}">
                        </div>
                        <div class="text-center">
                            <label for="" class="label-form">{{__('trans.Date&Time The Book')}}</label>
                            <input type="datetime-local" class="form-control text-center" name="datebook" id="">

                        </div>
                        <div class="row" style="align-items:center; !important">
                            <div class="btn_box " >
                                <button>
                                    {{__('trans.Book Now')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
 @endsection