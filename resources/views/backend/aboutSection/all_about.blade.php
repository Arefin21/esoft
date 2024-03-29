@extends('backend.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">About Section</h4>

                                     

                                </div>
                            </div>
                        </div>
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">About</h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($abouts as $key => $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td> <img src="{{ asset($item->image) }}" style="width: 60px; height: 50px;"> </td>
                            
                            <td>
   <a href="{{ route('edit.about',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

    <a href="{{ route('delete.about',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 

@endsection