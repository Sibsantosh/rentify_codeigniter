<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/splash_screen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>

    <div class="parent">
        <div class="background">
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
        <div class="content">
           <div class="centercontent">
            <div class="note">
            <img id="Logo" src="assets/images/Rentify_Logo.png" alt="Logo" height = 50px width = 60px>
            
            Rentify...
            </div>
            <div class="next"><a href="<?php echo base_url().'login'; ?>"><i class="fa fa-arrow-right" style="font-size:36px; color:#000;" aria-hidden="true"></i></a></div>
           
          
           </div>
        </div>
    </div>
</body>

</html>


<?php


$ch = curl_init();
$url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/sessions";
$username = 'admin';
$password = 'Sibsantosh@2580';
$dataArray = array("{}");
$data = json_encode(new stdClass());

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
    'Authorization: Basic ' . base64_encode("$username:$password")));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$resp = curl_exec($ch);
$token = "";
if($e= curl_error($ch)){
    var_dump( "error". $e);
}else{
    $decodedJson = json_decode($resp, true);
    $token = $decodedJson["response"]["token"];
    setcookie("auth_token", $token, time() + 9*60000,"/");
    var_dump("". $token ."");

    
}

?>