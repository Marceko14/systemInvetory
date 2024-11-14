<?php
// Datos
if(!empty($_POST)){
$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
$ruc = isset($_POST['documento'])?$_POST['documento']:0;

// Iniciar llamada a API
$curl = curl_init();

// Buscar ruc sunat
curl_setopt_array($curl, array(
  // para usar la versión 2
  //CURLOPT_URL =>0 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $ruc,
  // para usar la versión 1
  CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: http://apis.net.pe/api-ruc',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// Datos de empresas según padron reducido
$empresa = json_decode($response);
$codigo=0;
$msg=0;
$data="";
if(!empty($empresa->message)){
  $codigo=-1;
  $msg="no encontrado";
}else if(!empty($empresa->error)){
  $codigo=0;
  $msg=$empresa->error;
}else if(!empty($empresa->numeroDocumento)){
  $codigo=1;
  $data=$empresa;
}
$respueta_js=[
  'mensaje'=>$msg,
  'codigo'=>$codigo,
  'data'=>$data
];
echo json_encode($respueta_js);
}
?>