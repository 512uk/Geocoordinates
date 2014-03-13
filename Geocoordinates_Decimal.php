<?php

    /**
     * The base, 'normal' reference way of referring to geocoordinates. In the format:
     *   52.686990, -3.080340 for example
     */
    class Geocoordinates_Decimal {
        protected $_latitude;
        protected $_longitude;

        public function __construct($latitude=null, $longitude=null)
        {
            $this->_latitude = $latitude;
            $this->_longitude = $longitude;
        }

        public function getDegreesMinutesSeconds()
        {
            return Geocoordinates_SexagesimalFactory::makeFromDecimal($this->_latitude, $this->_longitude);
        }

        //--------------------------------------------------------------------------------
        // Standard getter/setter interface
        //--------------------------------------------------------------------------------
        public function getLatitude()
        {
            return $this->_latitude;
        }

        public function getLongitude()
        {
            return $this->_longitude;
        }

        public function setLatitude($latitude)
        {
            $this->_latitude = $latitude;
        }

        public function setLongitude($longitude)
        {
            $this->_longitude = $longitude;
        }

    }