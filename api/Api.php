<?php 
        //getting the database connection
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
 
 //an array to display response
 $response = array();
 
 //if it is an api call 
 //that means a get parameter named api call is set in the URL 
 //and with this parameter we are concluding that it is an api call 
 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'signup':
 
 //in this part we will handle the registration

 if(isTheseParametersAvailable(array('nama_pelanggan','password','email','telp','kota','provinsi'))){

					// $id_pelanggan = $_POST['id_pelanggan']; 
					$nama_pelanggan = $_POST['nama_pelanggan']; 
					$password = $_POST['password'];
					$email = $_POST['email']; 
					$telp = $_POST['telp']; 
					$kota = $_POST['kota']; 
					$provinsi = $_POST['provinsi']; 
					
					$stmt = $mysqli->prepare("SELECT id_pelanggan FROM pelanggan WHERE email = ?");

					$stmt->bind_param("s", $email);
					$stmt->execute();
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						$response['error'] = true;
						$response['message'] = 'User already registered';
						$stmt->close();

					} else {

						$stmt = $mysqli->prepare("INSERT INTO pelanggan ( nama_pelanggan, password, email,  telp, kota, provinsi) VALUES (?, ?, ?, ?, ?, ?)");
						$stmt->bind_param("ssssss", $nama_pelanggan, $password, $email, $telp, $kota, $provinsi);

						if($stmt->execute()){
							$stmt = $mysqli->prepare("SELECT id_pelanggan, id_pelanggan, nama_pelanggan, password, email, telp, kota, provinsi  FROM pelanggan WHERE email = ?"); 
							$stmt->bind_param("s",$email);
							$stmt->execute();
							$stmt->bind_result($userid, $id_pelanggan, $nama_pelanggan, $password, $email, $telp, $kota, $provinsi);
							$stmt->fetch();
							
							$user = array(
								'id_pelanggan'=>$id_pelanggan, 
								'nama_pelanggan'=>$nama_pelanggan, 
								'password'=>$password, 
								'email'=>$email,
								'telp'=>$telp,
								'kota'=>$kota,
								'provinsi'=>$provinsi
							);
							
							$stmt->close();
							
							$response['error'] = true; 
							$response['message'] = 'User registered successfully'; 
							// $response['user'] = $user; 

							echo "User registered successfully";

						}
					}

				}else{
					 
					 $response['error'] = true; 
					 $response['message'] = 'required parameters are not available'; 
					 }

				break; 
 
		 case 'login':
		 
		 //this part will handle the login 

		 if(isTheseParametersAvailable(array('email', 'password'))){

		 $email = $_POST['email'];
		 $password = $_POST['password']; 
		 
		 $stmt = $mysqli->prepare("SELECT id_pelanggan, nama_pelanggan, password, email, telp, kota, provinsi FROM pelanggan WHERE  password = ? AND email = ?");
		 $stmt->bind_param("ss",$password, $email);
		 
		 $stmt->execute();
		 
		 $stmt->store_result();
		 
		 if($stmt->num_rows > 0){
		 
		 $stmt->bind_result($id, $nama_pelanggan, $password, $email, $telp, $kota, $provinsi);
		 $stmt->fetch();
		 
		 $user = array(
		 'id_pelanggan'=>$id, 
		 'nama_pelanggan'=>$nama_pelanggan, 
		 'password'=>$password, 
		 'email'=>$email,
		 'telp'=>$telp,
		 'kota'=>$kota,
		 'provinsi'=>$provinsi
		 );
		 
		 $response['error'] = false; 
		 $response['message'] = 'Login successfull'; 
		 // $response['message'] = 'Login successfull'; 
		 $response['user'] = $user; 

		// echo "Login successfull";

		 }else{

		 $response['error'] = false; 
		 $response['message'] = 'Invalid username or password';

		 echo "Invalid username or password";

		 }
		 }
				 
		 break; 
		 
		 default: 
		 $response['error'] = true; 
		 $response['message'] = 'Invalid Operation Called';
		 }
		 
		 }else{
		 //if it is not api call 
		 //pushing appropriate values to response array 
		 $response['error'] = true; 
		 $response['message'] = 'Invalid API Call';
		 }

	 echo json_encode($response);
 
	 function isTheseParametersAvailable($params){
	 
	 foreach($params as $param){
	 if(!isset($_POST[$param])){
	 return false; 
	 }
	 }
	 return true; 
	 }
	 
 //displaying the response in json structure 
 // echo json_encode($response);