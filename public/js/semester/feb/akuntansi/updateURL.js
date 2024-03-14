const fs = require('fs');
const path = require('path');

// Fungsi untuk update URL di satu file
function updateFile(filePath, oldToken, newToken) {
    try {
        let fileContent = fs.readFileSync(filePath, 'utf8');
        fileContent = fileContent.replace(new RegExp(oldToken, 'g'), newToken);
        fs.writeFileSync(filePath, fileContent, 'utf8');
        console.log(`File ${filePath} berhasil diupdate.`);
    } catch (err) {
        console.error(`Gagal update file ${filePath}: ${err}`);
    }
}

// Fungsi untuk nge-loop semua file dalam satu folder
function updateFilesInFolder(folderPath, oldToken, newToken) {
    fs.readdir(folderPath, (err, files) => {
        if (err) {
            console.error(`Gagal membaca folder ${folderPath}: ${err}`);
            return;
        }
        files.forEach(file => {
            const filePath = path.join(folderPath, file);
            // Cek apakah file adalah direktori atau file
            fs.stat(filePath, (err, stats) => {
                if (err) {
                    console.error(`Gagal membaca file ${filePath}: ${err}`);
                    return;
                }
                if (stats.isDirectory()) {
                    // Jika direktori, maka rekursif panggil updateFilesInFolder untuk direktori tersebut
                    updateFilesInFolder(filePath, oldToken, newToken);
                } else if (stats.isFile()) {
                    // Jika file, maka lakukan update
                    updateFile(filePath, oldToken, newToken);
                }
            });
        });
    });
}


// Panggil fungsi untuk update semua file dalam satu folder
const folderPath = 'D:/Magang/Laravel/dashboard-monitoring/public/js/semester/feb/akuntansi';
const oldToken = '76debee2b62a3d38a48963f60b5c76ee';
const newToken = '76debee2b62a3d38a48963f60b5c76ee';

updateFilesInFolder(folderPath, oldToken, newToken);
