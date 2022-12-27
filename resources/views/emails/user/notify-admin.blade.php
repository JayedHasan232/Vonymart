@component('mail::message')

@component('mail::panel')
New signup
@endcomponent

Dear {{ config('app.name') }}, {{ $user->name }} just signed up.

Thanks,<br>
{{ config('app.name') }}
@endcomponent