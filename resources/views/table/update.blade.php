<div class="modal fade" id="editbook-{{$table->id}}" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalTitle"> {{ __('trans.Edit Book Table') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="form_container ">

                <form action="{{route('table.update',$table->id)}}" method="post">
                    @csrf
                    @method('put')

                    <div class="modal-body">
                        <input type="hidden" name="editbook" value="{{$table->id}}">

                        <div>

                            <input type="text" name="yourname" class="form-control text-center"
                                placeholder="{{__('trans.Your Name')}}" value="{{$table->username}}" />
                        </div>
                        <div>
                            <input type="text" name="phone" class="form-control text-center"
                                placeholder="{{__('trans.Phone Number')}}" value="{{$table->phonenumber}}" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control text-center"
                                placeholder="{{__('trans.Your Email')}}"  value="{{$table->useremail}}"/>
                        </div>
                        <div>
                            <input type="number" name="person" class="form-control text-center"
                                placeholder="{{__('trans.How Many Person?')}}"  value="{{$table->numperson}}"/>
                        </div>
                        <div class="text-center">
                            <label for="" class="label-form">{{__('trans.Date&Time The Book')}}</label>
                            <input type="datetime-local" class="form-control text-center" name="datebook" id=""  value="{{$table->datebook}}"/>

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