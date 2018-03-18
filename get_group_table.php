<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-14
 * Time: 下午2:39
 */
require_once "httpRequest.class.php";

function get_group_table()
{
//get group table
    $url = "http://127.0.0.1:8181/restconf/operational/opendaylight-inventory:nodes/node/openflow:1/flow-node-inventory:group/1234";

    $http = new httpRequeset;

//json from ODL
    $output = $http->httpRequeset($url, 'GET', null);
    $output = json_decode($output, true);

    return $output;
}
