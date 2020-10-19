<?php
    include_once('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .jumbotron-fluid {
            height: 35rem;
            display: block;
            background-image:linear-gradient( rgba(255, 255, 255, 0.6) 0%, rgba(255,255,255,0.7) 100%), url('img/pexels-vitaly-vlasov-1546333.jpg');
            background-size: cover;
            background-position: top;
        }
        .input-group-prepend, .input-group-text {
            border: solid transparent; background-color: transparent; color: black; display: inline; margin-bottom: 0; padding-top:.375rem;padding-bottom: .375rem; line-height: 1.5rem; margin-right: 0; margin-left: 0; padding-left: 0;
            padding-right: 0; text-align: left;
        }
        .text {
    position: relative;
    transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 12em;
    font-weight: 700;
    color: #f5f5f5;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);
}
.text:hover {
    text-decoration: none;
}

.shadow{
    font-size: 5rem;
    font-weight: 700;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);

    text-shadow: 5px 5px 2px rgba(0, 100, 0, 0.51);
        }
        .shadow:hover {
            text-decoration: none;
        }
        .spanj {
            -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          -moz-transform: translate(-50%, -50%);

            text-shadow: 5px 5px 2px rgba(184, 134, 11, 0.51);
        }
    </style>
<link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arapey&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/font-awesome.min.css">
</head>

<body>

<?php
    if ($_GET) {
    if($_GET['simpan'] === "sukses") {
?>
<div class="alert alert-success alert-dismissible fade show sticky-top fixed-top" role="alert">
    <h4 class="alert-heading">Sudah disimpan</h4>
    <p>boleh belanja lagi</p>
    <button class="close" type="button" data-dismiss="alert" aria-label="close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
    } elseif($_GET['simpan'] === "gagal") {
?>
<div class="alert alert-warning alert-dismissible fade show sticky-top fixed-top" role="alert">
    <h4 class="alert-heading">Gagal belanja</h4>
    <p>boleh coba lagi</p>
    <button class="close" type="button" data-dismiss="alert" aria-label="close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
    }
    }
?>

