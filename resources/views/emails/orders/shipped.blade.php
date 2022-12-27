@component('mail::message')

@component('mail::panel')
Order shipped
@endcomponent

Dear {{ $order->customer->name }}, your order {{ $order->order_id }} has been shipped.

@endcomponent