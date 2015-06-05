<?php

namespace FDevs\Geo\Model;

use GeoJson\Geometry\Point as BasePoint;

class Point extends BasePoint
{
    /**
     * init
     *
     * @param array $position
     */
    public function __construct(array $position = [])
    {
        if (count($position)) {
            parent::__construct($position);
        }
    }

    /**
     * set Coordinates
     *
     * @param array $coordinates
     *
     * @return $this
     */
    public function setCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * set type
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
