@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <div class="row g-3 my-3">
        
        @yield('card')

        @can('admin')
        {{-- Table Status Suspend --}}
            <div class="row my-5">
                <h5 class="mb-3 fw-bold title">Daftar Pengguna Dengan Status Suspend</h5>
                <div class="content mx-2 col bg-white p-3 rounded card">
                    <table id="suspend" class="table table-bordered table-hover cell-border">
                        <thead class="table-success">
                            <tr class="text">
                                <th scope="col" class="text" width="50">No</th>
                                <th scope="col" class="text">Nama</th>
                                <th scope="col" class="text">Username</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <tr>
                                <td scope="text">1</td>
                                <td class="text">Admin Mubarik Ahmad</td>
                                <td class="text">admin_mubarik</td>
                            </tr>
                                    
                            <tr>
                                <td scope="text">2</td>
                                <td class="text">Operator Dimas Aldi Pratama</td>
                                <td class="text">op_dimas</td>
                            </tr>
                                        
                            <tr>
                                <td scope="text">3</td>
                                <td class="text">Admin Wardiyono</td>
                                <td class="text">admin_wardiyono</td>
                            </tr>
                                        
                            <tr>
                                <td scope="text">4</td>
                                <td class="text">Dede Pratiwi</td>
                                <td class="text">dede.pratiwi</td>
                            </tr>
                                    
                            <tr>
                                <td scope="text">5</td>
                                <td class="text">Yana Adharani</td>
                                <td class="text">yana.adharani</td>
                            </tr>
                                    
                            <tr>
                                <td scope="text">6</td>
                                <td class="text">Jullend Gatc</td>
                                <td class="text">jullendgatc</td>
                            </tr>
                                        
                            <tr>
                                <td scope="text">7</td>
                                <td class="text">AFNAN SUHALYA</td>
                                <td class="text">afnan.suhalya</td>
                            </tr>
                                        
                            <tr>
                                <td scope="text">8</td>
                                <td class="text">DIYANTARI</td>
                                <td class="text">diyantari</td>
                            </tr>
                                        
                            <tr>
                                <td scope="text">9</td>
                                <td class="text">MOHAMMAD FERNANDA LEVIGTA</td>
                                <td class="text">fernanda.levigta</td>
                            </tr>
                                        
                            <tr>
                                <td scope="text">10</td>
                                <td class="text">ISTIQLALIAH NURUL</td>
                                <td class="text">istiqlaliah.nurul</td>
                            </tr>
                            <tr>
                                <td scope="text">11</td>
                                <td class="text">KARYONO MIHARTA</td>
                                <td class="text">karyono.miharta</td>
                            </tr>
                            <tr>
                                <td scope="text">12</td>
                                <td class="text">NANDA OCTAVIA</td>
                                <td class="text">nanda.octavia</td>
                            </tr>
                            <tr>
                                <td scope="text">13</td>
                                <td class="text">PANGKUH AJISOKO</td>
                                <td class="text">pangkuh.ajisoko</td>
                            </tr>
                            <tr>
                                <td scope="text">14</td>
                                <td class="text">RITA AMALIA</td>
                                <td class="text">rita.amalia</td>
                            </tr>
                            <tr>
                                <td scope="text">15</td>
                                <td class="text">YETTY WANNY MUALIM</td>
                                <td class="text">yetty.wanny</td>
                            </tr>
                            <tr>
                                <td scope="text">16</td>
                                <td class="text">YULIANTI</td>
                                <td class="text">yulianti</td>
                            </tr>
                            <tr>
                                <td scope="text">17</td>
                                <td class="text">Juliani Kusumaputra</td>
                                <td class="text">juliani.kusumaputra</td>
                            </tr>
                            <tr>
                                <td scope="text">18</td>
                                <td class="text">Nofikha Nasution</td>
                                <td class="text">nofikha.nasution</td>
                            </tr>
                            <tr>
                                <td scope="text">19</td>
                                <td class="text">Muhammad Haris</td>
                                <td class="text">m.haris</td>
                            </tr>
                            <tr>
                                <td scope="text">20</td>
                                <td class="text">Juliani Juliani</td>
                                <td class="text">juliani</td>
                            </tr>
                            <tr>
                                <td scope="text">21</td>
                                <td class="text">Liana Zulfa</td>
                                <td class="text">liana.zulfa</td>
                            </tr>
                            <tr>
                                <td scope="text">22</td>
                                <td class="text">Tiara Antasari</td>
                                <td class="text">tiara.antasari</td>
                            </tr>
                            <tr>
                                <td scope="text">23</td>
                                <td class="text">Aldila Aldila</td>
                                <td class="text">aldila</td>
                            </tr>
                            <tr>
                                <td scope="text">24</td>
                                <td class="text">Rika Nuraisyah</td>
                                <td class="text">rika.nuraisyah</td>
                            </tr>
                            <tr>
                                <td scope="text">25</td>
                                <td class="text">Nicky Nurfajri</td>
                                <td class="text">nicky.nurfajri</td>
                            </tr>
                            <tr>
                                <td scope="text">26</td>
                                <td class="text">Agung Priambodo</td>
                                <td class="text">agung.priambodo</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!--col-->
            </div> <!--row my-5-->
        @endcan
    </div> <!-- /row g-3 my-3 -->

    <script>
        $(document).ready(function() {
            let table = new DataTable('#suspend');
        });
    </script>
@endsection