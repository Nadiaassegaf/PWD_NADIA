<?php
class Produk {
    private $conn;
    private $table = "produk";

    public function __construct($db) {
        $this->conn = $db;
    }

    // ===============================
    // AMBIL SEMUA DATA
    // ===============================
    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===============================
    // AMBIL DATA BERDASARKAN ID
    // ===============================
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id_produk = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ===============================
    // TAMBAH DATA
    // ===============================
    public function tambah($data) {
        $query = "INSERT INTO {$this->table}
                  (nama_produk, kategori, ukuran, warna, harga, stok, gambar)
                  VALUES
                  (:nama_produk, :kategori, :ukuran, :warna, :harga, :stok, :gambar)";
        
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ":nama_produk" => $data['nama_produk'],
            ":kategori"    => $data['kategori'],
            ":ukuran"      => $data['ukuran'],
            ":warna"       => $data['warna'],
            ":harga"       => $data['harga'],
            ":stok"        => $data['stok'],
            ":gambar"      => $data['gambar']
        ]);
    }

    // ===============================
    // UPDATE DATA
    // ===============================
    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET
                    nama_produk = :nama_produk,
                    kategori    = :kategori,
                    ukuran      = :ukuran,
                    warna       = :warna,
                    harga       = :harga,
                    stok        = :stok,
                    gambar      = :gambar
                  WHERE id_produk = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ":nama_produk" => $data['nama_produk'],
            ":kategori"    => $data['kategori'],
            ":ukuran"      => $data['ukuran'],
            ":warna"       => $data['warna'],
            ":harga"       => $data['harga'],
            ":stok"        => $data['stok'],
            ":gambar"      => $data['gambar'],
            ":id"          => $id
        ]);
    }

    // ===============================
    // HAPUS DATA
    // ===============================
    public function hapus($id) {
        $query = "DELETE FROM {$this->table} WHERE id_produk = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
