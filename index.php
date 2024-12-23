<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Data API</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold text-center mb-6">Realtime Data API</h1>

        <!-- Section: Data Table -->
        <div class="bg-white shadow rounded-lg p-6">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Sensor Value</th>
                        <th class="border px-4 py-2">Timestamp</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                    <!-- Data akan dimuat di sini oleh JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Fungsi untuk memuat data secara realtime
        function loadData() {
            $.ajax({
                url: "api.php", // Endpoint untuk mengambil data
                method: "GET",
                success: function (response) {
                    $("#data-table").html(response); // Masukkan data ke dalam tabel
                },
                error: function () {
                    alert("Gagal memuat data.");
                }
            });
        }

        // Panggil loadData secara realtime setiap 2 detik
        setInterval(loadData, 2000);

        // Load pertama kali
        loadData();
    </script>

</body>
</html>
