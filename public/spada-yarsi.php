<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

// URL halaman SPADA yang akan di-scraper
$url = 'https://spada.kemdikbud.go.id/course/lldikti/lldikti-iii';

// Inisialisasi client HTTP
$client = HttpClient::create();

// Request halaman SPADA
$response = $client->request('GET', $url);
$content = $response->getContent();

// Inisialisasi Crawler untuk memproses konten halaman
$crawler = new Crawler($content);

// Cek apakah halaman berisi informasi tentang Universitas YARSI
if ($crawler->filter('h4:contains("Universitas YARSI")')->count() > 0) {
    echo 'terdaftar';
} else {
    echo 'belum terdaftar';
}

?>
