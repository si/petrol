<?php
class MapHelper extends Helper
{

    var $helpers = array('Html');

    function displaymap($locations=false,$width=500,$height=500)
    {
        App::import('Vendor', 'GoogleMapAPI', array('file' => 'GoogleMapAPI.class.php'));

        $map = new GoogleMapAPI('map');
        if($locations)
        foreach($locations as $location)
        {
            $map->addMarkerByAddress( $location['address'],strip_tags($location['title']), $location['title']);  //adds address to showup in Map
        }
        else
        {
            $map->setCenterCoords(54.316523,-3.076172);   // if no locations are passed in function, then focus on US
            $map->setZoomLevel(3);
        }

        $map->setWidth($width);
        $map->setHeight($height);
        $map_content=$map->getHeaderJS().$map->getMapJS().$map->getMap();
        return $this->output($map_content);
    }
}
?>