<?php
// Datos
if(!empty($_POST)){

  $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
  $dni = isset($_POST['documento'])?$_POST['documento']:0;
  
  // Iniciar llamada a API
  $curl = curl_init();
  
  // Buscar dni
  curl_setopt_array($curl, array(
    // para user api versión 2
    //CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
    // para user api versión 1
    CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 2,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Referer: https://apis.net.pe/consulta-dni-api',
      'Authorization: Bearer ' . $token
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  // Datos listos para usar
  $persona = json_decode($response);
  //var_dump($persona);
  $codigo=0;
  $msg=0;
  $data="";
  if(!empty($persona->message)){
    $codigo=-1;
    $msg="no encontrado";
  }else if(!empty($persona->error)){
    $codigo=0;
    $msg=$persona->error;
  }else if(!empty($persona->numeroDocumento)){
    $codigo=1;
    $data=$persona;
  }
  $respueta_js=[
    'mensaje'=>$msg,
    'codigo'=>$codigo,
    'data'=>$data
  ];
  echo json_encode($respueta_js);
}
?>