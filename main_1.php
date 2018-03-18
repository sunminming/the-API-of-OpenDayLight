<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-15
 * Time: 下午9:49
 */

require_once "get_flow.php";

$result = array(
    "result" => false,
    "reason" => null
);
$output = get_flow();

//can't find the flow table
if($output == null){
    $result = array(
        "result" => false,
        "reason" => "please connect the ODL"
    );
}
else {
    if (count($output["errors"])) {
        $result = array(
            "result" => false,
            "reason" => "error of flow table"
        );
    } else {
        $action = $output["flow-node-inventory:flow"][0]["instructions"]["instruction"][0]["apply-actions"]["action"][0];
        if ($action["group-action"]["group-id"] == 1234) {
            $result = array(
                "result" => true,
                "reason" => null
            );
        } else {
            $result = array(
                "result" => false,
                "reason" => "error of the action"
            );
        }
    }
}

var_dump($result);