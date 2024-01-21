@extends('backend.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Edit Menu </h4>
            
            <form method="post" action="{{ route('update.banner') }}">
                @csrf

               <input type="hidden" name="id" value="{{$menus->id}}">

            

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Menu Name </label>
                <div class="col-sm-10">
                    <input name="banner_title" class="form-control" type="text" value="{{$banner->name}}" id="example-text-input">
                </div>
            </div>


            
<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Menu">
            </form>
             
           
           
        </div>
    </div>
</div>
</div>
 


</div>
</div>



@endsection 