<x-admin-layout title="Data Aplikasi">
    <x-slot name="content">
        <div class="page-heading">
            <x-header head="Data Aplikasi {{ $aplikasi->nama_aplikasi }}" active="Detail">
            </x-header>
            <section class="section">
                <div class="row">
                    <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah Fitur</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Aksi</th>
                                        <th>Nama Fitur</th>
                                        <th>Tabel</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @forelse ($aplikasi->fitur as $item)
                                    <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">
                                                <x-aksi :id="$item->id" link="fitur" detail="TRUE">
                                                    <button type="button" data-bs-toggle="modal"  data-nama_fitur="{{ $item->nama_fitur }}"  data-tabel="{{ $item->tabel }}" data-deskripsi="{{ $item->deskripsi }}" data-id="{{ $item->id }}" data-bs-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit" style="width: 20px;"></i> EDIT
                                                    </button>
                                                </x-aksi>
                                            </td>
                                            <td>{{ $item->nama_fitur}}</td>
                                            <td>{{ $item->tabel}}</td>
                                            <td>{{ $item->deskripsi}}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">tidak ada data</td>
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
        <x-modalsimpan judul="Tambah Fitur" link="fitur">
            <section class="p-3">
                <input type="hidden" name="aplikasi_id" value="{{ $aplikasi->id }}">
                <div class="form-group">
                        <label for="">Nama Fitur</label>
                        <input type="text" name="nama_fitur" id="nama_fitur" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Tabel</label>
                        <input type="text" name="tabel" id="tabel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalsimpan>
        <x-modalubah judul="ubah data Fitur" link="fitur">
            <section class="p-3">
                <div class="form-group">
                    <label for="">Nama Fitur</label>
                    <input type="text" name="nama_fitur" id="nama_fitur" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Tabel</label>
                        <input type="text" name="tabel" id="tabel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalubah>
    </x-slot>
    <x-slot name="kodejs">
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_fitur = button.data('nama_fitur')
                var tabel = button.data('tabel')
                var deskripsi = button.data('deskripsi')
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #nama_fitur').val(nama_fitur);
                modal.find('.modal-body #tabel').val(tabel);
                modal.find('.modal-body #deskripsi').val(deskripsi);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-admin-layout>