<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-9
 * Time: 下午2:56
 */

require_once "mininet_topo.php";
require_once "httpRequest.class.php";
require_once "get_request.php";
require_once "open_flie.php";

$url = 'http://127.0.0.1:8181/restconf/operational/network-topology:network-topology';

$http = new httpRequeset;
//json from ODL
$output = $http->httpRequeset($url, 'GET', null);
    if($output == null){
        $error_data = array(
            'result' => false,
            'reason' => 'Please connect the OpenDaylight!',
            'problem_links' => null
        );
        $error_data = json_encode($error_data);

        echo $error_data;
    }
    else{
        $PUT_data = mininet_topo();
//var_dump($PUT_data);
//if($PUT_data == null){
//    $error_data = array(
//        'result' => false,
//        'reason' => 'Please connect the OpenDaylight!',
//        'problem_links' => null
//    );
//    $erroe = json_encode($error_data);
//    echo $error_data;
//}
//else {
        $PUT_data = json_encode($PUT_data);

        echo $PUT_data;
}
