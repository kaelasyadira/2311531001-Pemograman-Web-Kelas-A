<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OOP - Create</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #00796b; 
        }
        .btn-primary {
            background-color: #00796b; 
            border: none;
        }
        .btn-primary:hover {
            background-color: #004d40; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Mahasiswa</h1>
        <form action="function/Mahasiswa.php?action=create" method="post">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
