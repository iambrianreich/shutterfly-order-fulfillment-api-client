<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 11:33 AM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;
use RWC\Shutterfly\Extensions\IExtension;

class Extension extends AbstractXmlFragment implements IExtension
{

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        // TODO Make extensible.
        return new Extension();
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        // TODO Make extensible.
        return $document->createElement('extension');
    }
}