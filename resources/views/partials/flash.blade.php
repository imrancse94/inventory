@if(session()->has('flash_message'))
    <div class="alert alert-{{session()->get('flash_message_level')}} alert-dismissable fade show">
        <button class="close" data-dismiss="alert" aria-label="Close"></button>
        {!! session()->get('flash_message') !!}
    </div>
@endif