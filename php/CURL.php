<?php
function enviarNotificacion() {
    // Cargamos los datos de la notificacion en un Array
    $notification = array();
    $notification['title'] = 'Título de la notificación';
    $notification['message'] = 'Mensaje de la notificación';
    $topic = "topic_general";
  
    $fields = array(
        'to' => '/topics/' . $topic,
        'data' => $notification,
    );  
    // Set POST variables
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array(
                'Authorization: key=AAAA6Jc9udo:APA91bGE_2al8KAx3P4ddAMT1JHIcjic9EaLH_NzIp-wAjMSXbTzm8Tl48NbmX-F1Sea2AX-y113wABK-Iz-qMKn_tpLO0xrZkST0q3ovuD11JM7cOH7HuDw4CTh17Nh-qZCeBb5_922',
                'Content-Type: application/json'
                );
                
    // Open connection
    $ch = curl_init();
    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));       
    
    $result = curl_exec($ch);
    echo $result;
    if($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    // Close connection
    curl_close($ch);
}

?>