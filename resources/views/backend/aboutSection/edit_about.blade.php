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

            <h4 class="card-title">Update About </h4>
            
            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                @csrf

               
                <input type="hidden" name="id" value="{{$abouts->id}}">
        

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">About Title </label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text" value="{{$abouts->title}}" id="example-text-input">
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">About Description </label>
                <div class="col-sm-10">
                    <textarea name="description" required="" class="form-control" rows="5">{{$abouts->description}}</textarea>
                </div>
            </div>

             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">About Image </label>
                <div class="col-sm-10">
           <input name="image" class="form-control" type="file" id="image">
                </div>
            </div>
       


              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
  <img id="showImage" class="rounded avatar-lg" src="{{ asset($abouts->image) }}" alt="Card image cap">
                </div>
            </div>
          

            
<input type="submit" class="btn btn-info waves-effect waves-light" value="Update About">
            </form>
             
           
           
        </div>
    </div>
</div> 
</div>
 


</div>
</div>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection 