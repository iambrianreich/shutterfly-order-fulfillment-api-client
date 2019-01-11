<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/11/2019
 * Time: 12:47 PM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;

class Error extends AbstractXmlFragment
{
    /**
     * Error summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * Error detail.
     *
     * @var string|null
     */
    protected $detail;

    /**
     * Error constructor.
     * @param string $summary
     * @param null|string $detail
     */
    public function __construct(string $summary, ?string $detail)
    {
       $this->setSummary($summary);
       $this->setDetail($detail);
    }

    /**
     * Returns the error summary.
     *
     * @return string Returns the error summary.
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Sets the error summary.
     *
     * @param string $summary Sets the error summary.
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * Returns the error detail.
     *
     * @return null|string Returns the error detail.
     */
    public function getDetail(): ?string
    {
        return $this->detail;
    }

    /**
     * Sets the error detail.
     *
     * @param null|string $detail Sets the error detail.
     */
    public function setDetail(?string $detail): void
    {
        $this->detail = $detail;
    }

    /**
     * Returns true if error details were returned.
     *
     * @return bool Returns true if error details were returned.
     */
    public function hasDetail() : bool
    {
        return ! empty($this->getDetail());
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        // summary is required
        if (! self::hasChild($element, 'summary')) {
            throw new \InvalidArgumentException(
                'summary is a required sub-element'
            );
        }
        $summary = self::getFirstChild($element, 'summary')->textContent;

        // detail is optional
        $detail = null;
        if (self::hasChild($element, 'detail')) {
            $detail = self::getFirstChild($element, 'detail')->textContent;
        }

        return new Error($summary, $detail);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $element = $document->createElement('error');
        $element->appendChild($document->createElement('summary', $this->getSummary()));

        // Optional
        if (! empty($this->getDetail())) {
            $element->appendChild($document->createElement('detail', $this->getDetail()));
        }

        return $element;
    }
}