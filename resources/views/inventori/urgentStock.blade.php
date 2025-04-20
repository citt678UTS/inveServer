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
@if (session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
    {{ session('error') }}
</div>
@endif

   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            
          

          
            
            <!-- Tabel List Obat -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Item dengan Stock <= 5</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID Item</th>
                      <th>Nama Item</th>
                      <th>Deskripsi</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Category</th>
                      <th>Supplier</th>
                      <th>Di buat oleh</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($itemsUrgentStock as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td><span class="badge bg-danger rounded-pill">{{ $item->quantity }}</span></td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $item->admin->username }}</td>
                      
                        <td>
                          <a href="{{ route('inventoriItemEdit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <form action="{{ route('inventoriItemDelete', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Item ini?');">
                              <i class="fas fa-trash"></i> Delete
                            </button>
                          </form>
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
    </section>
    
@endsection