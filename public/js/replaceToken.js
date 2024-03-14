// replaceToken.js

const fs = require("fs");
const path = require("path");

// Fungsi rekursif untuk mengganti token API di semua file JavaScript dalam folder dan subfolder
function replaceTokenInFolder(folderPath, newToken) {
    // Baca semua file di dalam folder
    fs.readdir(folderPath, (err, files) => {
        if (err) {
            console.error("Error membaca folder:", err);
            return;
        }

        // Loop setiap file di dalam folder
        files.forEach((file) => {
            const filePath = path.join(folderPath, file);

            // Cek apakah yang dibaca adalah file
            fs.stat(filePath, (err, stats) => {
                if (err) {
                    console.error("Error memeriksa file:", err);
                    return;
                }

                if (stats.isFile()) {
                    // Jika yang dibaca adalah file JavaScript, ganti token API di dalamnya
                    if (file.endsWith(".js")) {
                        replaceTokenInFile(filePath, newToken);
                    }
                } else if (stats.isDirectory()) {
                    // Jika yang dibaca adalah folder, rekursif panggil fungsi untuk folder tersebut
                    replaceTokenInFolder(filePath, newToken);
                }
            });
        });
    });
}

// Fungsi untuk mengganti token API di file JavaScript
function replaceTokenInFile(filePath, newToken) {
    // Baca isi file
    fs.readFile(filePath, "utf8", (err, data) => {
        if (err) {
            console.error("Error membaca file:", err);
            return;
        }

        // Ganti token API dengan penggunaan variabel tokenApi
        const newData = data.replace(
            /wstoken='+tokenApi+'/g,
            "wstoken=" + newToken
        );

        // Tulis kembali isi file dengan nilai yang baru
        fs.writeFile(filePath, newData, "utf8", (err) => {
            if (err) {
                console.error("Error menulis file:", err);
                return;
            }
            console.log(`File ${filePath} telah diubah.`);
        });
    });
}

// Contoh penggunaan
const folderPath = "D:/Magang/Laravel/dashboard-monitoring/public/js"; // Ganti dengan path folder JS kamu
const newToken = "'+tokenApi+'"; // Token API yang baru dengan penggunaan variabel tokenApi
replaceTokenInFolder(folderPath, newToken);
