<?php 
 /* 
 PayPal and database configuration 
*/ 

// PayPal configuration 

 /*define('PAYPAL_ID', 'mmjaved07@gmail.com'); 

 define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 

 define('PAYPAL_RETURN_URL', 'localhost/paypal/success.php'); 

 define('PAYPAL_CANCEL_URL', 'localhost/paypal/cancel.php'); 

 define('PAYPAL_NOTIFY_URL', 'localhost/paypal/ipn.php'); 

 define('PAYPAL_CURRENCY', 'USD'); 


 // Database configuration 

 define('DB_HOST', 'localhost'); 

 define('DB_USERNAME', 'root'); 

 define('DB_PASSWORD', ''); 

 define('DB_NAME', 'bestassignmentsupport'); 


 // Change not required 

 define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
*/
function verifyTransaction($data) {
    global $paypalUrl;

    $req = 'cmd=_notify-validate';
    foreach ($data as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
        $req .= "&$key=$value";
    }

    $ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    $res = curl_exec($ch);
    if (!$res) {
        $errno = curl_errno($ch);
        $errstr = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: [$errno] $errstr");
    }

    $info = curl_getinfo($ch);

    // Check the http response
    $httpCode = $info['http_code'];
    if ($httpCode != 200) {
        throw new Exception("PayPal responded with http code $httpCode");
    }
    curl_close($ch);

    return $res === 'VERIFIED';
}

 ?>