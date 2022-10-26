<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Invoice</title>
</head>
<body>

	<!-- <div class="container"> -->
		<div class="head">
			<h1 class="text-center text-heading text-info">Invoices</h1>
		</div>
		<div class="container-fluid my-2 ">
			<table class="table table-striped">
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
					<th>Action</th>
				</tr>
				@foreach($invoices as $invoices)	
				<tr>
					<td>{{$invoices->id}}</td>
					<td>{{$invoices->title}}</td>
					<td>{{$invoices->author}}</td>
					<td>{{$invoices->price}}</td>
					<td>{{$invoices->buyer}}</td>
					<td>{{$invoices->purchased_quantity}}</td>
					<td>{{$invoices->amount}}</td>
					<td>{{$invoices->created_at}}</td>
					<td>{{$invoices->updated_at}}</td>
					<!-- <td>
						<a class="btn btn-primary" href="/print-invoice">Print PDF</a>
					</td> -->
					<td>
					<form method="post" action="view-invoice">
						@csrf
						<input type="hidden" name="id" value="{{$invoices->id}}">
						<input type="hidden" name="book_id" value="{{$invoices->book_id}}">
						<button type="submit" class="btn btn-info">Download PDF</button>
					</form>
				</td>
				</tr>
				@endforeach
			</table>		
		</div>

<!-- 	</div> -->

</body>
</html>