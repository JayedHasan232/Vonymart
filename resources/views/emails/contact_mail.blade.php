@component('mail::message')
# Contact Us Message

Dear {{ config('app.name') }}, you have a new query from {{ $data['name'] }} <span>({{ $data['email'] }})</span>

@component('mail::panel')
{{ $data['message'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent