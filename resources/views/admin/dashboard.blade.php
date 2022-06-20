<x-admin-layout title="Dashboard - Chatomz Company">
    <x-slot name="content">
        <div class="page-heading">
            <h3>Statistik</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-md-12 d-block d-sm-none">
                      <form action="{{ url('pencarian') }}" method="get">
                          @csrf
                          <input type="hidden" name="s" value="carinama">
                          <div class="input-group mb-3">
                              <input type="text" name="nama" class="form-control" placeholder="cari disini ..." aria-label="cari disini ..." aria-describedby="button-addon2" autocomplete="off" required>
                              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi-search"></i></button>
                          </div>
                      </form>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                              <a href="#">
                                                  <div class="stats-icon purple">
                                                      <i class="bi-person"></i>
                                                  </div>
                                              </a>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Data 1</h6>
                                            <h6 class="font-extrabold mb-0 small">1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                              <a href="#">
                                                  <div class="stats-icon blue">
                                                      <i class="bi-person-badge"></i>
                                                  </div>
                                              </a>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Data 2</h6>
                                            <h6 class="font-extrabold mb-0 small">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <a href="#">
                                            <div class="stats-icon green">
                                                <i class="bi-people"></i>
                                            </div>
                                          </a>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Data 3</h6>
                                            <h6 class="font-extrabold mb-0 small">12</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <div class="stats-icon red">
                                                    <i class="bi-geo"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Data 4</h6>
                                            <h6 class="font-extrabold mb-0 small">10</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jumlah View Pengunjung Website ({{ Universal::bulan_indo().' '.Universal::ambil_tahun() }})</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-visitor"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-7">
                        </div>
                        <div class="col-12 col-xl-5">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4>Terakhir Dilihat</h4>
                                </div>
                                <div class="card-body py-2">
                                  hallo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-3">
                             
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Ulang Tahun</h5>
                            <small>{{ Universal::ambil_tgl().' '.Universal::bulan_indo() }}</small>
                        </div>
                        <div class="card-content pb-4">
                        
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Perbandingan Orang</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div id="chart-visitors-profile"></div> --}}
                            {{-- <div id="chart-kematian"></div> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </x-slot>
  </x-admin-layout>
  
  
  