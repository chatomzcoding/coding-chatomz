<x-admin-layout title="Data Aplikasi">
    <x-slot name="content">
        <div class="page-heading">
            <x-header head="Data Aplikasi {{ $fitur->aplikasi->nama_aplikasi }}" p="Fitur {{ ucwords($fitur->nama_fitur) }}" active="Detail">
            </x-header>
            <section class="section">
                <div class="row">
                    <div class="card">
                    <div class="card-header">
                        <a href="{{ url('aplikasi/'.$fitur->aplikasi->id) }}" class="btn btn-outline-secondary btn-flat btn-sm"><i class="fas fa-angle-left"></i> Kembali</a>
                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah Aksi</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Aksi</th>
                                        <th>Nama Aksi</th>
                                        <th>Akses</th>
                                        <th>Detail</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @forelse ($fitur->aksi as $item)
                                    <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">
                                                <x-aksi :id="$item->id" link="aksi" detail="TRUE">
                                                    <button type="button" data-bs-toggle="modal"  data-nama_aksi="{{ $item->nama_aksi }}"  data-akses="{{ $item->akses }}" data-status="{{ $item->status }}" data-detail="{{ $item->detail }}" data-id="{{ $item->id }}" data-bs-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit" style="width: 20px;"></i> EDIT
                                                    </button>
                                                </x-aksi>
                                            </td>
                                            <td class="text-center">{!! uiAksi($item->nama_aksi)!!}</td>
                                            <td>{{ $item->akses}}</td>
                                            <td>{{ $item->detail}}</td>
                                            <td class="text-center">{!! uiStatus($item->status)!!}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6">tidak ada data</td>
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
                        <label for="">Akses</label>
                        <div>
                            @foreach (listakseslevel($fitur->aplikasi->level) as $item)
                                <input type="checkbox" name="akses[]" value="{{ $item }}"> {{ $item }} <br>
                            @endforeach
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (liststatusaksi() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalsimpan>
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
                        <label for="">Akses</label>
                        <input type="text" id="akses" class="form-control" readonly>
                        <div>
                            @foreach (listakseslevel($fitur->aplikasi->level) as $item)
                                <input type="checkbox" name="akses[]" value="{{ $item }}"> {{ $item }} <br>
                            @endforeach
                        </div>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach (liststatusaksi() as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="3" class="form-control"></textarea>
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
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #nama_aksi').val(nama_aksi);
                modal.find('.modal-body #akses').val(akses);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #detail').val(detail);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-admin-layout>
