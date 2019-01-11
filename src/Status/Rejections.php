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
use RWC\Shutterfly\Status\Rejected;

class Rejections extends AbstractXmlFragment
{
    /**
     * A collection of Rejected objects.
     *
     * @var Rejected[]
     */
    protected $rejecteds;

    /**
     * Rejections constructor.
     * @param Rejected[] $rejecteds
     */
    public function __construct(array $rejecteds)
    {
        $this->setRejecteds($rejecteds);
    }


    /**
     * Returns a collection of Rejected objects.
     *
     * @return Rejected[] Returns a collection of Rejected objects.
     */
    public function getRejecteds(): array
    {
        return $this->rejecteds;
    }

    /**
     * Returns true if there are any rejected.
     *
     * @return bool Returns true if there are any rejecteds.
     */
    public function hasItems() : bool
    {
        return count($this->getRejecteds()) > 0;
    }

    /**
     * Sets the collection of Rejected objects.
     *
     * @param Rejected[] $rejecteds A collection of Rejected objects.
     */
    public function setRejecteds(array $rejecteds): void
    {
        $this->rejecteds = $rejecteds;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        $rejecteds = [];
        $rejectedEls = $element->getElementsByTagName('rejected');
        foreach ($rejectedEls as $rejectedEl) {
            $rejecteds[] = Rejected::fromDomElement($rejectedEl);
        }

        return new Rejections($rejecteds);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $rejectionsEl = $document->createElement('rejections');
        foreach ($this->getRejecteds() as $rejected) {
            $rejectionsEl->appendChild($rejected->toDomElement($document));
        }

        return $rejectionsEl;
    }
}