<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron">
  <h1>PT. Okefinansial(OFIN) Indonesia</h1> 
  <p>Best Financial Consulting</p> 
</div>


<div class="container">
    <form method="post" action="generatepdf.php">  
        <h3><b>Identitas</b></h3>
        <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
        </div>        

        <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>      

        <div class="form-group">
        <label for="telepon">Telepon:</label>
        <input type="tel" class="form-control" id="telepon" placeholder="Enter telepon" name="telepon" required>
        </div>

        <div class="form-group">
        <label for="kota">Kota:</label>        
        <input type="text" class="form-control" id="kota" placeholder="Enter kota" name="kota" required>
        </div>

        <!-- ----------------- -->
        <h3><b>Pendapatan Bulanan</b></h3>
        <div class="form-group">
        <label for="gaji">Gaji:</label>
        <input type="text" class="form-control" id="gaji" placeholder="Enter gaji" name="gaji">
        </div>
        
        <div class="form-group">
        <label for="bonus">Insentif:</label>
        <input type="text" class="form-control" id="bonus" placeholder="Enter bonus" name="bonus">        
        </div>

        <div class="form-group">
        <label for="bisnis">Pendapatan Bisnis:</label>        
        <input type="text" class="form-control" id="bisnis" placeholder="Enter bisnis" name="bisnis">        
        </div>

        <div class="form-group">
        <label for="pasif">Pendapatan Pasif:</label>        
        <input type="text" class="form-control" id="pasif" placeholder="Enter pendapatan pasif" name="pasif">
        </div>

        <!-- ------------------ -->
        <h3><b>Pengeluaran Bulanan</b></h3>

        <div class="form-group">
        <label for="pajak">Pajak:</label>        
        <input type="text" class="form-control" id="pajak" placeholder="Enter pajak" name="pajak">
        </div>

        <div class="form-group">
        <label for="donasi">Amal:</label>        
        <input type="text" class="form-control" id="donasi" placeholder="Enter amal" name="donasi">
        </div>
        
        <div class="form-group">
        <label for="tabungan">Tabungan & Investasi:</label>        
        <input type="text" class="form-control" id="tabungan" placeholder="Enter tabungan & investasi" name="tabungan">
        </div>

        <div class="form-group">
        <label for="premi">Bayar Asuransi:</label>        
        <input type="text" class="form-control" id="premi" placeholder="Enter bayar asuransi" name="premi">
        </div>
        
        <div class="form-group">
        <label for="kpr">Cicilan KPR, KPA dan kredit bisnis</label>        
        <input type="text" class="form-control" id="kpr" placeholder="Enter bayar cicilan KPR, KPA dan kredit bisnis" name="kpr">
        </div>

        <div class="form-group">
        <label for="pinjaman">Cicilan kartu kredit, KTA, dan Pinjaman Online</label>        
        <input type="text" class="form-control" id="pinjaman" placeholder="Enter bayar cicilan kartu kredit, KTA, Pinjaman Online" name="pinjaman">
        </div>

        <div class="form-group">
        <label for="belanja">Belanja Rumah Tangga</label>        
        <input type="text" class="form-control" id="belanja" placeholder="Enter belanja rumah tangga" name="belanja">
        </div>

        <div class="form-group">
        <label for="gaya">Gaya Hidup</label>        
        <input type="text" class="form-control" id="gaya" placeholder="Enter gaya hidup" name="gaya">
        </div>

        
        <!-- ------------------ -->
        <h3><b>Aset</b></h3>

        <div class="form-group">
        <label for="rumah">Rumah Tinggal</label>        
        <input type="text" class="form-control" id="rumah" placeholder="Enter rumah tinggal" name="rumah">
        </div>

        <div class="form-group">
        <label for="kendaraan">Kendaraan</label>        
        <input type="text" class="form-control" id="kendaraan" placeholder="Enter kendaraan" name="kendaraan">
        </div>
       
        <div class="form-group">
        <label for="asetlain">Aset Lainnya</label>        
        <input type="text" class="form-control" id="asetlain" placeholder="Enter aset lain" name="asetlain">
        </div>
        
        <!-- ------------------ -->
        <h3><b>Tabungan & Investasi</b></h3>
        <div class="form-group">
        <label for="deposito">Tabungan & Deposito</label>        
        <input type="text" class="form-control" id="deposito" placeholder="Enter tabungan & deposito" name="deposito">
        </div>
        
        <div class="form-group">
        <label for="logam">Logam Mulia</label>        
        <input type="text" class="form-control" id="logam" placeholder="Enter logam mulia" name="logam">
        </div>
        
        <div class="form-group">
        <label for="saham">Obligasi, Reksadana, Saham, atau Unit Link</label>        
        <input type="text" class="form-control" id="saham" placeholder="Enter obligasi, reksadana, saham atau unit link" name="saham">
        </div>
        
        <div class="form-group">
        <label for="investasi">Investasi Sektor Real</label>        
        <input type="text" class="form-control" id="investasi" placeholder="Enter investasi sektor real" name="investasi">
        </div>

        
        <!-- ------------------ -->
        <h3><b>Kewajiban</b></h3>

        <div class="form-group">
        <label for="kprkpa">KPR, KPA, dan Kredit Bisnis</label>        
        <input type="text" class="form-control" id="kprkpa" placeholder="Enter KPR, KPA, dan Kredit Bisnis" name="kprkpa">
        </div>

        <div class="form-group">
        <label for="kreditmotor">Kredit motor, mobil atau pinjaman online</label>        
        <input type="text" class="form-control" id="kreditmotor" placeholder="Enter Kredit motor, mobil atau pinjaman online" name="kreditmotor">
        </div>

        <div class="form-group">
        <label for="kewajibanlain">Kewajiban Lainnya</label>        
        <input type="text" class="form-control" id="kewajibanlain" placeholder="Enter kewajiban Lain" name="kewajibanlain">
        </div>

        <button class="btn btn-default" type="submit">Submit</button>
        
    </form>
