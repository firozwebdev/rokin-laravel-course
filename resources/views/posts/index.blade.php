@extends('admin-layout')
@section('product-index')
    <div class="col-md-6 col-md-offset-3">
        <h2>Products list</h2>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>

            </tr>

            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('posts.edit',['id'=>$product->id]) }}">Edit</a> |
                        
                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', 'id'=>$product->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        {{-- <a class="btn btn-danger" href="{{ url('/posts', $product->id) }}"  onclick=" return confirm('Are you sure to delete'); ">Delete</a> --}}

                        
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection