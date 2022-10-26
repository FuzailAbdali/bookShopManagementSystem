<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>VIEW INVOICE</title>
</head>
<body>

	<div class="container">
	<div class="header">
		<div class="row mt-4">
			<div class="col">
				<h1 class="text-center text-secondary font-weight-bold text-decoration-underline">INVOICE</h1>
			</div>
		</div>
	</div>
	</div>
	<div class="container-fluid">
		@foreach ($data as $d)
		<div class="row">
			<div class="col-md-4">
				<p><span class="font-weight-bold">Book ID :</span> {{ $d->book_id}}</p>
					
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4" style="display: inline-block;">
				<p><span class="font-weight-bold">Book Name :</span> {{ $d->title}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p><span class="font-weight-bold">Oreder ID :</span> {{ $d->id}}</p>
				 
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<p><span class="font-weight-bold">Author :</span> {{ $d->author}}</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<p><span class="font-weight-bold">Buyer :</span> {{ $d->buyer}}</p>
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<p><span class="font-weight-bold">Date :</span> {{ $d->created_at}}</p>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<table class="table table-striped table-bordered">
			<thead class="thead-light bg-secondary">
				<tr>
					<th class="font-weight-bold">#</th>
					<th class="w-75 font-weight-bold">Particular</th>
					<th class="font-weight-bold">Quantity</th>
					<th class="w-50 font-weight-bold">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						{{$i=1;}}
					</td>
					<td>						
    						{{ $d->title}} 
 
					</td>
					<td>
						{{ $d->purchased_quantity}}
					</td>
					<td>
						{{ $d->amount}}
					</td>
				</tr>
			</tbody>
			<tfoot class="tfoot-light ">
				<tr>
					<td colspan="3" class="font-weight-bold">Total :</td>
					<td ><b>Rs {{ $d->amount}}</b> Only</td>
				</tr>
				
			</tfoot>
		</table>
	</div>
	@endforeach
	<div class="container">
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<!-- <a href="generate-invoice-pdf" class="btn btn-info">Download Invoice</a> -->
			</div>
		</div>
	</div>
</body>
</html>