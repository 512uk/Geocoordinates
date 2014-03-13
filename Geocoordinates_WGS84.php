<?php

    require_once('Geocoordinates_Decimal.php');

    /**
     * Represents a latitude/longitude geocoordinate in WGS84 format. Decimal, but raised to 10^6. 
     *  Example: 52686990, -3080340
     */
    class Geocoordinates_WGS84 extends Geocoordinates_Decimal {

        /**
         * Construct with lat/long in WGS84 format
         */
        public function __construct($latitude = null, $longitude = null)
        {
            parent::__construct($latitude / pow(10, 6), $longitude / pow(10, 6));
        }

        //--------------------------------------------------------------------------------
        // Standard getter/setter interface
        //--------------------------------------------------------------------------------

        public function setLatitude($latitude)
        {
            $this->_latitude = $latitude / pow(10, 6);
        }

        public function setLongitude($longitude)
        {
            $this->_longitude = $longitude / pow(10, 6);
        }

    } // end class Geocoordinates_WGS84
