<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<h3 style="text-align: center;">Input Data</h3>

<div class="container">

    <body>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

            <div class="container">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Buku</label>
                    <input type="text" name="Nama" class="form-control" id="formGroupExampleInput" placeholder="Contoh : Matematika">
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Buku</label>
                    <input type="text" name="jenis" class="form-control" id="formGroupExampleInput2" placeholder="Contoh : Buku pelajaran">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Buku (satuan)</label>
                    <input type="text" name="harga" class="form-control" id="formGroupExampleInput2" placeholder="Contoh : Rp45.000">
                </div>

                <input type="submit" class="btn btn-primary" name="submit">



        </form>
        <?php
        // -------- PENGERTIAN INTERFACE ---------
        //interface = class yg semua methodnya adalah abstract method
        //karena itu perlu diimplementasikan oleh child class
        //perbedaan interface dg abstract class
        // interface menggunakan perintah IMPLEMENTS
        // abstrac class perintah EXTENDS 


        //membuat interface dengan nama Books
        interface Books
        {
            //pada interface Books kita memiliki 
            // satu abstrac method dengan nama get_book()
            public function get_book();
        }

        //terdapat 1 class yang mengimplementasikan 
        //interface Books yaitu buku
        class buku implements books
        {
            //property
            protected $name;
            private $harga;
            public  $jenis;

            // static property
            public static $book;

            //method construct --> akan dieksekusi pertama kali 
            //dari pada mthod lainnya
            public function __construct($name,  $jenis, $harga)
            {
                //digunakan variable $this untuk mengambil Property/Method lain  
                $this->name = $name;
                $this->jenis = $jenis;
                $this->harga = $harga;
            }

            //method class get_book
            public function get_book()
            {
                // set static property
                //untuk mengakses static property dan static method
                //menggunakan keyword “self::”.
                return self::$book;
            }

            //method class info
            public function info()
            {
                //digunakan echo untuk menampilkan teks ke layar
                echo "Nama buku ini adalah {$this->name} ,jenisnya {$this->jenis}, dan harga satuannya {$this->harga}.";
                echo "<br></br>";
            }
        }

        // Inheritance from info buku
        class infoBuku extends buku
        {
            //method class message
            public function message()
            {
                //digunakan echo untuk menampilkan teks ke layar
                echo "<br>";
                echo "Info : ";
            }
        }

        //Kondisi jika tombol submit di klik
        if (isset($_POST['submit'])) {
            $name = $_POST['Nama'];
            $jenis = $_POST['jenis'];
            $harga = $_POST['harga'];
            

        //object
        $produk_buku1 = new infoBuku($name, $jenis, $harga);
        $produk_buku1->message();
        $produk_buku1->info();
        }

        
        ?>

    </body>

</html>