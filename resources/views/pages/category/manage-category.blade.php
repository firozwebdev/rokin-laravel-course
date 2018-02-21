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
    </div>
</div>  
@endsection