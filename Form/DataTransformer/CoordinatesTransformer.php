<?php

namespace FDevs\Geo\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class CoordinatesTransformer implements DataTransformerInterface
{
    /**
     * {@inheritDoc}
     */
    public function transform($value)
    {
        return $value;
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($value)
    {
        if ($value) {
            $value = array_map(function ($val) {
                return $val + 0;
            }, $value);
        }

        return $value;
    }
}
