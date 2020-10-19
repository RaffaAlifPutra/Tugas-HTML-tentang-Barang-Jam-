<?php
    include_once "koneksi.php";
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $idproduk[] = 0;
    $namaproduk[] = $hargaproduk[] = $quantity[] = $discount[] = $pajak[] = $totalbayar[] = '';
    $idproduk_err = $namaproduk_err = $hargaproduk_err = $quantity_err = $discount_err = $pajak_err = $totalbayar_err = '';
    
    $input_idproduk = $input_hargaproduk = $input_discount = $input_pajak = $input_totalbayar = 0;
    $input_namaproduk = '';
    
    $paramidproduk = $paramnamaproduk = $paramhargaproduk = $paramquantityproduk = $paramdiscount = $parampajak = $paramtotalbayar = '';
    $typeString = '';
    $recordsukses;
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        for ($i = 0; $i < count($_POST['idproduk']); $i++) {
            $input_idproduk = trim($_POST['idproduk'][$i]);
            if (empty($input_idproduk)) {
                $idproduk_err = 'masukkan id produk';
            } else {
                $idproduk[$i] = (int)$input_idproduk;
            }
        }
    
        for ($i = 0; $i < count($_POST['namaproduk']); $i++) {
            $input_namaproduk = trim($_POST['namaproduk'][$i]);
            if (empty($input_namaproduk)) {
                $namaproduk_err = 'masukkan nama produk';
            } else {
                $namaproduk[$i] = $input_namaproduk;
            }
        }
            
        for ($i = 0; $i < count($_POST['hargaproduk']); $i++) {
            $input_hargaproduk = trim($_POST['hargaproduk'][$i]);
            if (empty($input_hargaproduk)) {
                $hargaproduk_err = 'masukkan harga produk';
            } else {
                $hargaproduk[$i] = (int)$input_hargaproduk;
            }
        }
        
        $input_discount = (int)trim($_POST['discount']);
        $input_pajak = (int)trim($_POST['pajak']);
        $input_totalbayar = (int)trim($_POST['bayar']);
        
        
        // for ($i = 0; $i < count($_POST['quantityproduk']); $i++) {
        //     $input_quantityproduk = trim($_POST['quantityproduk'][i]);
        //     if (empty($input_hargaproduk)) {
        //         $quantity_err = 'masukkan quantity produk';
        //     } elseif (!ctype_digit($input_quantityproduk)) {
        //         $quantity_err = 'masukkan quantity produk positif';
        //     } else {
        //         $quantity[$i] = $input_quantityproduk;
        //     }
        // }
        // var_dump($namaproduk);
        
        if (empty($namaproduk_err) && empty($hargaproduk_err)) {
            // $sql = "INSERT INTO cart (namaproduk) VALUES (?)";
            $sql = "INSERT INTO cart (iditem, namaproduk, Harga, Discount, Tax, TotalBayar, Quantity) VALUES (?, ?, ?, ?, ?, ?, 1)";
            
            /* Bind parameters. Types: s = string, i = integer, d = double, b = blob */
            $typeString = 'isiiii';
            $valCount1 = count($namaproduk);
            
            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                
                /* Populate args with references to values */
                // $args = array(&$typeString);
                for ($i = 0; $i < $valCount1; $i++) {
                    $paramidproduk = $idproduk[$i];
                    $paramnamaproduk = $namaproduk[$i];
                    $paramhargaproduk = $hargaproduk[$i];
                    $paramdiscount = $input_discount;
                    $parampajak = $input_pajak;
                    $paramtotalbayar = $input_totalbayar;

                    mysqli_stmt_bind_param($stmt, $typeString, $paramidproduk, $paramnamaproduk, $paramhargaproduk, $paramdiscount, $parampajak, $paramtotalbayar);
                    
                    if (mysqli_stmt_execute($stmt)){
                        // $recordsukses += mysqli_affected_rows($mysqli);
                    } else {
                        echo mysqli_stmt_errno($stmt).mysqli_stmt_error($stmt);
                    }
                    
                }
                
                mysqli_stmt_close($stmt);
                mysqli_close($mysqli);
                header('location:toko-jam.php?simpan=sukses');
                exit();
            } else {
                echo mysqli_error($mysqli);
                mysqli_stmt_close($stmt);
                mysqli_close($mysqli);
                header('location:toko-jam.php?simpan=gagal');
                exit();
            }
        }
    }
?>