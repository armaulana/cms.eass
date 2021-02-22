<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function cetak($str){
	echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

//foreach($daftar as $dftr){
//	<tr>
//		<td> cetak($dftr->nama)</td>
//		<td> cetak($dftr->alamat)</td>
//	</tr>
//}