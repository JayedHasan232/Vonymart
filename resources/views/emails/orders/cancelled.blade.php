@component('mail::message')

@component('mail::panel')
Order cancelled
@endcomponent

Dear {{ $order->customer->name }}, your order {{ $order->order_id }} has been cancelled.

@endcomponent