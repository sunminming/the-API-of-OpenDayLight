<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-8
 * Time: 下午1:38
 */

function get_answer_links()
{
    //open file
    $topo_1 = fopen("topo_1.txt", "r") or die("Unable to open file!");

    //an array for saving students_links
    $answer_links = array();
    $line = 0;
    $answer_link = null;
    // output links until end-of-file
    while (!feof($topo_1)) {
        $line++;
        $answer_link = fgets($topo_1);

        array_push($answer_links, $answer_link);

    }
    //echo $line;
    //array_pop($answer_links);
    fclose($topo_1);
    $answer_links[count($answer_links) - 1] = $answer_links[count($answer_links) - 1].("\n");
    return $answer_links;
}