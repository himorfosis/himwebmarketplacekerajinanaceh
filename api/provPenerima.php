<?php


	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
	  // CURLOPT_RETURNTRANSFER => true,
	  // CURLOPT_ENCODING => "",
	  // CURLOPT_MAXREDIRS => 10,
	  // CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: 5f2c707e94f2d3d91e3b8f5d0e93a6e3"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	// $data = json_decode($response, true);

	// $arr=array();

	// for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {

	// 	// echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";

		// echo $data['rajaongkir']['results'][$i]['province_id']."',".$data['rajaongkir']['results'][$i]['province'];

		// $arr['provinsi'] = $data['results'][$i]['province_id'].",".$data['results'][$i]['province'];

	// }

	// echo json_encode($curl);

?>
