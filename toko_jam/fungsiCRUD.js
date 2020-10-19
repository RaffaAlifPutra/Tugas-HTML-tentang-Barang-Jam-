function showData() {

    tampil.innerHTML = '';

    for(i=0; i<urlgambar.length; i++) {
        var nodata = i+1;

        // tampil data produk ke halaman web
        tampil.innerHTML +='<div class="card float-left ml-3" style="width:18rem;">'+
                '<img class="card-img-top" src="'+urlgambar[i]+'" alt="">'+
                '<div class="card-body">'+
                    '<h5 class="card-title">'+datanamaproduk[i]+'</h5>'+
                    '<p class="card-text">Rp. '+datahargaproduk[i]+'</p>'+
                    '<a type="button" class="btn btn-info" onclick="addCart('+i+')">Beli</a>'+
                '</div>'+
            '</div>';
    }
}

function addCart(id) {
    namaprodukCart.push(datanamaproduk[id]);
    hargaprodukCart.push(datahargaproduk[id]);

    showKeranjang();
}

function showKeranjang() {
    keranjang.innerHTML = '';
    hargatotal = 0;
    totalbayar = 0;

    for (i=0; i<namaprodukCart.length; i++) {
        keranjang.innerHTML += '<div class="card">'+
            '<div class="card-body">'+
                '<h5 class="card-title">'+namaprodukCart[i]+'</h5>'+
               '<p class="card-text">Rp. '+hargaprodukCart[i]+'</p>'+
                    '<p class="card-text">Qty: '+'</p>'+
            '<a href="#" class="btn btn-info float-right" type="button" onclick="deleteitem('+i+')">Hapus</a>'+
            '</div>'+
        '</div>';

        hargatotal = hargaprodukCart[i]+hargatotal;
                
        if (totalbayar > 6000000) {
            discount = totalbayar*0.05;
        } else {
            discount = 0;
        }
        totalbayar = hargatotal-discount;

        pajak = totalbayar*0.1;

        totalbelanja = totalbayar - pajak;

        disc.innerHTML = discount;
        tampilanpajak.innerHTML = pajak;
        bayar.innerHTML = totalbelanja;

    }
}

function deleteitem(id) {
    namaprodukCart.splice(id,1);
    hargaprodukCart.splice(id,1);

    showKeranjang();
}

showData();
