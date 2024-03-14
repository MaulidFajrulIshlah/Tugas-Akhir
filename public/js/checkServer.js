// document.addEventListener("DOMContentLoaded", function () {
    setTimeout(fetchIpAddressAndCheckStatus, 1000);

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
                    showPopup(
                        "error",
                        "There was an error while checking the server status."
                    );
                    setLastCheckedTime();
                });
        }, 1000);
    }

    function checkServerStatus(location) {
        console.log("Checking Server Status for:", location);
        var apiUrl =
            "https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=''+tokenApi+''&wsfunction=core_course_get_categories&moodlewsrestformat=json";
        fetch(apiUrl)
            .then((response) => {
                console.log("API Response:", response);
                if (response.status === 200) {
                    showPopup(
                        "online",
                        "Server is running smoothly.",
                        location
                    );
                } else {
                    showPopup("offline", "Server is currently down.", location);
                }
                setLastCheckedTime();
            })
            .catch((error) => {
                console.error("Error during fetch request:", error);
                showPopup(
                    "error",
                    "There was an error while checking the server status."
                );
                setLastCheckedTime();
            });
    }

    const lastExecutedTime = document.getElementById("last-executed-time");

    function setLastCheckedTime() {
        var currentTime = new Date();
        localStorage.setItem("last_executed_time", JSON.stringify(currentTime));
        var lastCheckedElement = document.getElementById("last-checked");
        var options = {
            day: "numeric",
            month: "numeric",
            year: "numeric",
            hour: "numeric",
            minute: "numeric",
            second: "numeric",
        };
        lastCheckedElement.textContent =
            "Last Checked: " +
            currentTime.toLocaleDateString(undefined, options);
    }

    function showPopup(status, message, location) {
        var popup;
        if (status === "online") {
            popup =
                location === "dalam"
                    ? document.getElementById("card-online-dalam")
                    : document.getElementById("card-online-luar");
        } else if (status === "offline") {
            popup =
                location === "dalam"
                    ? document.getElementById("card-offline-dalam")
                    : document.getElementById("card-offline-luar");
        } else {
            popup = document.getElementById("card-error");
            document.getElementById("server-status").textContent = "ERROR";
            document.getElementById("server-details").textContent =
                "There was an error while checking the server status."; // Ganti pesan sesuai kebutuhan
        }
        popup.style.display = "block";
    }
// });
