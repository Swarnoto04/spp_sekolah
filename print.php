<?php

require_once __DIR__ . '/bootstrap.php';

$transaction_id = $_GET['id'] ?? null;
$nis = $_GET['nis'] ?? null;

if (!checkAuth()) {

    redirect('/login.php');
}

if (!$transaction_id) {

    redirect();
}

$statement = $connection->prepare("
    SELECT transactions.*, students.*, classrooms.name AS classroom_name, users.name AS student_name FROM transactions 
    JOIN students ON transactions.student_id = students.id 
    JOIN classrooms ON students.classroom_id = classrooms.id 
    JOIN users ON students.user_id = users.id 
    WHERE transactions.id = ? LIMIT 1
");

$statement->bind_param("i", $transaction_id);

$statement->execute();

$transaction = $statement->get_result()->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        td,
        th {
            padding: 0.5rem 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            font-weight: bold;
        }

        .table td,
        .table th {
            border: 1px solid black;
        }
    </style>

    <title>Document</title>
</head>

<body>

    <div style="text-align: center; padding: 0 3rem;">

        <h4 style="text-transform: uppercase; font-weight: 600;">SMK Balai Perguruan Putri Bandung</h4>
        <h4 style="text-transform: uppercase; font-weight: 600;">Jl. Van Deventer No.14, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112</h4>
        <h4 style="font-weight: 600;">Telp. 081221773164</h4>

        <hr>

        <h4 style="text-transform: uppercase;">Bukti Pembayaran</h4>

        <table style="width: 100%; text-align: left;">
            <tr>
                <th style="width: 10%;">Nama</th>
                <td>: <?php echo $transaction['student_name'] ?? '' ?></td>
                <th style="width: 10%;">Kelas</th>
                <td>: <?php echo $transaction['classroom_name'] ?? '' ?></td>
            </tr>
            <tr>
                <th style="width: 10%;">NIS</th>
                <td>: <?php echo $transaction['nis'] ?? '' ?></td>
                <th style="width: 10%;">Tahun Ajaran</th>
                <td>: <?php echo $transaction['school_year'] ?? '' ?></td>
            </tr>
        </table>

        <table style="margin-top: 1.5rem;" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Untuk Bulan</th>
                    <th>Uang Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo date('F', strtotime($transaction['billing_date'])) ?></td>
                    <td>Rp. <?php echo number_format($transaction['cost']) ?? '' ?></td>
                    <td>LUNAS</td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; text-align: right; margin-top: 2rem;">
            <tr>
                <td></td>
                <td style="width: 25%;">
                    <div style="text-align: center;">
                        Bandung, <?php echo date('d F Y', strtotime($transaction['transaction_date'])) ?> <br> Bendahara
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 35%;">
                    <div style="text-align: center; margin-top: 4rem;">
                        <hr>
                    </div>
                </td>
            </tr>
        </table>

    </div>

    <script>
        window.print();

        window.onafterprint = function() {
            window.location.replace('<?php echo APP_URL . '?page=transactions&nis=' . $nis ?>')
        }
    </script>

</body>

</html>