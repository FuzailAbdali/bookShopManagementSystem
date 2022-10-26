<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Book Record</title>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <!--  <button type="button" class="close" data-dismiss="modal" onclick="location.replace('../view-added-books');">&times;</button> -->
          <h4 class="modal-title text-danger">Confirmation Delete Record</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to Delete Record? where Id {{$id}}</p>
          <form action="{{url('delete-book');}}"  method="post">
                	 @csrf
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="submit" value="Yes" name="yes" class=" btn btn-danger">
                    <input type="button" value="No" name="no" class="btn btn-success" onclick="location.replace('../view-added-books');">
                    </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.replace('../view-added-books');">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
 $(window).load(function()
{
    $('#myModal').modal('show');
});
</script>


</body>
</html>