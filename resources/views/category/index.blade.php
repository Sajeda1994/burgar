@extends('dashboard.dashboard')

@section('dashbody')
<div class="row m-2">
    <div class="col-4">
        <button href="" class="btn btn-warning" data-toggle="modal"
            data-target="#addcategory">{{__('trans.Add Category')}}</button>
    </div>
    <div class="col-8">
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
        <thead>
            <tr>
                <th>{{__('trans.ID')}}</th>
                <th>{{__('trans.Name')}}</th>
                <th>{{__('trans.Description')}}</th>
                <th>{{__('trans.Operation')}}</th>
            </tr>
        </thead>

        <tbody>
            <?php
use App\Models\category;

$i = 1;
$categorys = category::all();
              ?>


            @foreach ($categorys as $category)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <button  class="btn btn-warning" data-target="#editcategory-{{$category->id}}"
                            data-toggle="modal">{{__('trans.Edit')}}</button>
                        <button class="btn btn-warning" data-target="#deletecat-{{$category->id}}"
                            data-toggle="modal">{{__('trans.Delete')}}</button>

                        @include('category.update')
                        @include('category.delete')

                    </td>
                </tr>

            @endforeach





        </tbody>


    </table>
</div>
@endsection

<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Add Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="post">
                @csrf

                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In Arabic') }}</label>
                            <input type="text" name="namear" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In English') }}</label>
                            <input type="text" name="nameen" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In Arabic') }}</label>
                            <textarea type="text" name="descar" class="form-control"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In English') }}</label>
                            <textarea type="text" name="descen" class="form-control"></textarea>
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

<!-- -->