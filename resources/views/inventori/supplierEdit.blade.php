@extends('layout')

@section('sidebar')

    <li class="nav-item menu-open">
      <a href="/inventori" class="nav-link {{ Request::is('/inventori') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/inventori/item" class="nav-link {{ Request::is('inventori/item*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Item
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/inventori/supplier" class="nav-link {{ Request::is('inventori/supplier*') ? 'active' : '' }}">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
          Supplier
          
        </p>
      </a>
    </li>

    <li class="nav-item">
        <a href="/inventori/category" class="nav-link {{ Request::is('inventori/category*') ? 'active' : '' }}">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Category
            {{-- <span class="badge badge-info right">{{ $obats->count() }}</span> --}}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/inventori/urgentStock" class="nav-link {{ Request::is('inventori/urgentStock*') ? 'active' : '' }}">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Stock Kritis
            {{-- <span class="badge badge-info right">{{ $obats->count() }}</span> --}}
          </p>
        </a>
      </li>

@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Supplier</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    {{-- FORM --}}
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Supplier</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('inventoriSupplierUpdate',$supplier->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Supplier</label>
                                        <input value="{{ $supplier->name }}" type="text" name="name" class="form-control" id="name"
                                            placeholder="Input Supplier name">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_info">Kontak</label>
                                        <input value="{{ $supplier->contact_info }}" type="text" name="contact_info" class="form-control" id="contact_info"
                                            placeholder="Input Kontak Info">
                                    </div>
                                   
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Supplier</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection