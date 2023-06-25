<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>

<table>
    <thead>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->quantity * $item->product->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Total: {{ $total }}</p>
</body>
</html>