<div class="jumbotron jumbotron-fluid jumbotron-billboard">
        <div class="img"></div>
        <div class="container-fluid">
            <a href="toko-jam.php" style="color:#006400" class="shadow">
                <h1 class="display-1" style="font-family: 'Arapey', serif;"><span style="font-family: 'Alice', serif;">Toko</span> 
                    <!-- <img src="img/monogram-logo-letter-tj-sliced-260nw-1177988590.png" width="50" alt="">  -->
                    <span style="color: #e6c619;" class="spanj">J</span>am
                </h1>
            </a>
            <p class="lead"></p>
            <p class="lead">
            </p>
        </div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="bg-dark rounded text-center text-white py-lg-3" style="font-family: 'Advent Pro', sans-serif;">
                    List Items
                </div>
                
                <div class="col-sm-12 py-2"></div>
                
                <form name="keranjang" id="keranjang" action="simpanbayar.php" method="post" class="form-inline">
                
                <div id="listkeranjang"></div>

                <table class="table table-light">
                    <tbody>
                        <tr>
                            <td>Discount (5%)</td>
                            <td><div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-plaintext" id="lbl-harga">Rp. </span>
                                </div>
                                    <input id="discount" name="discount" class="form-control-plaintext col-sm" value="" type="text" aria-label="discount" aria-describedby="lbl-harga" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>PPN (10%)</td>
                            <td><div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-plaintext" id="lblpajak">Rp.</span>
                                </div>
                                <input id="pajak" name="pajak" class="form-control-plaintext col-sm" value="" type="text" aria-label="pajak" aria-describedby="lblpajak" />
                            </div>
                            </td>
                        </tr>
                        <tr class="bg-dark text-white">
                            <td style="vertical-align: middle">Total Bayar</td>
                            <td>
                            <div class="input-group text-white">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-plaintext text-white" id="lblbayar">Rp.</span>
                                </div>
                                <input id="bayar" name="bayar" class="form-control-plaintext col-sm text-white" type="text" aria-label="bayar" aria-describedy="lblbayar" />                                
                            </div></td>
                        </tr>
                    </tbody>
                </table>
                <input class="bg-info text-white mt-2 btn-block px-5"  type="submit" value="Bayar" name="Bayar">
                </form>
            </div>

            <div class="col-8">
                <!-- kotak pencarian -->
                <div class="bg-secondary card py-xl-2 container-fluid mb-3">
                    <div class="form-inline py-3">
                      <label for=""></label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                      <button type="button" class="btn text-warning bg-dark">Search</button>
                    </div>
                </div>

                <!-- daftar produk -->
                <div id="dataproduk"></div>
            </div>
    </div>
    </div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/numeral.min.js"></script>
    <script>
    
    var idproduk = [1, 2, 3, 4];
    var urlgambar = ['img/popular6.png','img/popular5.png','img/popular1.png', 'img/popular4.png'];
    var datanamaproduk = ['Rolex Cellini Time', 'Rolex YACHT-MASTER 40', 'Rolex Daytona Everose Gold', 'Rolex Hulk Rolex Submariner 116610LV'];
    var datahargaproduk = ['201414460','194430000','156199108','348750000'];

    //var jam = document.getElementById("namaproduk").value;
    var tampil = document.getElementById('dataproduk');
    let i = 0;
    
    var idprodukCart = [];
    var urlgambarCart = [];
    var namaprodukCart = [];
    var hargaprodukCart = [];
    var qtyprodukCart = [];

    var keranjang = document.getElementById("listkeranjang");

    var disc = document.getElementById('discount');
    var bayar = document.getElementById('bayar');
    var tampilanpajak = document.getElementById('pajak');

    var discount;
    var pajak;
    var hargatotal;
    var totalbayar;
    var totalbelanja;

    var urlgambarCari = [];
    var datanamaprodukCari = [];
    var datahargaprodukCari = [];
    
    function showData() {

        tampil.innerHTML = '';
        // document.getElementById('kodeproduk').value = nomorAutoIncrement();

        // struktur perulangan
        // dimensi adalah indeks baris dan kolom
        // dalam  kode ini hanya terdapat satu index
        // yaitu index baris
        for(i=0; i<urlgambar.length; i++) {
            var nodata = i+1;

            // tampil data produk ke halaman web
            tampil.innerHTML +='<div class="card float-left ml-3" style="width:18rem;">'+
                    '<img class="card-img-top" src="'+urlgambar[i]+'" alt="">'+
                    '<div class="card-body">'+
                        '<h5 class="card-title">'+datanamaproduk[i]+'</h5>'+
                        '<p class="card-text">Rp. '+numeral(datahargaproduk[i]).format('0,0')+'</p>'+
                        '<a type="button" class="btn btn-info" onclick="addCart('+i+')">Beli</a>'+
                    '</div>'+
                '</div>';
        }
    }

    function addCart(id) {
        idprodukCart.push(idproduk[id]);
        namaprodukCart.push(datanamaproduk[id]);
        hargaprodukCart.push(datahargaproduk[id]);

        showKeranjang();
    }

    function showKeranjang() {
        keranjang.innerHTML = '';
        hargatotal = 0;
        totalbayar = 0;
        
        var styleRaffa, styleRaffaPrepend;
        var tampilankeranjang = '';
        // var tampilanformkeranjang1 = '', tampilanformkeranjang2 = '';
        
        styleRaffa = "display:inline;width:30rem;padding-top:.375rem;padding-bottom:.375rem;margin-bottom:0;line-height:1.5;color:#212529;background-color:transparent;border:solid transparent;border-width:1px 0;font-size:1.25rem;font-weight:bold";
        styleRaffaPrepend = "border: solid transparent; background-color: transparent; color: black; display: inline; margin-bottom: 0; padding-top:.375rem;padding-bottom: .375rem; line-height: 1.5";
        
        for (i=0; i<namaprodukCart.length; i++) {
            tampilankeranjang += '<div class="card">'+
                '<div class="card-body text-break text-wrap col-md" style="width: 30rem">'+
                    // '<h5 class="card-title">'+namaprodukCart[i]+'</h5>'+
                    '<input type="hidden" value="'+idprodukCart[i]+'" name="idproduk[]" id="idproduk'+i+'" />'+
                    '<input type="text" value="'+namaprodukCart[i]+'" class="card-text text-dark form-control-plaintext" readonly style="'+styleRaffa+'" name="namaproduk[]" id="namaproduk'+i+'" />'+
                    '<div class="input-group">'+
                    '<div class="input-group-prepend" style="'+styleRaffaPrepend+'"><span class="input-group-text form-control-plaintext" id="label_harga" style="'+styleRaffaPrepend+'">Rp.</span></div>'+
                    '<input type="text" value="'+hargaprodukCart[i]+'" class="text-dark form-control-plaintext col-sm" readonly  name="hargaproduk[]" id="hargaproduk'+i+'" aria-label="hargaproduk" aria-describedby="label_harga" />'+
                    '</div>'+
                    // '<div class="input-group form-control-plaintext">'+
                    // 'Quantity: '+
                    // '<input type="text" class="text-dark input-inline" name="quantityproduk'+i+'" />'+
                    // '</div>'+
                        // '<p class="card-text">Qty: '+'</p>'+
                '<br>'+
                '<a href="#" class="btn btn-info float-right" type="button" onclick="deleteitem('+i+')">Hapus</a>'+
                '</div>'+
            '</div>';

            hargatotal = Number(hargaprodukCart[i])+hargatotal;
                    
            if (totalbayar > 6000000) {
                discount = totalbayar*0.05;
            } else {
                discount = 0;
            }
            totalbayar = hargatotal-discount;

            pajak = totalbayar*0.1;

            totalbelanja = totalbayar - pajak;

            document.getElementById('discount').value = discount;
            document.getElementById('pajak').value = pajak;
            document.getElementById('bayar').value = totalbelanja;
        }
        
        keranjang.innerHTML += tampilankeranjang;
    }

    function deleteitem(id) {
        var p = confirm("mau hapus?");

        if (p) {
        namaprodukCart.splice(id,1);
        hargaprodukCart.splice(id,1);
        }
        showKeranjang();
    }

    function showDataSearch() {

        for(i=0; i<urlgambarCari.length; i++) {
            var nodata = i+1;

            // tampil data produk ke halaman web
            tampil.innerHTML +='<div class="card float-left ml-3" style="width:18rem;">'+
                    '<img class="card-img-top" src="'+urlgambarCari[i]+'" alt="">'+
                    '<div class="card-body">'+
                        '<h5 class="card-title">'+datanamaproduk[i]+'"</h5>'+
                        '<p class="card-text">Rp'+datahargaproduk[i]+'"</p>'+
                        '<a type="button" class="btn btn-info" onclick="addCart('+i+')">Beli</a>'+
                    '</div>'+
                '</div>';
        }
    }

    function checkIfExists(namaproduk) {
        var arr_len = datanamaproduk.length;

        for (i=0; i < arr_len; i++) {
            var item_id = '';
            if (datanamaproduk[i] === namaproduk) {
            }
        }

    }

    $(document).ready(function() {
        // $('raffaModal').on('shown.bs.modal', function(e){
        // });

            showData();
    });
    
    function submit() {
        document.getElementById('keranjang').submit();
    }

    </script>
</body>
</html>