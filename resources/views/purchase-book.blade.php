<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Purchase Book</title>
</head>
<body>

	<div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <div class="card">
    <div class="card-header text-center text-primary font-weight-bold">
      Purchase Book
    </div>

    <div class="card-body">
    	<p>Purchase Book where Id = {{$id}}</p>
      <form name="purchase" method="post" action="{{url('buy-book')}}"  enctype="multipart/form-data">
       @csrf
       <input type="hidden"  name="book_id"  value="{{$id}}" class="form-control" required="">
       <div class="form-group">
          <label for="">Buyer Name</label>
          <input type="text"  name="buyer" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="">Books Quantity to Buy</label>
          <input type="text"  name="quantity" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Buy Now</button>
      </form>
      
    </div>
  </div>
</div>  

</body>
</html>