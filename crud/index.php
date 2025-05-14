<?php
include 'function/Alert.php';
include_once './config/Database.php';
include_once './model/mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new Mahasiswa($db);
$result = $mahasiswa->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP - CRUD</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e0f7fa; 
            color: #004d40; 
        }
        .container {
            margin-top: 50px;
            border-radius: 10px;
            background-color: #ffffff; 
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h4 {
            text-align: center;
            margin-bottom: 30px;
            color: #00796b; 
        }
        .btn-success {
            background-color: #00796b; 
            border: none;
        }
        .btn-success:hover {
            background-color: #004d40; 
        }
        .btn-soft-warning {
            background-color: #fff3cd; 
            color: #856404; 
            border: 1px solid #ffeeba;
        }
        .btn-soft-warning:hover {
            background-color: #ffe8a1; 
            color: #664d03;
        }
        .btn-soft-danger {
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb;
        }
        .btn-soft-danger:hover {
            background-color: #f1aeb5; 
            color: #491217;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .pagination .page-link {
            color: #00796b; 
        }
        .pagination .page-link:hover {
            background-color: #e0f7fa; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Data Mahasiswa</h4>
        <div class="text-end mb-3">
            <a class="btn btn-success" href="create.php">Tambah Mahasiswa</a>
        </div>

        <?php
        if (isset($_SESSION['flash_message']) && isset($_GET['msg'])) { 
            if ($_GET['msg'] == '1') { 
                alert($_SESSION['flash_message'], 1); 
            } else { 
                alert($_SESSION['flash_message'], 0); 
            } 
        } 
        ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>JURUSAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['jurusan'] ?></td>
                            <td>
                                <a class="btn btn-soft-warning btn-sm" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                                <a class="btn btn-soft-danger btn-sm" href="function/Mahasiswa.php?action=delete&&id=<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus data <?php echo $row['nama']; ?>?');">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
  </body> 
</html> 