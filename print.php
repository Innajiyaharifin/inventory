<?php

ob_start();

include("mpdf60/mpdf.php");

$mpdf=new mPDF(''); 
 
require_once "connection.php"; 
?>

<style>
body, p {
    font-family: "Times New Roman";
    font-size: 11pt;
    text-align: justify;
}
h3{
	margin-bottom: 20px;
	padding-bottom: 20px;
}
td {
   /*vertical-align: top;*/
   text-align: justify;
}

@page {
    header: html_myHeader1;
    footer: html_myFooter1;
    margin-top: 3cm;
    margin-bottom: 2cm;
    margin-left: 2cm;
    margin-right: 2cm;
}

ol.bold li {
    font-weight:bold;
}

</style>

<htmlpageheader name="myHeader1">
<table>	
<tr>	
<td> <img src="images/logo.png" style="text-align:center;">
</td></tr>
</table>

 <h3>Laporan Movement</h3>

</htmlpageheader>

<htmlpagefooter name="myFooter1">
    <table width="100%">

        <tr>
            <td align="right">Hal {PAGENO} dari {nbpg}</td>
        </tr>
    </table>
</htmlpagefooter>

			<?php
			$kode   = $_GET['sku']; //kode berita yang akan dikonvert 
			$per_page = 9;
			$sqlp="SELECT p.sku, p.nama_produk, b.barang_masuk, b.tanggal, 
			null as barang_keluar, 
			null as tanggal_keluar
			from t_produk p, barang_masuk b
			where p.sku =b.sku
			and p.sku = '$_GET[sku]'

								union

								SELECT 
								p.sku, p.nama_produk, 
								null as barang_masuk, 
								null as tanggal,
								k.barang_keluar, k.tanggal_keluar
								from t_produk p, barang_keluar k
								where p.sku =k.sku
								and p.sku = '$_GET[sku]'";
							$resultp = $db->query($sqlp);
							$directory = dirname(__FILE__).'/uploads/';
						?>
 <table class="" border="1" cellpadding="3" cellspacing="0" style="font-size:10px;" width="100%">
                <thead>
<tr>
<th>SKU</th>
<th>Nama Barang</th>
<th>Barang Masuk</th>
<th>Barang Keluar</th>
<th>Tanggal Masuk</th>
<th>Tanggal Keluar</th>
</tr>
  			</thead>
  					 		<?php if($resultp->num_rows >0) : $i = 0; ?>
							<?php while($data =$resultp->fetch_assoc()):?>			
							<tr>
  							
  							<td style="text-align:center;"><?=$data['sku']?></td>
  							<td style="text-align:center;"><?=$data['nama_produk']?></td>
							<td style="text-align:center;"><?=$data['barang_masuk']?></td>
							<td style="text-align:center;"> <?=$data['barang_keluar']?></td>
							<td style="text-align:center;"><?=$data['tanggal']?></td>
							<td style="text-align:center;"><?=$data['tanggal_keluar']?></td>
  						</tr>
  						<?php endwhile; ?>
  							<?php endif; ?>
  					
					</table>



<?php
//==============================================================
if (isset($_REQUEST['html']) && $_REQUEST['html']) { echo $html; exit; }
//==============================================================
$html = ob_get_contents();

ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));

$mpdf->Output(""); 

exit;



?>