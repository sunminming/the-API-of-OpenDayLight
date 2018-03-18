<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-7
 * Time: 下午7:27
 */

require_once "httpRequest.class.php";

function get_request()
{
    $url = 'http://127.0.0.1:8181/restconf/operational/network-topology:network-topology';

    $http = new httpRequeset;
    //json from ODL
    $output = $http->httpRequeset($url, 'GET', null);
//    if($output == null){
//        return false;
//    }
//    else {
        //Convert json to an array
        $output = json_decode($output, true);

        //echo $output['network-topology']['topology'][0]['link'][0]['link-id'];

        //an array for the link date:(s1,host);
        $links = array();

        //link_count
        $link_count = count($output['network-topology']['topology'][0]['link']);

        //Save the link data
        for ($i = 0; $i < $link_count; $i++) {
            $src = $output['network-topology']['topology'][0]['link'][$i]['source']['source-node'];
            $dest = $output['network-topology']['topology'][0]['link'][$i]['destination']['dest-node'];

            //openflow:1:1 ====> s1
            if ($src[0] == "o") {
                $src = "s" . $src[9];
            } else {
                $src = substr($src, 5);
            }

            //host: =====> h
            if ($dest[0] == "o") {
                $dest = "s" . $dest[9];
            } else {
                $dest = substr($dest, 5);
            }

            //a link data : (s1 , h)
            $link = $src . " " . $dest . ("\n");
            array_push($links, $link);
        }

        //var_dump($links);
        return $links;
    //}
}