<div class="modal fade" id="editmeal-{{$meal->id}}" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Edit Meal') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('meal.update',$meal->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="modal-body">
                    <input type="hidden" name="editmeal" value="{{$meal->id}}">

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In Arabic') }}</label>
                            <input type="text" name="upnamear" class="form-control" value="{{$meal->getTranslation('name','ar')}}">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In English') }}</label>
                            <input type="text" name="upnameen" class="form-control" value="{{$meal->getTranslation('name','en')}}">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In Arabic') }}</label>
                            <textarea type="text" name="updescar" class="form-control">{{$meal->getTranslation('description','ar')}}</textarea>
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In English') }}</label>
                            <textarea type="text" name="updescen" class="form-control">{{$meal->getTranslation('description','en')}}</textarea>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Price')}}</label>
                            <input type="text" name="upprice" class="form-control" value="{{$meal->price}}">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Status')}}</label>
                            <select name="upstatus" id="" class="form-control">
                                <option value="available">{{__('trans.Available')}}</option>
                                <option value="unvailable">{{__('trans.Non Available')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Category')}}</label>
                            <select name="upcategory" id="" class="form-control">
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