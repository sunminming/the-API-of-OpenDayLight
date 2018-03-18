<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-8
 * Time: 下午7:34
 */

require_once "httpRequest.class.php";
require_once "get_request.php";
require_once "open_flie.php";

function mininet_topo()
{
//get students' links
        $students_links = get_request();
//    if($problem_links == null){
//        return false;
//    }
//    else{
//get answer's links
        //var_dump($students_links);
        $answer_links = get_answer_links();
        //var_dump($answer_links);

        $students_links_number = count($students_links);
        //echo $students_links_number;
        $answer_links_number = count($answer_links);
        //echo $answer_links_number;
//true or false flag
        $answer = true;

//students_links_number != answer_links_number,so false
        if ($students_links_number != $answer_links_number) {
            $answer = false;
        } else {
            $problem_links = array();
        //students_links_number == answer_links_number,so contrast students' links with answer's links
            for ($i = 0; $i < $answer_links_number; $i++) {

                for ($j = 0; $j < $students_links_number; $j++) {

                    if ($answer_links[$i] == $students_links[$j]) {
                        $students_links[$j] = null;
                        break;
                    }
                //if don't find the answer link
                    if ($j == $students_links_number - 1) {
                        $answer = false;
                        $problem_link = str_replace("\n", " ", $answer_links[$i]);
                        array_push($problem_links, $problem_link);

                    }
                }
            }
        }

    //var_dump($answer);
        $reason = null;
        if ($answer) {
            $reason = null;
        } else {
            if ($students_links_number != $answer_links_number) {
                $reason = "Error Of The Number Of Links!";
            } else {
                $reason = "Some Links Have Some Problem!";
            }
        }
    //var_dump($problem_links);

        $PUT_data = array(
            'result' => $answer,
            'reason' => $reason,
            'problem_links' => $problem_links
        );
        return $PUT_data;
    //}

}
