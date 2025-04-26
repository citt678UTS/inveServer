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
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/inventori/urgentStock" class="nav-link {{ Request::is('inventori/urgentStock*') ? 'active' : '' }}">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
                Stock Kritis
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
                    <h1 class="m-0">Selamat datang, Di Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahItem }}</h3>
                            <p>Jumlah Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahSupplier }}</h3>
                            <p>Jumlah Pemasok</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahCategory }}</h3>
                            <p>Jumlah Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Overall System Summary</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Jumlah Barang
                                    <span class="badge bg-info rounded-pill">{{ $jumlahItem }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Nilai Stok
                                    <span class="badge bg-success rounded-pill">Rp {{ number_format($totalNilaiStok, 0, ',', '.') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Stok
                                    <span class="badge bg-info rounded-pill">{{ $stokTotal }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Rata-rata Harga Barang
                                    <span class="badge bg-warning rounded-pill">Rp {{ number_format($rataRataHarga, 0, ',', '.') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Jumlah Kategori
                                    <span class="badge bg-info rounded-pill">{{ $jumlahCategory }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Jumlah Pemasok
                                    <span class="badge bg-info rounded-pill">{{ $jumlahSupplier }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Category Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Jumlah Barang</th>
                                            <th>Total Nilai Stok</th>
                                            <th>Rata-rata Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categorySummaries as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->item_count }}</td>
                                            <td>Rp {{ number_format($category->total_value, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($category->avg_price, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Supplier Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pemasok</th>
                                            <th>Jumlah Barang</th>
                                            <th>Total Nilai Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($supplierSummaries as $supplier)
                                        <tr>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->item_count }}</td>
                                            <td>Rp {{ number_format($supplier->total_value, 0, ',', '.') }}</td>
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
    </section>
@endsection