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
                    <h1 class="m-0">Selamat datang, Di Dashboard</h1>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahItem }}</h3>
                            <p>Jumlah Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('pasien.riwayat') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahSupplier}}</h3>
                            <p>Jumlah Pemasok</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('pasien.riwayat') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahCategory }}</h3>
                            <p>Jumlah Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{-- <a href="{{ route('pasien.riwayat') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">All Item Summary</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Stock Total
                                    <span class="badge bg-info rounded-pill">{{ $stokTotal }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Nilai Stok
                                    <span class="badge bg-success rounded-pill">Rp {{ number_format($totalNilaiStok, 0, ',', '.') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Rata-rata Harga Barang
                                    <span class="badge bg-warning rounded-pill">Rp {{ number_format($rataRataHarga, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Food Category Item Summary</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Jumlah Barang
                                    <span class="badge bg-info rounded-pill">{{ $jumlahItemMakanan }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Nilai Stok
                                    <span class="badge bg-success rounded-pill">Rp {{ number_format($totalNilaiStokMakanan, 0, ',', '.') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Rata-rata Harga Barang
                                    <span class="badge bg-warning rounded-pill">Rp {{ number_format($rataRataHargaMakanan, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection