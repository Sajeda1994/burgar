<div class="modal fade" id="deletecat-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Delete Category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.destroy',$category->id) }}" method="post">
                @csrf
                @method('delete')

                <div class="modal-body">
                <input type="hidden" name="deletecat" value="{{$category->id}}">

                    <div class="row">
                        <h1>{{__('trans.Are you sure?you want delete category??')}}</h1>
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