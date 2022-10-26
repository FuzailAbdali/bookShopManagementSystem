<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print Invoice</title>
</head>
<body>

	<table>
		<tr>
			<th>#</th>
			<th>Book Name</th>
			<th>Author</th>
			<th>Price</th>
			<th>Buyer</th>
			<th>Purchased Quantity</th>
			<th>Amount</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
		@foreach($data as $data)
		<tr>
			<td>{{$data->id}}</td>
			<td>{{$data->title}}</td>
			<td>{{$data->author}}</td>
			<td>{{$data->price}}</td>
			<td>{{$data->buyer}}</td>
			<td>{{$data->purchased_quantity}}</td>
			<td>{{$data->amount}}</td>
			<td>{{$data->created_at}}</td>
			<td>{{$data->updated_at}}</td>
		</tr>
		@endforeach
	</table>

</body>
</html>