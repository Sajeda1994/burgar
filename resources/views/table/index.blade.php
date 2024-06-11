@extends('dashboard.dashboard')
@section('dashbody')
<div class="row">
    <div class="col-7 m-2">
        <button class="btn btn-warning " data-target="#booktable" data-toggle="modal">{{__('trans.Book Table')}}</button>
    </div>
    <div class="col-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover">
        <thead class="">
            <tr>
                <th>{{__('trans.ID')}}</th>
                <th>{{__('trans.Name')}}</th>
                <th>{{__('trans.Phone')}}</th>
                <th>{{__('trans.UseEmail')}}</th>
                <th>{{__('trans.NumberOfPerson')}}</th>
                <th>{{__('trans.DateOfBook')}}</th>
                <th>{{__('trans.Operation')}}</th>
            </tr>
        </thead>

        <tbody class="bg-info">
            <?php
            $i = 1;
            ?>
            @foreach ($tables as $table)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$table->username}}</td>
                    <td>{{$table->phonenumber}}</td>
                    <td>{{$table->useremail}}</td>
                    <td>{{$table->numperson}}</td>
                    <td>{{$table->datebook}}</td>
                    <td>
                            <button class="btn btn-warning" data-target="#editbook-{{$table->id}}" data-toggle="modal">{{__('trans.Edit')}}</button>
                            <button class="btn btn-warning" data-target="#deletebook-{{$table->id}}" data-toggle="modal">{{__('trans.Delete')}}</button>
                        </td>

                        @include('table.update')
                        @include('table.delete')

                </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection




<div class="modal fade" id="booktable" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Book Table') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="form_container ">

                <form action="{{route('table.store')}}" method="post">
                    @csrf
                    <div class="modal-body">

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

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{ __('trans.Close')
                        }}</button>
                <button type="submit" class="btn mb-2 btn-primary">{{ __('trans.Save') }}</button>
            </div>
            </form>


        </div>
    </div>
</div>

