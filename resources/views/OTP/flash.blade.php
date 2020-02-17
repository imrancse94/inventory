@if(session()->has('flash_message'))
    <div class="alert alert-{{session()->get('flash_message_level')}} alert-dismissable fade show text-center">
        {{ session()->get('flash_message') }}
    </div>
@endif