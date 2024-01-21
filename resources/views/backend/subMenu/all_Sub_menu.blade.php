@extends('backend.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> All Submenus</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Submenus</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Submenu Name</th>
                                    <th>Menu Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($submenus as $key => $item)
                                <tr>
                                    <td> {{ $i++}} </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->menu->name }}</td>
                                    <td>
                                        <a href="{{ route('edit.subMenu', $item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                        <a href="{{ route('delete.subMenu', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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
