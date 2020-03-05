<?php 

	function telat($tgl_kembali, $tgl_hariini){

		$tgl_kembali_explode = explode("-", $tgl_kembali);
		$tgl_kembali_explode = $tgl_kembali_explode[2]."-".$tgl_kembali_explode[1]."-".$tgl_kembali_explode[0];

		$tgl_hariini_explode = explode("-", $tgl_hariini);
		$tgl_hariini_explode = $tgl_hariini_explode[2]."-".$tgl_hariini_explode[1]."-".$tgl_hariini_explode[0];

		$selisih = strtotime($tgl_hariini_explode) - strtotime($tgl_kembali_explode);
		$selisih = $selisih/86400;

		if($selisih>=1)
			$hasil = floor($selisih);
		else
			$hasil = 0;

		return $hasil;

	}

?>