@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Rekaptulasi RPS')
@section('content')


    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Rekaptulasi RPS</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Rekaptulasi RPS</li>
    </ol>

    <div class="rekap-container">
        <div class="container mt-4 w-100">
            <div class="w-100 d-flex flex-column">
                <div class="w-100 d-flex justify-content-between">
                    <h1>Rekap Layar</h1>
                    <input class="my-2" type="text" id="searchInput" placeholder="Cari..."
                        style="width: 200px; border-radius: 5px; padding: 5px">
                </div>
            </div>
            <div class="table-responsive scrollable-table">
                <table class="table table-bordered table-striped w-100">
                    <thead class="sticky-top">
                        <tr>
                            <th>Semester</th>
                            <th>Dosen Pengampu</th>
                            <th>Mata Kuliah</th>
                            <th>RPS Lama</th>
                            <th>RPS Baru</th>
                            <th>Visi Misi</th>
                            <th>Kontrak</th>
                            <th>MKdoc</th>
                            <th>MKVid </th>
                            <th>ExURL</th>
                            <th>SynchronusURL</th>
                            <th>Tugas</th>
                            <th>Soal Latihan</th>
                            <th>Diskusi</th>
                            <th>K & S</th>
                            <th>RD</th>
                            <th>Lainnya</th>
                            <th>Ket. Lainnya</th>
                            <th>Kuis</th>
                            <th>A. Kuis</th>
                            <th>UTS</th>
                            <th>A. UTS</th>
                            <th>UAS</th>
                            <th>A. UAS</th>
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            <!-- ... -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi data dari tabel yang telah disusun -->
                        <!-- Data dummy untuk menunjukkan scrollable table -->
                        <!-- Gunakan loop atau tambahkan baris secara manual sesuai kebutuhan -->
                        <!-- ... -->
                        <tr>
                            <td>Ganjil 2021/2022</td><!-- SEMESTER -->
                            <td>Irwandi</td><!-- DOSEN -->
                            <td>Agama 1</td><!-- MATKUL -->
                            <td></td><!-- RPS Lama -->
                            <td></td><!-- RPS BARU -->
                            <td></td><!-- VISI MISI -->
                            <td></td><!-- KONTRAK -->
                            <td>14</td><!-- MKDOC -->
                            <td></td><!-- MKVID -->
                            <td></td><!-- EXURL -->
                            <td>14</td><!-- SYNC.URL -->
                            <td>1</td><!-- TUGAS -->
                            <td></td><!-- SOAL LAT -->
                            <td></td><!-- DISKUSI -->
                            <td></td><!-- K&S -->
                            <td></td><!-- RD -->
                            <td>1</td><!-- LAINNYA -->
                            <td>Pengumpulan Kartu Ujian</td><!-- KET. LAINNYA -->
                            <td></td><!-- KUIS -->
                            <td></td><!-- A. KUIS -->
                            <td></td><!-- UTS -->
                            <td>1</td><!-- A. UTS -->
                            <td></td><!-- UAS -->
                            <td>1</td><!-- A. UAS -->
                        </tr>

                        <tr>
                            <td>Ganjil 2021/2022</td><!-- SEMESTER -->
                            <td>Irwandi</td><!-- DOSEN -->
                            <td>Agama 1</td><!-- MATKUL -->
                            <td></td><!-- RPS Lama -->
                            <td></td><!-- RPS BARU -->
                            <td></td><!-- VISI MISI -->
                            <td></td><!-- KONTRAK -->
                            <td>14</td><!-- MKDOC -->
                            <td></td><!-- MKVID -->
                            <td></td><!-- EXURL -->
                            <td>14</td><!-- SYNC.URL -->
                            <td>1</td><!-- TUGAS -->
                            <td></td><!-- SOAL LAT -->
                            <td></td><!-- DISKUSI -->
                            <td></td><!-- K&S -->
                            <td></td><!-- RD -->
                            <td>1</td><!-- LAINNYA -->
                            <td>Pengumpulan Kartu Ujian</td><!-- KET. LAINNYA -->
                            <td></td><!-- KUIS -->
                            <td></td><!-- A. KUIS -->
                            <td></td><!-- UTS -->
                            <td>1</td><!-- A. UTS -->
                            <td></td><!-- UAS -->
                            <td>1</td><!-- A. UAS -->
                        </tr>

                        <tr>
                            <td>Ganjil 2021/2022</td><!-- SEMESTER -->
                            <td>Irwandi</td><!-- DOSEN -->
                            <td>Agama 1</td><!-- MATKUL -->
                            <td></td><!-- RPS Lama -->
                            <td></td><!-- RPS BARU -->
                            <td></td><!-- VISI MISI -->
                            <td></td><!-- KONTRAK -->
                            <td>14</td><!-- MKDOC -->
                            <td></td><!-- MKVID -->
                            <td></td><!-- EXURL -->
                            <td>14</td><!-- SYNC.URL -->
                            <td>1</td><!-- TUGAS -->
                            <td></td><!-- SOAL LAT -->
                            <td></td><!-- DISKUSI -->
                            <td></td><!-- K&S -->
                            <td></td><!-- RD -->
                            <td>1</td><!-- LAINNYA -->
                            <td>Pengumpulan Kartu Ujian</td><!-- KET. LAINNYA -->
                            <td></td><!-- KUIS -->
                            <td></td><!-- A. KUIS -->
                            <td></td><!-- UTS -->
                            <td>1</td><!-- A. UTS -->
                            <td></td><!-- UAS -->
                            <td>1</td><!-- A. UAS -->
                        </tr>

                        <tr>
                            <td>Ganjil 2021/2022</td><!-- SEMESTER -->
                            <td>Irwandi</td><!-- DOSEN -->
                            <td>Agama 1</td><!-- MATKUL -->
                            <td></td><!-- RPS Lama -->
                            <td></td><!-- RPS BARU -->
                            <td></td><!-- VISI MISI -->
                            <td></td><!-- KONTRAK -->
                            <td>14</td><!-- MKDOC -->
                            <td></td><!-- MKVID -->
                            <td></td><!-- EXURL -->
                            <td>14</td><!-- SYNC.URL -->
                            <td>1</td><!-- TUGAS -->
                            <td></td><!-- SOAL LAT -->
                            <td></td><!-- DISKUSI -->
                            <td></td><!-- K&S -->
                            <td></td><!-- RD -->
                            <td>1</td><!-- LAINNYA -->
                            <td>Pengumpulan Kartu Ujian</td><!-- KET. LAINNYA -->
                            <td></td><!-- KUIS -->
                            <td></td><!-- A. KUIS -->
                            <td></td><!-- UTS -->
                            <td>1</td><!-- A. UTS -->
                            <td></td><!-- UAS -->
                            <td>1</td><!-- A. UAS -->
                        </tr>

                        <tr>
                            <td>Ganjil 2021/2022</td><!-- SEMESTER -->
                            <td>Irwandi</td><!-- DOSEN -->
                            <td>Agama 1</td><!-- MATKUL -->
                            <td></td><!-- RPS Lama -->
                            <td></td><!-- RPS BARU -->
                            <td></td><!-- VISI MISI -->
                            <td></td><!-- KONTRAK -->
                            <td>14</td><!-- MKDOC -->
                            <td></td><!-- MKVID -->
                            <td></td><!-- EXURL -->
                            <td>14</td><!-- SYNC.URL -->
                            <td>1</td><!-- TUGAS -->
                            <td></td><!-- SOAL LAT -->
                            <td></td><!-- DISKUSI -->
                            <td></td><!-- K&S -->
                            <td></td><!-- RD -->
                            <td>1</td><!-- LAINNYA -->
                            <td>Pengumpulan Kartu Ujian</td><!-- KET. LAINNYA -->
                            <td></td><!-- KUIS -->
                            <td></td><!-- A. KUIS -->
                            <td></td><!-- UTS -->
                            <td>1</td><!-- A. UTS -->
                            <td></td><!-- UAS -->
                            <td>1</td><!-- A. UAS -->
                        </tr>
                        <!-- Data dummy lainnya -->
                        <!-- ... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.7.0/js/bootstrap.bundle.min.js"></script>


@endsection
