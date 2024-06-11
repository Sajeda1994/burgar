@extends('dashboard.dashboard')
@section('dashbody')

<div class="row">
    <div class="col-7 m-2">
        <button class="btn btn-warning " data-target="#addappetizers" data-toggle="modal">{{__('trans.Add Appetizers')}}</button>
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
                <th>{{__('trans.Description')}}</th>
                <th>{{__('trans.Price')}}</th>
                <th>{{__('trans.Status')}}</th>
                <th>{{__('trans.Category')}}</th>
                <th>{{__('trans.Image')}}</th>
                <th>{{__('trans.Operation')}}</th>
            </tr>
        </thead>

        <tbody class="bg-info">
            <?php
              $i = 1;
            ?>
            @foreach ($appets as $appet)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$appet->name}}</td>
                    <td>{{$appet->description}}</td>
                    <td>{{$appet->price}}</td>
                    <td>{{$appet->status}}</td>
                    <td>{{$appet->category->name}}</td>
                    <td><img src="{{'\appetphoto\thumb/'.$appet->image}}" width="50px" height="50px" alt="" srcset=""></td>
                    <td>
                        <button class="btn btn-warning" data-target="#editappet-{{$appet->id}}" data-toggle="modal">{{__('trans.Edit')}}</button>
                        <button class="btn btn-warning" data-target="#deleteappet-{{$appet->id}}" data-toggle="modal">{{__('trans.Delete')}}</button>
                    </td>
                    @include('Appetizers.update')
                    @include('Appetizers.delete')
                </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection

<div class="modal fade" id="addappetizers" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Add Appetizers') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('appetizers.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In Arabic') }}</label>
                            <input type="text" name="namear" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In English') }}</label>
                            <input type="text" name="nameen" class="form-control">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In Arabic') }}</label>
                            <textarea type="text" name="descar" class="form-control"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In English') }}</label>
                            <textarea type="text" name="descen" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Price')}}</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Status')}}</label>
                            <select name="status" id="" class="form-control">
                                <option value="available">{{__('trans.Available')}}</option>
                                <option value="unvailable">{{__('trans.Non Available')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Category')}}</label>
                            <select name="category" id="" class="form-control">
                                @foreach ($categorys as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Select Image')}}</label>
                            <input type="file" name="image" class="form-control">
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
