<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/10/2019
 * Time: 2:52 PM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;

abstract class AbstractXmlFragment implements IXmlFragment
{

    /**
     * Returns true if the element has one or more children with the specified name.
     *
     * @param DOMElement $domElement The DOMElement to use as the root.
     * @param string $name The name of the elements to check for.
     * @return bool Returns true if the element has any children by that name.
     */
    protected static function hasChild(DOMElement $domElement, string $name) : bool
    {
        return count($domElement->getElementsByTagName($name)) > 0;
    }

    /**
     * Helper method that returns the first child of $domElement with the specified name.
     *
     * @param DOMElement $domElement The DOMElement to use as the root.
     * @param string $name The name of the element to return.
     * @return DOMElement Returns the first child with the specified name.
     */
    protected static function getFirstChild(DOMElement $domElement, string $name) : DOMElement
    {
        return $domElement->getElementsByTagName($name)[0];
    }
    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static abstract function fromDomElement(DOMElement $element): IXmlFragment;

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public abstract function toDomElement(DOMDocument $document): DOMElement;
}