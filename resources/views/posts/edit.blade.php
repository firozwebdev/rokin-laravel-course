@extends('admin-layout')
@section('product')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Icons</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
           
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
            {!!Form::open( array('route' =>['posts.update',  $product->id],'method'=>'PUT','files'=>true,'class'=>'form-horizontal contact_form'))!!}

            <div class="form-group">
                {{Form::label('title', 'Product Title', array('class' => ''))}}
                {{Form::text('title', $title = $product->title, array('class' => 'form-control','id'=>'product_title',  'placeholder' => 'Product Title'))}}
               
            </div>

            <div class="form-group">
                {{Form::label('category_id', 'Product Category', array('class' => ''))}}
        
                <select class="form-control" name="category_id" data-placeholder="Choose a Category" tabindex="1">
                    <option value="{{ $product->category_id }}">{{ $product->title}}</option>
                    @if($categories)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
        
                </select>
            </div>
            <div class="form-group">
                {{Form::label('description', 'Product Description', array('class' => ''))}}
                {{Form::textarea('description', $product_description = $product->description, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Product Description'))}}
            </div>

            <div class="form-group">
                {{Form::label('image', 'Upload an Image', array('style' => 'float:left;margin-right:20px;'))}}
                {!! Form::file('image') !!}

            </div>

            <div class="form-group">
                {{Form::label('type', 'Product Type', array('class' => ''))}}
                <select class="form-control" name="type" data-placeholder="Choose a type" tabindex="1">
                    <option>{{ $product->type }}</option>
                     <option>Regular</option>
                     <option>Featured</option>
                     <option>Special</option>
                </select>
            </div>
            <div class="form-group">
                {{Form::label('price', 'Product Price', array('class' => ''))}}
                {{Form::text('price', $price = $product->price, array('class' => 'form-control', 'placeholder' => 'Price'))}}
            </div>
            <div class="form-group">
                {{Form::label('quantity', 'Product Quantity', array('class' => ''))}}
                {{Form::text('quantity', $quantity = $product->quantity, array('class' => 'form-control', 'placeholder' => 'Quantity'))}}
            </div>
            <div class="form-group">
                {{Form::label('status', 'Publication Status', array('class' => ''))}}
        
                <select class="form-control" name="status" data-placeholder="Choose a Category" tabindex="1">
                    <option value="{{ $product->status}}">{{ $product->status}}</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
        
            <div class="form-group">
        
                <button type="submit" id="submit" class="btn btn-primary">Update Product</button>
        
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
</div>  
@endsection