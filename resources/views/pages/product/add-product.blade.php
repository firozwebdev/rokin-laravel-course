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
            <h1 class="page-header">Product</h1>
           
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
            {!!Form::open( array('method'=>'post','files'=>true,'class'=>'form-horizontal contact_form'))!!}

            <div class="form-group">
                {{Form::label('product_title', 'Product Title', array('class' => ''))}}
                {{Form::text('product_title', $product_title = null, array('class' => 'form-control','id'=>'product_title',  'placeholder' => 'Product Title'))}}
               
            </div>
        

            {!!Form::close()!!}
        </div>
    </div>
</div>
</div>  
@endsection