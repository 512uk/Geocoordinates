<?php

    /**
     * Represents geocoordinates in degrees/minutes/seconds format
     */
    class Geocoordinates_Sexagesimal {

        private $_latitudeDegrees;
        private $_latitudeMinutes;
        private $_latitudeSeconds;

        private $_longitudeDegrees;
        private $_longitudeMinutes;
        private $_longitudeSeconds;

        public function __construct($latitudeDegrees=null, $latitudeMinutes=null, $latitudeSeconds=null, 
            $longitudeDegrees=null, $longitudeMinutes=null, $longitudeSeconds=null)
        {
            $this->_latitudeDegrees = $latitudeDegrees;
            $this->_latitudeMinutes = $latitudeMinutes;
            $this->_latitudeSeconds = $latitudeSeconds;
            $this->_longitudeDegrees = $longitudeDegrees;
            $this->_longitudeMinutes = $longitudeMinutes;
            $this->_longitudeSeconds = $longitudeSeconds;
        }

        public function setFromDecimal($latitudeDecimal, $longitudeDecimal)
        {
            $this->setLatitudeFromDecimal($latitudeDecimal);
            $this->setLongitudeFromDecimal($longitudeDecimal);
        }

        /**
         * Sets coordinates from WGS84 coordinate (decimal but in 10^6 rounding notation)
         */
        public function setFromWGS($latitudeWgs, $longitudeWgs)
        {
            $this->setLatitudeFromDecimal($latitudeWgs / pow(10, 6));
            $this->setLongitudeFromDecimal($longitudeWgs / pow(10, 6));
        }

        /**
         * Sets latitude deg/min/sec from a decimal
         */
        public function setLatitudeFromDecimal($latitudeDecimal)
        {
            $this->_latitudeDegrees = intval($latitudeDecimal);
            $this->_latitudeMinutes = abs(fmod($latitudeDecimal, 1) * 60);
            $this->_latitudeSeconds = abs(fmod(fmod($latitudeDecimal, 1) * 60, 1) * 60);
        }

        public function setLongitudeFromDecimal($longitudeDecimal)
        {
            $this->_longitudeDegrees = intval($longitudeDecimal);
            $this->_longitudeMinutes = abs(fmod($longitudeDecimal, 1) * 60);
            $this->_longitudeSeconds = abs(fmod(fmod($longitudeDecimal, 1) * 60, 1) * 60);
        }

        /**
         * Return a sprintf formatted string representing the latitude. Shows absolute value (e.g. North or South)
         * Example: 52°41'13.16 N
         */
        public function getLatitudeString()
        {
            $suffix = 'N';

            if ($this->_latitudeDegrees <= 0) 
            {
                $suffix = 'S';
            }

            return sprintf("%02.0F°%02.0F'%02.2F\" %s", abs($this->_latitudeDegrees), $this->roundFloat($this->_latitudeMinutes), $this->_latitudeSeconds, $suffix);

        }

        public function getLongitudeString()
        {
            $suffix = 'E';

            if ($this->_longitudeDegrees <= 0) 
            {
                $suffix = 'W';
            }

            return sprintf("%02.0F°%02.0F'%02.2F\" %s", abs($this->_longitudeDegrees), $this->roundFloat($this->_longitudeMinutes), $this->_longitudeSeconds, $suffix);

        }

        public function setLatitudeDegrees($latitudeDegrees)
        {
            $this->_latitudeDegrees = $latitudeDegrees;
        }

        public function setLatitudeMinutes($latitudeMinutes)
        {
            $this->_latitudeMinutes = $latitudeMinutes;
        }

        public function setLatitudeSeconds($latitudeSeconds)
        {
            $this->_latitudeSeconds = $latitudeSeconds;
        }


        // Helper function to correctly round a float for lat/long usage
        private function roundFloat($float)
        {
            if ($float < 0)
            {
                return ceil($float);
            }

            return floor($float);
        }

    } // end Geocoordinates_Sexagesimal class
