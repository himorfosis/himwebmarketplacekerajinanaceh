<?php
	$asal = $_POST['asal'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: 5f2c707e94f2d3d91e3b8f5d0e93a6e3"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {

	  echo "cURL Error #:" . $err;

	} else {

	  $data = json_decode($response, true);
	
	}


	// $biaya =  $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];

for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {

	// for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {

// 	echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];

// 	echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];;

// echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];

echo $data['rajaongkir']['results'][$k]['costs'][0]['cost'][0]['value'];
// echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);

// }

}

?>