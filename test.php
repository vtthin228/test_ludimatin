<?php
set_time_limit(200);
function getToken(){
    $data = array("username" => "test_api","password" => "api123456","password_type"=> 0, "code_application" => "webservice_externe", "code_version" => "1"); // data u want to post                                                                   
    $data_string = json_encode($data);                                                                                   
    $username = "test_api";   
    $password = "api123456";                                                                                                                 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://evaluation-technique.lundimatin.biz/api/auth");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             

    if(curl_exec($ch) === false)
    {
        echo 'Curl error: ' . curl_error($ch);
    }                                                                                                      
    $errors = curl_error($ch);                                                                                                            
    $result = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    $resul = (array) json_decode($result, true);

    // echo $resul['datas']['token'];
    return $resul['datas']['token'];
}

function getDataByID($id){
    $ch = curl_init();

    $url = "https://evaluation-technique.lundimatin.biz/api/clients/".$id;

    $username ="";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . getToken());
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );      

    $resp = curl_exec($ch);

    if ($e = curl_error($ch)) {
        echo $e;
    }
    else {
        $decoded = (array) json_decode($resp,true);
        // $data = $decoded['datas']['code'];
        return $decoded['datas'];
    }
    curl_close($ch);
}

function getData(){
    $ch = curl_init();

    $url = "https://evaluation-technique.lundimatin.biz/api/clients/";

    $username ="";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . getToken());
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);

    if ($e = curl_error($ch)) {
        echo $e;
    }
    else {
        $decoded = (array) json_decode($resp,true);
        // $data = $decoded['datas']['code'];
        return $decoded['datas'];
    }
    curl_close($ch);
}

// $data = getData();
// var_dump($data);

// $nom = getDataByID("C-00004");
// echo $nom['nom'];

function putData($id,$json){
    $url = "https://evaluation-technique.lundimatin.biz/api/clients/".$id;
    $username = "";
    $channel = curl_init($url);
     curl_setopt($channel, CURLOPT_USERPWD, $username . ":" . getToken());
     curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($channel, CURLOPT_CUSTOMREQUEST, "PUT");
     curl_setopt($channel, CURLOPT_POSTFIELDS, $json);
     curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 10);
     
     curl_exec($channel);
     $statusCode = curl_getInfo($channel, CURLINFO_HTTP_CODE);
     curl_close($channel);    
     return $statusCode;
 }
//  echo putData("C-00003",'maya labeille','06 26 51 45 89','maya@desruches.fr',"11519 avenue villeneuve d'angouleme",'3407','Béziers');
function deleteData($id){


// Set up cURL
$ch = curl_init("https://evaluation-technique.lundimatin.biz/api/clients/".$id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set up DELETE request
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

// Set up data for DELETE request (if applicable)
// $data = ['key1' => 'value1', 'key2' => 'value2'];
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Send the request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
  die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, true);

// Print the response data
print_r($responseData);
}

function getDataByName($name){
    $ch = curl_init();
  
    $url = "https://evaluation-technique.lundimatin.biz/api/clients/";
    $dataArray = ['nom' => $name];
    $username ="";
    $data = http_build_query($dataArray);
  
    $getUrl = $url."?".$data;
  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . getToken());
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
       
    $response = curl_exec($ch);
        
    if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
    }else{
        $decoded = (array) json_decode($response,true);
        return $decoded['datas'];
        // return $response;
    }
       
    curl_close($ch);

}
//  echo getDataByName('maya labeille');

?>