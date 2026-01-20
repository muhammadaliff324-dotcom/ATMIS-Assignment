<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Bil Elektrik - Tugasan PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f7f6; padding-top: 50px; }
        .card { border-radius: 15px; border: none; }
        .card-header { border-radius: 15px 15px 0 0 !important; }
        .hasil { font-size: 1.1rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h4 class="mb-0">Kalkulator Penggunaan Elektrik</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Voltan (V)</label>
                            <input type="number" step="0.01" name="voltage" class="form-control" placeholder="Masukkan Voltan (V)" required>
                        </div>
                        <div class="form-group">
                            <label>Arus (A)</label>
                            <input type="number" step="0.01" name="current" class="form-control" placeholder="Masukkan Arus (A)" required>
                        </div>
                        <div class="form-group">
                            <label>Kadar Semasa (sen/kWh)</label>
                            <input type="number" step="0.01" name="rate" class="form-control" placeholder="Masukkan Kadar (Contoh: 21.8)" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block shadow-sm">Kira Sekarang</button>
                    </form>

                    <?php
                    // Memproses data selepas butang ditekan
                    if (isset($_POST['submit'])) {
                        $voltage = $_POST['voltage'];
                        $current = $_POST['current'];
                        $rate = $_POST['rate'];

                        /**
                         * Fungsi Utama untuk mengira kadar elektrik
                         * Parameter: Voltan, Arus, Kadar, Jam
                         */
                        function kiraKadarElektrik($V, $A, $R, $jam) {
                            // 1. Kira Kuasa: Power (Wh) = Voltage (V) * Current (A)
                            $power_wh = $V * $A;

                            // 2. Kira Tenaga: Energy (kWh) = (Power * Hour) / 1000
                            // Nota: Kita bahagi 1000 untuk tukar Wh ke kWh
                            $energy_kwh = ($power_wh * $jam) / 1000;

                            // 3. Kira Jumlah: Total = Energy(kWh) * (current rate/100)
                            $total_charge = $energy_kwh * ($R / 100);

                            return [
                                'kuasa' => $power_wh,
                                'tenaga' => $energy_kwh,
                                'jumlah' => $total_charge
                            ];
                        }

                        // Jalankan fungsi untuk per jam (1 jam) dan per hari (24 jam)
                        $per_jam = kiraKadarElektrik($voltage, $current, $rate, 1);
                        $per_hari = kiraKadarElektrik($voltage, $current, $rate, 24);

                        echo "<hr class='my-4'>";
                        echo "<div class='alert alert-secondary text-center'><strong>Keputusan Pengiraan</strong></div>";
                        
                        // Paparan Keputusan
                        echo "<div class='row'>";
                            // Kotak Per Jam
                            echo "<div class='col-6 border-right'>";
                                echo "<h6 class='text-primary text-center'>Setiap Jam</h6>";
                                echo "<div class='hasil mt-3'>";
                                    echo "Power: <b>{$per_jam['kuasa']}</b> Wh<br>";
                                    echo "Energy: <b>" . number_format($per_jam['tenaga'], 5) . "</b> kWh<br>";
                                    echo "Total: <b>RM " . number_format($per_jam['jumlah'], 2) . "</b>";
                                echo "</div>";
                            echo "</div>";

                            // Kotak Per Hari
                            echo "<div class='col-6'>";
                                echo "<h6 class='text-success text-center'>Setiap Hari (24j)</h6>";
                                echo "<div class='hasil mt-3'>";
                                    echo "Power: <b>{$per_hari['kuasa']}</b> Wh<br>";
                                    echo "Energy: <b>" . number_format($per_hari['tenaga'], 5) . "</b> kWh<br>";
                                    echo "Total: <b>RM " . number_format($per_hari['jumlah'], 2) . "</b>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="card-footer text-center text-muted">
                    <small>Dibuat menggunakan PHP & Bootstrap 4</small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>