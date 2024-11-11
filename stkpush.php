<?php
    include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://joe.gmarkhosting.com/daraja/callback.php';
$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phone = '254714840854';
$money = '1';
$PartyA = $phone;
// $PartyB = '254708374149';
$AccountReference = 'JOEDARAJA';
$TransactionDesc = 'stkpushtest';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization: Bearer ' . $access_token];
$curl = curl_init($processrequestUrl);
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl ,CURLOPT_HTTPHEADER, $stkpushheader);
$curl_post_data = array(
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackUrl' => $callbackurl,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
    );

    print_r($curl_post_data);


$data_string = json_encode($curl_post_data);


curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);

if($curl_response == ""){
    echo "Failed";
}else{
    echo $curl_response;
}
