<?php

class Book {
    // Properti private
    private $code_book;
    private $name;
    private $qty;

    // Constructor untuk inisialisasi data
    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    // Private setter untuk code_book
    private function setCodeBook($code_book) {
        // Validasi format input
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: code_book harus dalam format 2 huruf kapital diikuti 2 angka. Contoh: BB00 \n";
        }
    }

    // Private setter untuk jumlah
    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: qty harus berupa integer positif dan lebih dari 0<br>";
        }
    }

    // Getter untuk code_book
    public function getCodeBook() {
        return $this->code_book;
    }

    // Getter untuk qty
    public function getQty() {
        return $this->qty;
    }

    // Getter untuk name (opsional, agar bisa diakses jika perlu)
    public function getName() {
        return $this->name;
    }
}

// Contoh penggunaan
$book1 = new Book("AB12", "Pemrograman PHP", 5);
echo "Kode Buku: " . $book1->getCodeBook() . "\n";
echo "Nama Buku: " . $book1->getName() . "\n";
echo "Jumlah: " . $book1->getQty() . "\n";

// Coba input salah
$book2 = new Book("abc1", "Kesalahan Format", -2);
