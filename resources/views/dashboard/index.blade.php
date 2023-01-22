@extends('master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>Dashboard</h1>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                  @can('admin')

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $user }}</h3>
                                <p>User</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('users') }}" class="small-box-footer">
                                Selengkapnya
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                     @endcan
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $rencana }}</h3>
                                <p>Rencana kegiatan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('prokeg') }}" class="small-box-footer">
                                Selengkapnya
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $pending }}</h3>
                                <p>Kegiatan Pending</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-refresh"></i>
                            </div>
                            <a href="{{ route('prokeg.showpending') }}" class="small-box-footer">
                                Selengkapnya
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $sukses }}</h3>
                                <p>Kegiatan Sukses</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark-round"></i>
                            </div>
                            <a href="{{ route('prokeg.showsuccess') }}" class="small-box-footer">
                                Selengkapnya
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
                          <section class="content"></section>

            </div>
        </section>
    </div>
@endsection
