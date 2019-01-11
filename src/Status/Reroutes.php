<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/8/2019
 * Time: 1:57 PM
 */

namespace RWC\Shutterfly\Status;

use DOMDocument;
use DOMElement;
use RWC\Shutterfly\AbstractXmlFragment;
use RWC\Shutterfly\IXmlFragment;
use RWC\Shutterfly\Status\Rerouted;

class Reroutes extends AbstractXmlFragment
{
    /**
     * A collection of Rerouted objects.
     *
     * @var Rerouted[]
     */
    protected $rerouteds;

    /**
     * Reroutes constructor.
     * @param Rerouted[] $rerouteds
     */
    public function __construct(array $rerouteds)
    {
        $this->setRerouteds($rerouteds);
    }


    /**
     * Returns a collection of Rerouted objects.
     *
     * @return Rerouted[] Returns a collection of Rerouted objects.
     */
    public function getRerouteds(): array
    {
        return $this->rerouteds;
    }

    /**
     * Returns true if there are any rerouted.
     *
     * @return bool Returns true if there are any rerouted.
     */
    public function hasItems() : bool
    {
        return count($this->getRerouteds()) > 0;
    }

    /**
     * Sets the collection of Rerouted objects.
     *
     * @param Rerouted[] $rerouteds A collection of Rerouted objects.
     */
    public function setRerouteds(array $rerouteds): void
    {
        $this->rerouteds = $rerouteds;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        $rerouteds = [];
        $reroutesEl = $element->getElementsByTagName('reroutes');
        foreach ($reroutesEl as $reroutedEl) {
            $rerouteds[] = Rerouted::fromDomElement($reroutedEl);
        }

        return new Reroutes($rerouteds);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $reroutesEl = $document->createElement('reroutes');
        foreach ($this->getRerouteds() as $rerouted) {
            $reroutesEl->appendChild($rerouted->toDomElement($document));
        }

        return $reroutesEl;
    }
}