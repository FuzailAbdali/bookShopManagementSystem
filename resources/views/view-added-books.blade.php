<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Added Books</title>
</head>
<body>
	
	 <div class="container mt-4">
  @if(session('status'))
	  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> {{ session('status') }}
  </div>
  @endif
  @if (count($errors) > 0)
   <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
  </div>
   @endif
	<div>
		<h1 class="text-center text-success">Added Books</h1>
	</div>

	<div class="row mb-2">
		<div class="col-md-8">
			<a href="add-book">
				<button class="btn btn-primary">Add Book</button>
			</a>
		</div>
		<div class="col-md-4">
			<form method="post" action="{{url('view-added-books');}}">
			 @csrf
			<label>Id</label>
			<input type="text" name="id">
			<input type="submit" name="Find" value="Find" class="btn btn-info">
		</form>
		</div>
	</div>


	<div class="container">
		<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Author</th>
				<th>publication</th>
				<th>description</th>
				<th>reference</th>
				<th>Price</th>
				<th>Available Quantity</th>	
				<th colspan="4" class="text-center">Action</th>			
			</tr>
	@foreach($books as $books)		
			<tr>
				<td>{{$books->id}}</td>
				<td>{{$books->title}}</td>
				<td>{{$books->author}}</td>
				<td>{{$books->publication}}</td>
				<td>{{$books->description}}</td>
				<td>{{$books->reference}}</td>
				<td>{{$books->price}}</td>
				<td>{{$books->available_quantity}}</td>
				<td>
					<a href="/delete-book/{{$books->id}}"><button class="btn btn-danger">Delete</button></a>
				</td>
				<td>
					<a href="/edit-book/{{$books->id}}"><button class="btn btn-primary">Edit</button></a>
				</td>
				<td>
					<a href="/purchase-book/{{$books->id}}"><button class="btn btn-success">Purchase</button></a>
				</td>
				<td>
					<form method="post" action="show-invoice">
						@csrf
						<input type="hidden" name="id" value="{{$books->id}}">
						<button type="submit" class="btn btn-info">Invoices</button>
					</form>
				<!-- 	<a href="/invoices/{{$books->id}}"><button class="btn btn-success">Invoices</button></a> -->
				</td>
			</tr>
	@endforeach
	</table>

	</div>
	





</body>
</html>