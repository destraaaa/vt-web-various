<?php
// TODO: change with your actual server_key that can be found on Merchant Administration Portal (MAP)
$server_key = "6d7ccd71-ea52-43cc-ac42-5402077bd6c6";

// TODO : change to production URL for your production Environment
// sandbox/development/testing environment:
$endpoint = "https://api.sandbox.veritrans.co.id/v2/charge";
// production environment:
//$endpoint = "https://api.sandbox.veritrans.co.id/v2/charge";


$transaction_details = array(
	'order_id' 			=> 'order3332',
	'gross_amount' 	=> 200000
);

// Populate items
$json = array();
for($i=1; $i<=2; $i++){
	$id = "id".$i;
	$price = "price".$i;
	$quantity = "quantity".$i;
	$name = "name".$i;
	if(isset($_POST[$id])){
		$json['id'] = $_POST[$id];
        $json['price'] = $_POST[$price];
		$json['quantity'] = $_POST[$quantity];
		$json['name'] = $_POST[$name];
        $items[] = $json;
	}
}

// Populate customer's billing address
$billing_address = array(
	'first_name' 		=> "Andri",
	'last_name' 		=> "Setiawan",
	'address' 			=> "Karet Belakang 15A, Setiabudi.",
	'city' 					=> "Jakarta",
	'postal_code' 	=> "51161",
	'phone' 				=> "081322311801",
	'country_code'	=> 'IDN'
	);

// Populate customer's shipping address
$shipping_address = array(
	'first_name' 	=> "John",
	'last_name' 	=> "Watson",
	'address' 		=> "Bakerstreet 221B.",
	'city' 				=> "Jakarta",
	'postal_code' => "51162",
	'phone' 			=> "081322311801",
	'country_code'=> 'IDN'
	);

// Populate customer's Info
$customer_details = array(
	'first_name' 			=> "Andri",
	'last_name' 			=> "Setiawan",
	'email' 					=> "andrisetiawan@me.com",
	'phone' 					=> "081322311801",
	'billing_address' => $billing_address,
	'shipping_address'=> $shipping_address
	);

// Data yang akan dikirim untuk request redirect_url.
// Uncomment 'secure' => true jika transaksi ingin diproses dengan 3DSecure.
$transaction_data = array(
	'payment_type' 			=> 'vtweb', 
	'vtweb' 						=> array(
	'enabled_payments' 	=> array('credit_card','bca_klikbca','bca_klikpay','mandiri_clickpay', 'cimb_clicks', 'bri_epay', 'bii', 'permata', 'xl_tunai', 'xl_potong_pulsa', 'telkomsel_cash')
	),
	//'secure'				=> true,
	'transaction_details'=> $transaction_details,
	'item_details' 			 => $items,
	'customer_details' 	 => $customer_details
);

$json_transaction_data = json_encode($transaction_data);

// Mengirimkan request dengan menggunakan CURL
// HTTP METHOD : POST
// Header:
//	Content-Type : application/json
//	Accept: application/json
// 	Basic Auth using server_key
try{
	$request = curl_init($endpoint);
	if (FALSE === $request)
		throw new Exception('failed to initialize');
	curl_setopt($request, CURLOPT_POST, 1);
	curl_setopt($request, CURLOPT_POSTFIELDS, $json_transaction_data);
	curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
	$auth = sprintf('Authorization: Basic %s', base64_encode($server_key.':'));
	curl_setopt($request, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json',
		$auth 
		)
	);
	// Excute request and parse the response
	 curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
	$curl_response = curl_exec($request);
	if (FALSE === $curl_response)
        throw new Exception(curl_error($request), curl_errno($request));
	curl_close($request);
} catch(Exception $e) {
    trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);
}
$response = json_decode($curl_response);

// Check Response
if($response->status_code == "201")
{
	//var_dump($response);
	//success
	//redirect to vtweb payment page
	header("Location: ".$response->redirect_url);
}
else
{
	//error
	echo "Terjadi kesalahan pada data transaksi yang dikirim.<br />";
	echo "Status message: [".$response->status_code."] ".$response->status_message;

	echo "<h3>Response:</h3>";
	var_dump($response);
}

?>
