@component('mail::message')

@component('mail::panel')
Order delivered
@endcomponent

Dear {{ $order->customer->name }}, your order {{ $order->order_id }} has been delivered.

@endcomponent