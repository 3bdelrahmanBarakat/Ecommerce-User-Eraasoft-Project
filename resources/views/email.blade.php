<h1>Order Bill</h1>
<ul>
@foreach ( $mailData['orders'] as $order )
<li>Order number: {{$order['id']}}</li>
<li>Customer name: {{$order['first_name']}} {{$order['last_name']}}</li>
<li>Customer address: {{$order['address']}} ,{{$order['city']}}, {{$order['postcode']}} </li>
<li>Customer PhoneNumber: {{$order['phone']}}  </li>
<li>Customer email: {{$order['email']}}  </li>
<li>Ordered at: {{$order['created_at']}}  </li>
<li>Total price: {{$order['total_price']}}  </li>
@endforeach
</ul>
<h3>Order details:</h3>
<ul>
@foreach ( $mailData['products'] as $key => $order )
<li>
     {{$mailData['products'][$key][0]['Product_name']}} - {{$mailData['products'][$key][0]['size']}} - {{$mailData['products'][$key][0]['price']}} - {{$mailData['products'][$key][0]['brand']}} - {{$mailData['products'][$key][0]['color']}}
</li>
@endforeach
</ul>


