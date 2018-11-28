<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 3:09 PM
 */

namespace RWC\Shutterfly;


use RWC\Shutterfly\Extensions\IExtension;

/**
 * This is a mechanism to allow additional fulfiller-specific customization of
 * various parts of the order. It is expected that properties will be enough to
 * handle any customization needs, but the option of using arbitrary XML is
 * also provided.
 *
 * @package RWC\Shutterfly
 */
class Customize
{
    /**
     * List of properties. What properties may appear, and their meaning, are
     * determined offline between Shutterfly and the fulfiller.
     *
     * @var Property[]
     */
    protected $properties;

    /**
     * This is a wrapper around fulfiller specific xml. Shutterfly will work
     * with fulfillers to define schemas as needed.
     *
     * @var IExtension|null
     */
    protected $extension;

    /**
     * List of properties. What properties may appear, and their meaning, are
     * determined offline between Shutterfly and the fulfiller.
     *
     * @return Property[]  List of properties.
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * List of properties. What properties may appear, and their meaning, are
     * determined offline between Shutterfly and the fulfiller.
     *
     * @param Property[] $properties List of properties.
     */
    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    /**
     * Adds a Property.
     *
     * @param Property $property The Property to add.
     */
    public function addProperty(Property $property) : void
    {
        // Ensure we have an array.
        $this->properties = $this->properties ?? [];

        $this->properties[] = $property;
    }

    /**
     * This is a wrapper around fulfiller specific xml. Shutterfly will work
     * with fulfillers to define schemas as needed.
     *
     * @return null|IExtension A Schema extension.
     */
    public function getExtension(): ?IExtension
    {
        return $this->extension;
    }

    /**
     * This is a wrapper around fulfiller specific xml. Shutterfly will work
     * with fulfillers to define schemas as needed.
     *
     * @param null|IExtension $extension A Schema extension.
     */
    public function setExtension(?IExtension $extension): void
    {
        $this->extension = $extension;
    }
}