@extends('admin-layout')
@section('manage-category')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Icons</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Category</h1>
        </div>
    </div><!--/.row-->
    <div class="container">
        
        <div class="row">
                @if (Session::has('successMessage'))
                <div class="alert alert-success">
                    {{ Session::get('successMessage') }}
                </div>
                @endif
            <table class="table table-striped table-bordered">
                <tr>
                    <th>No. </th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                    <td><a class="btn btn-success" href="{{ route('category.edit',['id'=>$item->id]) }}">Edit</a> | <a class="btn btn-danger" href="{{ route('category.delete',['id'=>$item->id]) }}"  onclick=" return confirm('Are you sure to delete'); ">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>

        <h2>Javascript Data</h2>
       
                <div id="helloWorld"></div>

        
    </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Form</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="categoryName" class="form-control" id="categoryName">
            </div>
            <div class="form-group">
                <label for="">Category Description</label>
                <input type="text" name="categoryDescription"  id="categoryDescription" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit"  class="form-control btn btn-primary" value="Update Category">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>

@endsection
@section('below-footer-script')
    <script>
        var  responseData = '';
        $.ajax({
            method: "GET",
            url: "/products",
           
            //data: { name: "John", location: "Boston" }
        }).done(function( categories ) {

            responseData +=`
                <table class="table table-striped table-bordered">
                        <tr>
                        
                            <th>Category Name</th>
                            <th>Category Description</th> 
                            <th>Action</th>
                        </tr>
                    
                   
             
            `;
            //console.log(categories);
           
           
                $.each(categories.categories, function(i, category) {
                    responseData += `<tr>
                        <td>${category.name}</td>
                        <td>${category.description}</td>
                       
                    <td><button   onclick="myFunction(${category.id})" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">Edit</button> | <a class="btn btn-danger" href="{{ route('category.delete',['id'=>$item->id]) }}"  onclick=" return confirm('Are you sure to delete'); ">Delete</a></td>
                    </tr>`
                            
                });
                responseData += `
                    </table>
                `
            $('#helloWorld').html(responseData);
                   
        });

         function myFunction(category_id){
             

          $.get( "/product/"+category_id, function( data ) {
               $('#categoryName').val(data.category.name);
               $('#categoryDescription').val(data.category.description);
              //console.log(data.category.name);
          });
         }
    </script>
@endsection