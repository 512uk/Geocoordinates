<?php

    require_once('Geocoordinates_Sexagesimal.php');
    
    class Geocoordinates_SexagesimalFactory {

        public static function makeFromDecimal($latitudeDecimal, $longitudeDecimal)
        {
            $coordinate = new Geocoordinates_Sexagesimal();
            $coordinate->setFromDecimal($latitudeDecimal, $longitudeDecimal);
            return $coordinate;
        }
    }