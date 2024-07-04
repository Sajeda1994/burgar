@extends('landing.landingpage')
@section('meals')
<div class="row ">

    @foreach ($meals as $meal)

        <div class="col-4 ">
            <div class="box ">
                <div style="background-color:darkgreen;">
                    <div class="img-box bg-secondary">
                        <img src="{{'\mealphoto/' . $meal->image}}" class="rounded-circle" alt="" srcset="">
                    </div>
                    <div class="detail-box " style="background-color:darkgreen;">
                        <h5>
                            {{$meal->name}}
                        </h5>
                        <p>
                            {{$meal->description}}
                        </p>
                        <div class="options">
                            <div>
                                <h6 class="">
                                    {{$meal->price}}
                                </h6>

                                <span
                                    class="badge rounded-circle mr-2 {{$meal->status == 'available' ? 'text-bg-warning' : 'text-bg-danger'}}">
                                    <h6 class="text-dark">
                                        {{$meal->status}}
                                    </h6>
                                </span>
                            </div>
                            <div>
                                <label for="" class="label-form">{{__('trans.Count')}}</label>
                                <input type="number" name="count" value="1" class="form-control" id="Quantity-{{$meal->id}}">
                            </div>
                            <div>
                               @if ($meal->status=='available')
                               <a href="" onclick="order({{$meal->id}});" >
                                <i  class="fa fa-shopping-cart" style="color:white"></i>

                                </a>

                                @else
                                <btn class="disableal"  >
                                <i  class="fa fa-shopping-cart " style="color:white"></i>

                                </btn>
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endforeach

</div>

@endsection

@section('userscript')
<script>
    function order(id) {
        //console.log(id);
         var qty = $('#Quantity-' + id).val();

        $.ajax({
            url: '/order/create',
            method: "post",
            data: {
                m_id: id,
                qty: qty,
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
             $('.count').text(data);
                console.log(data);
                
            }
        });
    }
    
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">
    </script> 
@endsection