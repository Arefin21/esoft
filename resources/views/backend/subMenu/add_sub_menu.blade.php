@extends('backend.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Add Submenu</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Submenu</h4>

                        <form action="{{ route('store.subMenu') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Submenu Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="menu_id" class="form-label">Select Menu</label>
                                <select class="form-select" id="menu_id" name="menu_id" required>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Submenu</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
