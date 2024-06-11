<div class="modal fade" id="editappet-{{$appet->id}}" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Edit Appetizers') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('appetizers.update',$appet->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="modal-body">
                    <input type="hidden" name="editappet" value="{{$appet->id}}">

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In Arabic') }}</label>
                            <input type="text" name="namear" value="{{$appet->getTranslation('name','ar')}}" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Name In English') }}</label>
                            <input type="text" name="nameen" value="{{$appet->getTranslation('name','en')}}" class="form-control">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In Arabic') }}</label>
                            <textarea type="text" name="descar" class="form-control">{{$appet->getTranslation('description','ar')}}</textarea>
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{ __('trans.Description In English') }}</label>
                            <textarea type="text" name="descen" class="form-control">{{$appet->getTranslation('description','en')}}</textarea>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Price')}}</label>
                            <input type="text" name="price" value="{{$appet->price}}" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="label-form">{{__('trans.Status')}}</label>
                            <select name="status" id="" class="form-control">
                                <option value="available">{{__('trans.Available')}}</option>
                                <option value="unavailable">{{__('trans.Non Available')}}</option>
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