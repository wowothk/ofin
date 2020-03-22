<!-- create pdf -->

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    function convert($data) {
        $data = explode(" ", $data);
        $data = explode(".", $data[1]);
        $data = join("", $data);
        $data = floatval($data);
        return $data;
    }

if (isset($_POST["name"]) && $_POST["email"] && $_POST["telepon"] && $_POST["kota"] && $_POST["gaji"] && $_POST["bonus"] && $_POST["bisnis"] && $_POST["pajak"] && $_POST["donasi"] && $_POST["tabungan"] && $_POST["premi"] && $_POST["pinjaman"] && $_POST["kpr"] && $_POST["belanja"] && $_POST["gaya"] && $_POST["rumah"] && $_POST["kendaraan"] && $_POST["asetlain"] && $_POST["deposito"] && $_POST["logam"] && $_POST["saham"] && $_POST["investasi"] && $_POST["kprkpa"] && $_POST["kreditmotor"] && $_POST["kewajibanlain"]) {

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["telepon"]);
    $city = test_input($_POST["kota"]);

    $pendapatan_gaji = convert(test_input($_POST["gaji"]));
    $pendapatan_insentif = convert(test_input($_POST["bonus"]));  
    $pendapatan_aktif = convert(test_input($_POST["bisnis"]));
    $pendapatan_pasif = convert(test_input($_POST["pasif"]));

    $pengeluaran_pajak = convert(test_input($_POST["pajak"]));
    $pengeluaran_donasi = convert(test_input($_POST["donasi"]));
    $pengeluaran_tabungan = convert(test_input($_POST["tabungan"]));
    $pengeluaran_premi = convert(test_input($_POST["premi"]));
    $pengeluaran_pinjaman = convert(test_input($_POST["pinjaman"]));
    $pengeluaran_kredit = convert(test_input($_POST["kpr"]));
    $pengeluaran_rumahtangga = convert(test_input($_POST["belanja"]));
    $pengeluaran_gayahidup = convert(test_input($_POST["gaya"]));

    $aset_rumah = convert(test_input($_POST["rumah"]));
    $aset_kendaraan = convert(test_input($_POST["kendaraan"]));
    $aset_lain = convert(test_input($_POST["asetlain"]));

    $aset_deposito = convert(test_input($_POST["deposito"])); 
    $aset_logam = convert(test_input($_POST["logam"]));
    $aset_saham = convert(test_input($_POST["saham"]));
    $aset_investasi = convert(test_input($_POST["investasi"]));

    $aset_kewajiban_kpr = convert(test_input($_POST["kprkpa"]));
    $aset_kewajiban_kredit_motor = convert(test_input($_POST["kreditmotor"]));
    $aset_kewajiban_lain = convert(test_input($_POST["kewajibanlain"]));

    ob_start();
    require('fpdf182/fpdf.php');
    // require('mc_table.php');

    class PDF extends FPDF {
    function table2col($index, $data){
        $this->SetFillColor(229,229,247);
        $this->SetTextColor(0);
        $this->SetFont('');      
        $fill= true;
        for ($x=0; $x < count($data); $x++)
        {
            // Cell(width, height, text, border, position, fill color, link)
            // position 0: on the right, 1:on the begining of the next line, 2: below
            // for border you change choose 1, 0, 'T', 'B', 'L','R', 'LR'
            $this->Cell(70,6,$index[$x],0,0,'L', $fill);
            $this->Cell(40,6,$data[$x],0,0, 'R', $fill);
            $this->Ln();
            // $fill = !$fill;
        }
    }

    var $widths;
    var $aligns;
    
    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }
    
    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }
    
    function Row($data, $color)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            // fill color
            $this->SetFillColor($color[0],$color[1],$color[2]);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a, true);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }
    
    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }
    
    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
    }
    
    $rowLabels = array("Dana Darurat", "Rasio Likuiditas", "Rasio Tabungan", "Rasio Kemampuan Membayar Hutang","Rasio Kemampuan Membayar Hutang Konsumtif","Rasio Investasi", "Rasio Solvabilitas", "Rasio Pendapatan Aktif", "Rasio Financial Freedom");
    $columnLabels = array("Rasio","Nilai Anda", "Nilai Ideal", "Keterangan");

    $textColour = array( 0, 0, 0 );
    $logoXPos = 50;
    $logoYPos = 108;
    $logoWidth = 110;

    $totalpendapatan = $pendapatan_gaji+$pendapatan_insentif+$pendapatan_aktif+ $pendapatan_pasif; //A
    $totalpendapatanaktif = $pendapatan_gaji+$pendapatan_insentif+$pendapatan_aktif;//G
    $totalpendapatanpasif = $pendapatan_pasif;//H

    $totalpengeluaran = $pengeluaran_pajak+$pengeluaran_donasi+$pengeluaran_tabungan+$pengeluaran_premi+$pengeluaran_kredit+$pengeluaran_pinjaman+$pengeluaran_rumahtangga+$pengeluaran_gayahidup;//B

    $totalaset = $aset_rumah+$aset_kendaraan+$aset_lain;//C

    $totaltabunganinvestasi = $aset_deposito+$aset_logam+$aset_saham+$aset_investasi;//D

    $totalasetdaninvestasi=$totalaset+$totaltabunganinvestasi;//F

    $totalhutang = $aset_kewajiban_kpr+$aset_kewajiban_kredit_motor+$aset_kewajiban_lain;//E

    $cashflow = $totalpendapatan + $totalpengeluaran;
    $kekayaanbersih = $totaltabunganinvestasi-$totalhutang;

    $danadarurat = round($aset_deposito/$totalpengeluaran, 0);
    $rasiolikuiditas = strval(round($aset_deposito/$kekayaanbersih*100,2))." %"; //bentuk persentase
    $rasiotabungan = strval(round($pengeluaran_tabungan/$totalpendapatan*100,2))." %";//bentuk persentase
    $rasiohutangterhadapaset = strval(round($totalhutang/$totalasetdaninvestasi*100,2))." %";
    $rasiokemampuanbayarhutang = strval(round(($pengeluaran_kredit + $pengeluaran_pinjaman)/$totalpendapatan*100,2))." %";
    $rasiokemampuanbayarhutangkonsumtif = strval(round($pengeluaran_pinjaman/$totalpendapatan*100,2))." %"; 
    $rasioinvestasiterhadapkekayaan = strval(round($aset_saham/$kekayaanbersih*100, 2))." %";
    $rasiosolvabilitas = strval(round($kekayaanbersih/$totalasetdaninvestasi*100,2))." %";
    $rasiopendapataaktif = strval(round($totalpendapatanaktif/$totalpengeluaran*100,2))." %";
    $rasiofinancialfreedom = strval(round($totalpendapatanpasif/$totalpengeluaran*100,2))." %";

    $labelpendapatan = array('Gaji', 'Insentif', 'Pendapatan Bisnis', 'Pendapatan Pasif');
    $labelpengeluaran= array('Pajak', 'Amal', 'Tabungan & Investasi', 'Bayar Asuransi', 'Cicilan KPR, KPA dan kredit bisnis', 'Cicilan kartu kredit, KTA, dan Pinjaman Online', 'Belanja Rumah Tangga', 'Gaya Hidup');
    $labelaset = array('Rumah Tinggal','Kendaraan', 'Aset Lainnya');
    $labeltabungan = array('Tabungan & Deposito', 'Logam Mulia', 'Obligasi, Reksadana, Saham, atau Unit Link', 'Investasi Sektor Real');
    $labelkewajiban = array('KPR, KPA, dan Kredit Bisnis', 'Kredit motor, mobil atau pinjaman online','Kewajiban Lainnya');

    $pendapatan = array($pendapatan_gaji, $pendapatan_insentif, $pendapatan_aktif, $pendapatan_pasif);
    $pengeluaran = array($pengeluaran_pajak,$pengeluaran_donasi, $pengeluaran_tabungan, $pengeluaran_premi, $pengeluaran_kredit, $pengeluaran_pinjaman, $pengeluaran_rumahtangga, $pengeluaran_gayahidup);
    $aset = array($aset_rumah, $aset_kendaraan, $aset_lain);
    $tabungan = array($aset_deposito, $aset_logam, $aset_saham, $aset_investasi);
    $kewajiban = array($aset_kewajiban_kpr, $aset_kewajiban_kredit_motor, $aset_kewajiban_lain);


    $data = array(
            array('Dana Darurat', $danadarurat, "3-6", "Keterangan1"),
            array('Rasio Likuiditas', $rasiolikuiditas, "<15%", "Keterangan2"),
            array('Rasio Tabungan',$rasiotabungan, ">10%", "Keterangan1"),
            array('Rasio Kemampuan Membayar Hutang', $rasiokemampuanbayarhutang, "<35%", "Keterangan"),
            array('Rasio Kemampuan Membayar Hutang Konsumtif',$rasiokemampuanbayarhutangkonsumtif, ">50%","Keterangan"),
            array('Rasio Investasi Terhadap Kekayaan', $rasioinvestasiterhadapkekayaan, ">50%","Keterangan"),
            array('Rasio Solvabilitas', $rasiosolvabilitas, ">50%","Keterangan"),
            array('Rasio Pendapatan Aktif', $rasiopendapataaktif, ">50%","Keterangan"),
            array('Rasio Financial Freedom', $rasiofinancialfreedom, ">50%","Keterangan")
    );


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetLeftMargin(25);

    $pdf->Image('logoofinbaru.png',10,10,30,15);
    $pdf-> Ln();

    $pdf->SetFont( 'Arial', 'B', 24 );
    // $pdf->Ln( $reportNameYPos );
    $pdf-> Ln(50);
    $pdf->Cell( 0, 0, 'Hi '.$name, 0, 0, 'L' );
    $pdf-> Ln(10);
    $pdf->Cell( 0, 0, 'Ini dia Hasil', 0, 0, 'L' );
    $pdf-> Ln(10);
    $pdf->Cell( 0, 0, 'Financial Check-Up Mu', 0, 0, 'L' );
    $pdf-> Ln(20);

    $pdf -> AddPage();



    // $pdf->SetFont('Arial','B',16);
    // $pdf->Cell(190,7,'PT. Okefinansial (OFIN) Indonesia',0,1,'C');
    // $pdf->SetFont('Arial','B',9);
    // $pdf->Cell(190,7,'Jl.Bukit Sakura II, No c 23, Bukit wahid Regency, Semarang, Jawa Tengah-Indonesia 50147, ',0,1,'C');
    // $pdf->Cell(190,7,'Email: info@okefinansial.com, Phone: 08112922168',0,1,'C');
    // $pdf->Cell(10,7,'',0,1);
    // $pdf->SetAutoPageBreak(on, 4);

    $pdf->SetFont('Arial','B',9);
    $pdf->Write(9, "Pendapatan Bulanan");
    $pdf-> Ln();
    $pdf->table2col($labelpendapatan,$pendapatan);
    $pdf-> Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Write(9, "Pengeluaran Bulanan");
    $pdf-> Ln();
    $pdf->table2col($labelpengeluaran,$pengeluaran);
    $pdf-> Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Write(9, "Aset");
    $pdf-> Ln();
    $pdf->table2col($labelaset,$aset);
    $pdf-> Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Write(9, "Investasi");
    $pdf-> Ln();
    $pdf->table2col($labeltabungan,$tabungan);
    $pdf-> Ln();

    $pdf->SetFont('Arial','B',9);
    $pdf->Write(9, "Kewajiban");
    $pdf-> Ln();
    $pdf->table2col($labelkewajiban,$kewajiban);
    $pdf-> Ln();

    $pdf->AddPage();

    // $pdf->SetFont('Arial','B',10);
    // $pdf->Cell(190,7, "Financial Health Checkup to: ".$name ,0,1,'L');

    $pdf->SetFillColor(229,229,247);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(229,229,247);
    $pdf->SetLineWidth(.3);

    $pdf->SetWidths(array(40,30,30,60));    
    $pdf -> Row($columnLabels, array(229,229,247));
    foreach ($data as $row) {
        $pdf -> Row($row,array(255,255,255));
    }

    // $pdf->SetFont('Arial','B',9);
    // $pdf->SetLeftMargin(25);
    $pdf -> Write(9,"Ingin tahu informasi selengkapnya? Silakan hubungi kami atau isi form konsultasi pada tautan berikut.");
    $pdf->Write(9,'okefinansial.com','https://www.okefinansial.com/ofins-services/');
    $pdf->Output( "report.pdf", "I" );
    //   ob_end_flush(); 
    // }
}
?>