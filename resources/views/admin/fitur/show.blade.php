<x-admin-layout title="Data Aplikasi">
    <x-slot name="content">
        <div class="page-heading">
            <x-header head="Data Aplikasi {{ $fitur->aplikasi->nama_aplikasi }}" p="Fitur {{ ucwords($fitur->nama_fitur) }}" :hyperlink="['Daftar' => 'aplikasi',$fitur->aplikasi->nama_aplikasi => 'aplikasi/'.$fitur->aplikasi->id]" active="Detail">
            </x-header>
            <section class="section">
                <div class="row">
                    <div class="card">
                    <div class="card-header">
                        <a href="{{ url('aplikasi/'.$fitur->aplikasi->id) }}" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-angle-left"></i></a>
                        <a href="#" class="btn btn-outline-success btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#editfitur"><i class="fas fa-pen"></i> Fitur</a>
                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-plus"></i> Aksi</a>
                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#tambahcrud"><i class="fas fa-plus"></i> CRUD</a>
                        <a href="#" class="btn btn-outline-success btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#selesai"><i class="bi bi-card-checklist"></i> Selesai</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-success text-white p-2">
                                        <strong>SELESAI</strong>
                                    </div>
                                    <div class="card-body border display-4 p-2 rounded-bottom">
                                        {{ $statistik['data']['selesai'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-white bg-warning p-2">
                                        <strong>PROSES</strong>
                                    </div>
                                    <div class="card-body border display-4 p-2 rounded-bottom">
                                        {{ $statistik['data']['proses'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-white bg-info p-2">
                                        <strong>UBAH</strong>
                                    </div>
                                    <div class="card-body border display-4 p-2 rounded-bottom">
                                        {{ $statistik['data']['ubah'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-primary text-white p-2">
                                        <strong>PROGRESS</strong>
                                    </div>
                                    <div class="card-body border display-4 p-2 rounded-bottom">
                                        {{ $statistik['progress'] }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="label" id="" class="form-control" onchange="this.form.submit()">
                                            <option value="semua">SEMUA</option>
                                            @foreach (listtabel($fitur->tabel) as $item)
                                                <option value="{{ $item }}" @if ($label == $item)
                                                selected
                                            @endif>{{ strtoupper($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="example1" class="table table-borderless table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th width="5%">No</th>
                                        <th width="10%">Aksi</th>
                                        <th>Nama Aksi</th>
                                        <th>Label</th>
                                        <th>Detail</th>
                                        <th>Akses</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @forelse ($aksi as $item)
                                    <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">
                                                <x-aksi :id="$item->id" link="aksi">
                                                    <button type="button" data-bs-toggle="modal"  data-nama_aksi="{{ $item->nama_aksi }}"  data-akses="{{ $item->akses }}" data-status="{{ $item->status }}" data-detail="{{ $item->detail }}" data-label="{{ $item->label }}" data-id="{{ $item->id }}" data-bs-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit" style="width: 20px;"></i> EDIT
                                                    </button>
                                                </x-aksi>
                                            </td>
                                            <td class="text-center">{!! uiAksi($item->nama_aksi)!!}</td>
                                            <td class="text-uppercase">{{ $item->label}}</td>
                                            <td>{{ $item->detail}}</td>
                                            <td>{{ $item->akses}}</td>
                                            <td class="text-center">{!! uiStatus($item->status)!!}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7">tidak ada data</td>
                                        </tr>
                                    @endforelse
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
        {{-- modal --}}
        <x-modalsimpan judul="Tambah Aksi" link="aksi">
            <section class="p-3">
                <input type="hidden" name="fitur_id" value="{{ $fitur->id }}">
                <div class="form-group">
                    <label for="">Nama Aksi</label>
                    <select name="nama_aksi" id="nama_aksi" class="form-control">
                        @foreach (listnamaaksi() as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Label</label>
                    @if (is_null($fitur->tabel))
                        <input type="text" name="label" class="form-control">        
                    @else
                    <select name="label" id="label" class="form-control">
                        @foreach (listtabel($fitur->tabel) as $item)
                            <option value="{{ $item }}" @if ($label == $item)
                                selected
                            @endif>{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                @if ($fitur->akses_fitur == 'umum')
                    <div class="form-group">
                        <label for="">Akses</label>
                        <div>
                            @foreach (listakseslevel($fitur->aplikasi->level) as $item)
                                <input type="checkbox" name="akses[]" value="{{ $item }}"> {{ $item }} <br>
                            @endforeach
                        </div>
                    </div>
                @else
                    <input type="hidden" name="akses[]" value="{{ $fitur->akses_fitur }}">        
                @endif
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (liststatusaksi() as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalsimpan>
        <x-modalsimpan judul="Tambah Aksi" link="aksi" id=tambahcrud>
            <div class="alert alert-info">
                Tambahkan aksi Create (tambah), Read (lihat), Update (ubah), Delete (hapus)
            </div>
            <section class="p-3">
                <input type="hidden" name="fitur_id" value="{{ $fitur->id }}">
                <input type="hidden" name="s" value="crud">
                <div class="form-group">
                    <label for="">Label</label>
                    @if (is_null($fitur->tabel))
                        <input type="text" name="label" class="form-control">        
                    @else
                    <select name="label" id="label" class="form-control">
                        @foreach (listtabel($fitur->tabel) as $item)
                            <option value="{{ $item }}" @if ($label == $item)
                                selected
                            @endif>{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                @if ($fitur->akses_fitur == 'umum')
                    <div class="form-group">
                        <label for="">Akses</label>
                        <div>
                            @foreach (listakseslevel($fitur->aplikasi->level) as $item)
                                <input type="checkbox" name="akses[]" value="{{ $item }}"> {{ $item }} <br>
                            @endforeach
                        </div>
                    </div>
                @else
                    <input type="hidden" name="akses[]" value="{{ $fitur->akses_fitur }}">        
                @endif
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (liststatusaksi() as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalsimpan>
        <x-modalubah judul="ubah data Fitur" link="fitur" id="editfitur">
            <input type="hidden" name="id" value="{{ $fitur->id }}">
            <section class="p-3">
                <div class="form-group">
                    <label for="">Nama Fitur</label>
                    <input type="text" name="nama_fitur" value="{{ $fitur->nama_fitur }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tabel</label>
                    <input type="text" name="tabel" value="{{ $fitur->tabel }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Akses Fitur</label>
                    <select name="akses_fitur" class="form-control">
                        <option value="umum">UMUM</option>
                        @foreach (listakseslevel($fitur->aplikasi->level) as $item)
                            <option value="{{ $item }}" @if ($item == $fitur->akses_fitur)
                                selected
                            @endif>{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control">{{ $fitur->deskripsi }}</textarea>
                </div>
            </section>
        </x-modalubah>
        <x-modalubah judul="ubah data Aksi" link="aksi">
            <section class="p-3">
                <div class="form-group">
                    <label for="">Nama Aksi</label>
                    <select name="nama_aksi" id="nama_aksi" class="form-control">
                        @foreach (listnamaaksi() as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Label</label>
                    @if (is_null($fitur->tabel))
                        <input type="text" name="label" id="label" class="form-control">        
                    @else
                    <select name="label" id="label" class="form-control">
                        @foreach (listtabel($fitur->tabel) as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                @if ($fitur->akses_fitur == 'umum')
                    <div class="form-group">
                        <label for="">Akses</label>
                        <input type="text" id="akses" class="form-control" readonly>        
                        <div>
                            @foreach (listakseslevel($fitur->aplikasi->level) as $item)
                                <input type="checkbox" name="akses[]" value="{{ $item }}"> {{ $item }} <br>
                            @endforeach
                        </div>
                    </div>
                @else
                    <input type="hidden" name="akses[]" id="akses">        
                @endif
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (liststatusaksi() as $item)
                            <option value="{{ $item }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalubah>
        <x-modalubah judul="ubah data Aksi" link="aksi" id="selesai">
            <section class="p-3">
                <input type="hidden" name="fitur_id" value="{{ $fitur->id }}">
                <input type="hidden" name="s" value="selesai">
                <div class="alert alert-info">
                    dengan klik SIMPAN maka semua aksi pada fitur {{ $fitur->nama_fitur }} akan berstatus selesai
                </div>
            </section>
        </x-modalubah>
    </x-slot>
    <x-slot name="kodejs">
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_aksi = button.data('nama_aksi')
                var akses = button.data('akses')
                var status = button.data('status')
                var detail = button.data('detail')
                var label = button.data('label')
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #nama_aksi').val(nama_aksi);
                modal.find('.modal-body #akses').val(akses);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #detail').val(detail);
                modal.find('.modal-body #label').val(label);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-admin-layout>
