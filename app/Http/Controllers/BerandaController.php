<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;


use App\Mail\SendEmail;
use Carbon\Carbon;

class BerandaController extends Controller
{
    //

    public function index()
    {
        if (!session('id_role')) {
            return redirect('forbidden');
        } else if (session('id_role') === 1) {
            // Bagian ini untuk admin
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.card.admin');
        } else if (session('id_role') === 2 || session('id_role') === 3) {
            // Bagian ini untuk dekanat_tendik
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.card.dekanat_tendik');
        } else if (session('id_role') === 4 || session('id_role') === 5) {
            // Bagian ini untuk prodi
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.card.prodi');
        }
    }


    public function cekMasaBerakhirSSL(Request $request)
    {
        $context = stream_context_create([
            "ssl" => [
                "capture_peer_cert" => true,
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ]);

        $hostname = "layar.yarsi.ac.id";
        $res = stream_socket_client("ssl://" . $hostname . ":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);

        if ($res) {
            $params = stream_context_get_params($res);
            $certificate = $params['options']['ssl']['peer_certificate'];
            $valid_to = openssl_x509_parse($certificate)['validTo_time_t'];
            $days_left = ($valid_to - time()) / (60 * 60 * 24);
            $sslData = round($days_left);

            return view('dashboard.card.admin', ['days_left' =>  $sslData]);
        } else {
            return view('dashboard.card.admin', ['days_left' => 'Gagal mendapatkan informasi sertifikat SSL.']);
        }
    }

    public function KirimEmailSSl(Request $request)
    {
        $context = stream_context_create([
            "ssl" => [
                "capture_peer_cert" => true,
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ]);

        $hostname = "layar.yarsi.ac.id";
        $res = stream_socket_client("ssl://" . $hostname . ":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);

        if ($res) {
            $params = stream_context_get_params($res);
            $certificate = $params['options']['ssl']['peer_certificate'];
            $valid_to = openssl_x509_parse($certificate)['validTo_time_t'];
            $days_left = ($valid_to - time()) / (60 * 60 * 24);
            $sslData = round($days_left);

            return view('cek-ssl', ['days_left' =>  $sslData]);
        } else {
            return view('cek-ssl', ['days_left' => 'Gagal mendapatkan informasi sertifikat SSL.']);
        }
    }
}
