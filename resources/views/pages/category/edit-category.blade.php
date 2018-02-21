@extends('admin-layout')
@section('edit-category')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Icons</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Category</h1>
        </div>
    </div><!--/.row-->
    <div class="container">
        
            @if (Session::has('successMessage'))
            <div class="alert-success">
                {{ Session::get('successMessage') }}
            </div>
            @endif
        
        <div class="row">
            <div class="col-md-6 ">
                <form action="{{ route('category.update') }}" method="post">
                        {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="form-group">
                        <label for="">Category Name</label>
                    <input type="text" name="categoryName" class="form-control" value="{{ $category->name }}">
                    </div>
               
               
                    <div class="form-group">
                        <label for="">Category Description</label>
                        <input type="text" name="categoryDescription" class="form-control"  value="{{ $category->description }}">
                    </div>
                    <div class="form-group">
                        
                        <input type="submit"  class="form-control btn btn-primary" value="Update Category">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection