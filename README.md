Geocoordinates
==============

Small library for working with latitude/longitude with PHP. Supports decimal, WGS84 and sexagesimal (degrees minutes seconds) formats.

Usage
-----

    <?php 
        require_once('Geocoordinates/init.php');

        // Create a new point in WGS84 coordinate system (10^6 precision, useful for working with Tomtom)
        $wgs = new Geocoordinates_WGS84(51500385, -0125152);

        // Convert that point to a sexagesimal (DMS) representation
        $sexagesimal = $wgs->getDegreesMinutesSeconds();

        // Modify the sexagesimal notation internals
        $sexagesimal->setFromDecimal(51.49192, 0.010367);
        $sexagesimal->setFromWGS(514192, 10367);

        // Print sexagesimal notation (friendly format, with degrees symbols etc)
        echo $sexagesimal->getLatitudeString();
        echo $sexagesimal->getLongitudeString();

        // WGS84 objects inherit from decimal so internally store as decimal precision
        echo $wgs->getLatitude(); // 51.500385
        echo $wgs->getLongitude(); // -0.125152

        // Create a pure decimal version if you prefer
        $decimal = new Geocoordinates_Decimal(51.500385, -0.125152);
    ?>
