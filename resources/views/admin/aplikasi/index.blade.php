<x-admin-layout title="Data Aplikasi">
    <x-slot name="content">
        <div class="page-heading">
            <x-header head="Data Aplikasi" active="Daftar Aplikasi">
            </x-header>
            <section class="section">
                <div class="row">
                    <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah Aplikasi</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Aksi</th>
                                        <th>Nama Aplikasi</th>
                                        <th>Nama Client</th>
                                        <th>Tanggal Awal Proyek</th>
                                        <th>Tanggal Akhir Proyek</th>
                                        <th>Level</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @forelse ($aplikasi as $item)
                                    <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">
                                                <x-aksi :id="$item->id" link="aplikasi" detail="TRUE">
                                                    <button type="button" data-bs-toggle="modal"  data-nama_aplikasi="{{ $item->nama_aplikasi }}"  data-nama_client="{{ $item->nama_client }}"  data-tgl_awalproyek="{{ $item->tgl_awalproyek }}" data-tgl_akhirproyek="{{ $item->tgl_akhirproyek }}" data-keterangan="{{ $item->keterangan }}"  data-level="{{ $item->level }}" data-id="{{ $item->id }}" data-bs-target="#ubah" title="" class="dropdown-item text-success" data-original-title="Edit Task">
                                                        <i class="fa fa-edit" style="width: 20px;"></i> EDIT
                                                    </button>
                                                </x-aksi>
                                            </td>
                                            <td>{{ $item->nama_aplikasi}}</td>
                                            <td>{{ $item->nama_client}}</td>
                                            <td>{{ $item->tgl_awalproyek}}</td>
                                            <td>{{ $item->tgl_akhirproyek}}</td>
                                            <td>{{ $item->level}}</td>
                                            <td>{{ $item->keterangan}}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="8">tidak ada data</td>
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
        <x-modalsimpan judul="Tambah Aplikasi" link="aplikasi">
            <section class="p-3">
                <div class="form-group">
                        <label for="">Nama Aplikasi</label>
                        <input type="text" name="nama_aplikasi" id="nama_aplikasi" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Nama Client</label>
                        <input type="text" name="nama_client" id="nama_client" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal awal proyek</label>
                    <input type="date" name="tgl_awalproyek" id="tgl_awalproyek" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal akhir proyek</label>
                    <input type="date" name="tgl_akhirproyek" id="tgl_akhirproyek" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Level</label>
                        <input type="text" name="level" id="level" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalsimpan>
        <x-modalubah judul="ubah data Aplikasi" link="aplikasi">
            <section class="p-3">
                <div class="form-group">
                    <label for="">Nama Aplikasi</label>
                    <input type="text" name="nama_aplikasi" id="nama_aplikasi" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Nama Client</label>
                        <input type="text" name="nama_client" id="nama_client" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal awal proyek</label>
                    <input type="date" name="tgl_awalproyek" id="tgl_awalproyek" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal akhir proyek</label>
                    <input type="date" name="tgl_akhirproyek" id="tgl_akhirproyek" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Level</label>
                        <input type="text" name="level" id="level" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </section>
        </x-modalubah>
    </x-slot>
    <x-slot name="kodejs">
        <script>
            $('#ubah').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama_aplikasi = button.data('nama_aplikasi')
                var nama_client = button.data('nama_client')
                var tgl_awalproyek = button.data('tgl_awalproyek')
                var tgl_akhirproyek = button.data('tgl_akhirproyek')
                var keterangan = button.data('keterangan')
                var level = button.data('level')
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #nama_aplikasi').val(nama_aplikasi);
                modal.find('.modal-body #nama_client').val(nama_client);
                modal.find('.modal-body #tgl_awalproyek').val(tgl_awalproyek);
                modal.find('.modal-body #tgl_akhirproyek').val(tgl_akhirproyek);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #level').val(level);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-admin-layout>
