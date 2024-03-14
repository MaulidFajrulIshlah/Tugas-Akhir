function fetchIpAddressAndCheckStatus() {
    setTimeout(() => {
        fetch("https://ipinfo.io/json?token=8565ab0cd27018")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to fetch IP address data");
                }
                return response.json();
            })
            .then((data) => {
                console.log("IP Address Data:", data);
                const ipAddress = data.ip;
                console.log("IP Address:", ipAddress);
                const location =
                    ipAddress === "103.78.212.10" ? "dalam" : "luar";
                checkServerStatus(location);
            })
            .catch((error) => {
                console.error("Error during IP Address fetch:", error);
                showPopup("error", "Ada kesalahan saat cek status server.");
                setLastCheckedTime();
            });
    }, 1000);
}

async function checkServerStatus(location) {
    console.log("Checking Server Status for:", location);
    var apiUrl =
        "https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken='+tokenApi+'&wsfunction=core_course_get_categories&moodlewsrestformat=json";
    try {
        const response = await fetch(apiUrl);
        console.log("API Response:", response);
        if (response.status === 200) {
            showPopup("online", "Server lancar banget!", location);
        } else {
            showPopup("offline", "Server lagi down nih.", location);
        }
        setLastCheckedTime();
    } catch (error) {
        console.error("Error during fetch request:", error);
        showPopup("error", "Ada kesalahan saat cek status server.");
        setLastCheckedTime();
    }
}

function setLastCheckedTime() {
    // Simpan waktu terakhir disini
    var lastCheckedTime = new Date();
    console.log("Terakhir diperiksa pada:", lastCheckedTime);
}

function showPopup(status, message, location) {
    // Tampilkan popup atau pesan sesuai status server
    console.log("Status:", status);
    console.log("Message:", message);
    console.log("Location:", location);
}

// Panggil fungsi utama saat file dijalankan
fetchIpAddressAndCheckStatus();
