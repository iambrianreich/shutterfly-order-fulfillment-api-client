<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/10/2019
 * Time: 4:59 PM
 */

namespace RWC\Shutterfly;


use DOMDocument;

interface IXmlDocument
{
    /**
     * Converts an XML string into the IXmlDocument.
     *
     * @param string $xml The XML string
     * @return IXmlDocument Returns the document type.
     */
    public static function fromXmlString(string $xml) : IXmlDocument;

    /**
     * Returns the Document as a DOMDocument.
     *
     * @return DOMDocument Returns the Document as a DOMDocument.
     */
    public function toDomDocument() : DOMDocument;

    /**
     * Returns the document as XML.
     *
     * @return string Returns the document as XML.
     */
    public function toXml() : string;
}