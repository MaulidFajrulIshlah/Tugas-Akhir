@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Master Data')
@section('content')
        <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Master Data</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('masterUser') }}">Master Data</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>

        <div class="row g-3 my-3">
            <div class="col mx-2 bg-white p-3 rounded card" id="wrapper-content">
                <div class="row mb-4 content">
                    <h5 class="mb-2 fw-bold text">Data Pengguna</h5>
                    <span class="fs-6 mb-3 text">Berikut adalah data pengguna dashboard PANDAY</span>
                    <hr /> 
                    {{-- Pesan Sukses --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success mx-2" style="width:50%" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table id="data-table" class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Username</th>
                                    <th scope="col" class="text">Peranan</th>
                                    <th scope="col" class="text">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            function createurl() {
                window.location.href = '/masterdata/pengguna/create';
            }


            function confirmDelete() {
                return confirm("Apakah Anda yakin ingin menghapusnya?");
            }

            $(document).ready(function(){
                // Simpan instance DataTable dalam variabel untuk referensi nanti
                let dataTable = $('#data-table').DataTable();

                // Hancurkan instance DataTable yang ada
                dataTable.destroy();
                
                $('#data-table').DataTable({
                    destroy: true,
                    processing: true,
                    ajax: '{{ route("masterUser") }}', // Ganti dengan URL yang sesuai
                    columns: [
                        { 
                            data: null,
                            render: function(data, type, row, index) {
                                return index.row + index.settings._iDisplayStart + 1; // Menggunakan meta.row untuk mendapatkan nomor iterasi
                            }
                        },
                        { 
                            data: 'username',
                            name: 'username',
                            render: function(data, type, row) {
                                if (data != null) {
                                    return data;
                                } else {
                                    return '-- Pengguna Belum Login --';
                                }
                            }
                        },
                        { 
                            data: 'role.nama',
                            name: 'peranan',
                            render: function(data, type, row) {
                                console.log('Data:', data);
                                console.log('Row:', row);
                                if (data != null) {
                                    return data;
                                } else {
                                    return '-- Tunggu Penugasan dari Tim DPJJ --';
                                }
                            }
                        },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
@endsection