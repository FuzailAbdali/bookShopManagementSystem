<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Edit Book Detail</title>
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
    <div class="card-header text-center font-weight-bold">
      Edit Book 
    </div>

    <div class="card-body">
    	<p>Edit Book with Id {{$id}}</p>
      <form name="add-book" id="add-book" method="post" action="{{url('update-book')}}"  enctype="multipart/form-data">
       @csrf
       <input type="hidden"  name="id"  value="{{$id}}" class="form-control" required="">
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Author</label>
          <input type="text" id="author" name="author" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <input type="text" id="description" name="description" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Publication</label>
          <input type="text" id="publication" name="publication" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Price</label>
          <input type="text" id="price" name="price" class="form-control" required="">
        </div>

         <div class="form-group">
          <label for="">Quantity</label>
          <input type="text" id="quantity" name="quantity" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Edit Book</button>
      </form>
      
    </div>
  </div>
</div>  

</body>
</html>