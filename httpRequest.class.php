<?php
error_reporting(E_ALL);
class httpRequeset{
    public function httpRequeset($url, $requesetType, $post_data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requesetType);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '. base64_encode("admin:admin")));
        curl_setopt($ch, CURLOPT_USERPWD, "admin:admin");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        if ($requesetType == 'POST' || $requesetType == 'PUT') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}