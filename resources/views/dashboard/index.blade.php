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
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $user }}</h3>
                                <p>User</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('users') }}" class="small-box-footer">
                                Selengkapnya
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
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
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">
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
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Selengkapnya
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
  
                </div>
                          <section class="content">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Program Kegiatan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped projects">
                  <thead>
                    <tr>
                      <th style="width: 1%">
                        #
                      </th>
                      <th style="width: 20%">
                        Nama Kegiatan
                      </th>
                      <th style="width: 30%">
                        Penanggung Jawab
                      </th>
                      <th>
                        Jadwal Kegiatan
                      </th>
                      <th style="width: 8%" class="text-center">
                        Status Kegiatan
                      </th>
                      <th style="width: 20%">
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        #
                      </td>
                      <td>
                        <a>
                          AdminLTE v3
                        </a>
                        <br>
                        <small>
                          Created 01.01.2019
                        </small>
                      </td>
                      <td>
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                          </li>
                        </ul>
                      </td>
                      <td class="project_progress">
                        <small>
                          2 Oktober 2022
                        </small>
                      </td>
                      <td class="project-state">
                        <span class="badge badge-success">Success</span>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>
                      </td>
                    </tr>

                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </section>

            </div>
        </section>
    </div>
@endsection
