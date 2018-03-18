<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-15
 * Time: 上午10:26
 */
require_once "get_group_table.php";

function main_1_group()
{
    $result = array(
        "result" => false,
        "reason" => null
    );
    $group = get_group_table();

//can't find the group:1234 in openflow:1
    if (count($group["errors"])) {
        $result = array(
            "result" => false,
            "reason" => "error of group table"
        );
    } //find the group:1234 in openflow:1
    else {

        //echo "find the group:1234 in openflow:1" . ("\n");
        $group_type = $group["flow-node-inventory:group"][0]["group-type"];
        $output = $group["flow-node-inventory:group"][0];

        if ($group_type == "group-select") {
            //var_dump(true);
            $bucket_1_weight = $group["buckets"]["bucket"][0]["weight"];
            $bucket_2_weight = $group["buckets"]["bucket"][1]["weight"];
            echo $bucket_1_action = $group["buckets"]["bucket"][0]["action"][0]["output-action"]["output-node-connector"];

            echo $bucket_2_action = $group["buckets"]["bucket"][1]["action"][0]["output-action"]["output-node-connector"];
            if ($bucket_1_weight == 0 && $bucket_2_weight == 0) {
                if ($bucket_2_action && $bucket_1_action) {
                    $result["result"] = true;
                    $result["reason"] = null;
                }
                else {
//                    $result = array(
//                        "result" => false,
//                        "reason" => "error of actions"
//                    );
                    $result["result"] = false;
                    $result["reason"] = "error of actions";
                }
            }
            else {
//                $result = array(
//                    "result" => false,
//                    "reason" => "error of weight"
//                );
                $result["result"] = false;
                $result["reason"] = "error of weight";
            }
        } //error of type
        else {
//            $result = array(
//                "result" => false,
//                "reason" => "error of type"
//            );
            $result["result"] = false;
            $result["reason"] = "error of type";
        }
    }

    return $result;
}

var_dump(main_1());