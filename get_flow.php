<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-15
 * Time: 下午9:40
 */

require_once "httpRequest.class.php";

function get_flow(){
    $url = "http://127.0.0.1:8181/restconf/config/opendaylight-inventory:nodes/node/openflow:1/flow-node-inventory:table/0/flow/1234";
    $http = new httpRequeset();
    $output = $http->httpRequeset($url,"GET",null);

    $output = json_decode($output,true);
    //var_dump($output);
    return $output;
}
