<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 2:13 PM
 */

namespace RWC\Shutterfly;

use DOMDocument;
use DOMElement;
use InvalidArgumentException;

/**
 * Version specifies the Shutterfly Fulfillment API version being targeted.
 *
 * @package RWC\Shutterfly
 */
class Version implements IXmlFragment
{
    const VERSION = '3.0';

    /**
     * The version string.
     *
     * @var string
     */
    protected $version;

    /**
     * Creates a new Version.
     *
     * @param string $version The version string.
     */
    protected function __construct(string $version)
    {
        $this->setVersion($version);
    }

    /**
     * Sets the version.
     *
     * @param string $version The version string.
     */
    protected final function setVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * Returns the version string.
     *
     * @return string Returns the version string.
     */
    public final function getVersion() : string
    {
        return $this->version;
    }

    /**
     * Returns the version string.
     *
     * @return Version Returns the API version.
     */
    public static final function getCurrentVersion() : Version
    {
        return new Version(self::VERSION);
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        if ($element->nodeName != 'version') {
            throw new InvalidArgumentException('Expected a <version/>');
        }

        return new Version($element->textContent);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        return $document->createElement('version', $this->getVersion());
    }
}