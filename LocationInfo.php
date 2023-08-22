<?php

class LocationInfo
{
    private $city;
    private $url;
    private $data;

    public function getData()
    {
        return $this->data;
    }

    public function __construct($city)
    {
        $this->city = $city;
        $this->url = $this->generateUrl();
        $this->createRequest();
    }


    private function generateUrl()
    {
        return "https://api.openweathermap.org/data/2.5/weather?q=$this->city&units=metric&appid=929f2f39e0a8408001b4f8180c6f0adc";

    }
    private function createRequest(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL,$this->url);
        $response = curl_exec($ch);
        $this->data = json_decode($response ,true);
        curl_close($ch);
    }
}