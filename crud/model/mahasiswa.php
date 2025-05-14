<?php
session_start();
class Mahasiswa {
    private $conn;
    private $table_name = "mahasiswa";

    public $id;
    public $nim;
    public $nama;
    public $jurusan;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nim, nama, jurusan) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $this->nim, $this->nama, $this->jurusan);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = "Data berhasil disimpan!";
            header("Location: ".BASE_URL."index.php?msg=1");
        } else {
            $_SESSION['flash_message'] = "Data gagal disimpan!";
            header("Location:" .BASE_URL. "index.php?msg=0");
        }
    }

    public function read($id = "") {
        if ($id == "") {
            $query = "SELECT * FROM " . $this->table_name;
        } else {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = " . intval($id);
        }

        return $this->conn->query($query);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nim=?, nama=?, jurusan=? WHERE id=?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("sssi", $this->nim, $this->nama, $this->jurusan, $this->id);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = "Data berhasil diupdate!";
            header("Location: " .BASE_URL. "index.php?msg=1");
        } else {
            $_SESSION['flash_message'] = "Data gagal diupdate!";
            header("Location:" .BASE_URL. "index.php?msg=0");
        }
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("i", $this->id);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = "Data berhasil dihapus!";
            header("Location: " .BASE_URL. "index.php?msg=1");
        } else {
            $_SESSION['flash_message'] = "Data gagal dihapus!";
            header("Location:" .BASE_URL. "index.php?msg=0");
        }
    }
}
?>