</div>

<script type="text/javascript">
		
		var gaji = document.getElementById('gaji');
		gaji.addEventListener('keyup', function(e){
           gaji.value = formatRupiah(this.value, 'Rp. ');
		});
    var bonus = document.getElementById('bonus');
		bonus.addEventListener('keyup', function(e){
            bonus.value = formatRupiah(this.value, 'Rp. ');
		});
    var bisnis = document.getElementById('bisnis');
		bisnis.addEventListener('keyup', function(e){
			bisnis.value = formatRupiah(this.value, 'Rp. ');
		});
        var pasif = document.getElementById('pasif');
		pasif.addEventListener('keyup', function(e){
			pasif.value = formatRupiah(this.value, 'Rp. ');
		});

    // ----------------
        var pajak = document.getElementById('pajak');
		pajak.addEventListener('keyup', function(e){
			pajak.value = formatRupiah(this.value, 'Rp. ');
		});
        var donasi = document.getElementById('donasi');
		donasi.addEventListener('keyup', function(e){
			donasi.value = formatRupiah(this.value, 'Rp. ');
		});
        var tabungan = document.getElementById('tabungan');
		tabungan.addEventListener('keyup', function(e){
			tabungan.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var premi = document.getElementById('premi');
		premi.addEventListener('keyup', function(e){
			premi.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var kpr = document.getElementById('kpr');
		kpr.addEventListener('keyup', function(e){
			kpr.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var pinjaman = document.getElementById('pinjaman');
		pinjaman.addEventListener('keyup', function(e){
			pinjaman.value = formatRupiah(this.value, 'Rp. ');
		});

    var belanja = document.getElementById('belanja');
		belanja.addEventListener('keyup', function(e){
			belanja.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var gaya = document.getElementById('gaya');
		gaya.addEventListener('keyup', function(e){
			gaya.value = formatRupiah(this.value, 'Rp. ');
		});

    // ---------------

    var rumah = document.getElementById('rumah');
		rumah.addEventListener('keyup', function(e){
		  rumah.value = formatRupiah(this.value, 'Rp. ');
		});

    var kendaraan = document.getElementById('kendaraan');
		kendaraan.addEventListener('keyup', function(e){
			kendaraan.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var asetlain = document.getElementById('asetlain');
		asetlain.addEventListener('keyup', function(e){
			asetlain.value = formatRupiah(this.value, 'Rp. ');
		});
    
    // ---------------    

    var deposito = document.getElementById('deposito');
		deposito.addEventListener('keyup', function(e){
			deposito.value = formatRupiah(this.value, 'Rp. ');
		});

    var logam = document.getElementById('logam');
		logam.addEventListener('keyup', function(e){
		  logam.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var saham = document.getElementById('saham');
		saham.addEventListener('keyup', function(e){
			saham.value = formatRupiah(this.value, 'Rp. ');
		});

    var investasi = document.getElementById('investasi');
		investasi.addEventListener('keyup', function(e){
		  investasi.value = formatRupiah(this.value, 'Rp. ');
		});
    
    // ---------------    
    
    var kprkpa = document.getElementById('kprkpa');
		kprkpa.addEventListener('keyup', function(e){
			kprkpa.value = formatRupiah(this.value, 'Rp. ');
		});

    var kreditmotor = document.getElementById('kreditmotor');
		kreditmotor.addEventListener('keyup', function(e){
			kreditmotor.value = formatRupiah(this.value, 'Rp. ');
		});
    
    var kewajibanlain = document.getElementById('kewajibanlain');
		kewajibanlain.addEventListener('keyup', function(e){
			kewajibanlain.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>