<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 1/10/2019
 * Time: 2:37 PM
 */

namespace RWC\Shutterfly;


use DOMDocument;
use DOMElement;

class Response extends AbstractXmlFragment implements IXmlDocument
{
    /**
     * The XML namespace.
     */
    const XML_NAMESPACE = 'http://www.shutterfly.com/orderv3/response';

    /**
     * @var Version
     */
    protected $version;

    /**
     * Success message, if any.
     *
     * @var null|string
     */
    protected $success;

    /**
     * Error details, if any.
     *
     * @var Error|null
     */
    protected $error;

    public function __construct(?Version $version, ?string $success, ?Error $error)
    {
        $version = $version ?? Version::getCurrentVersion();

        $this->setVersion($version);
        $this->setSuccess($success);
        $this->setError($error);
    }

    /**
     * Returns the Shutterfly Fulfillment API version.
     *
     * @return Version Returns the Shutterfly Fulfillment API version.
     */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /**
     * Sets the Shutterfly Fulfillment API version.
     *
     * @param Version $version The Shutterfly Fulfillment API version.
     */
    public function setVersion(Version $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns the success message, if any.
     *
     * @return null|string Returns the Success message, if any.
     */
    public function getSuccess(): ?string
    {
        return $this->success;
    }

    /**
     * Sets the success message, if any.
     *
     * @param null|string $success Sets the success message if any.
     */
    public function setSuccess(?string $success): void
    {
        $this->success = $success;
    }

    /**
     * Returns the error message if any.
     *
     * @return null|Error Returns the error message if any.
     */
    public function getError(): ?Error
    {
        return $this->error;
    }

    /**
     * Sets the error message if any.
     *
     * @param null|Error $error The error message if any.
     */
    public function setError(?Error $error): void
    {
        $this->error = $error;
    }

    /**
     * Returns true if the response is successful.
     *
     * @return bool Returns true if the response is successful.
     */
    public function isSuccessful() : bool
    {
        return ! empty($this->getSuccess());
    }

    /**
     * Returns true if the response is an error.
     *
     * @return bool Returns true if the response is an error.
     */
    public function isError() : bool
    {
        return ! is_null($this->getError());
    }

    public static function fromXmlString(string $xml) : IXmlDocument
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);

        /** @var Response $response */
        $response = self::fromDomElement($dom->documentElement);
        return $response;
    }

    /**
     * Creates an instance of the IXMLFragment from a DOMElement.
     *
     * @param DOMElement $element The DOMElement to translate.
     * @return IXmlFragment Returns the translates IXmlFragment.
     */
    public static function fromDomElement(DOMElement $element): IXmlFragment
    {
        $response = $element;
        if (! self::hasChild($response, 'version')) {
            throw new \InvalidArgumentException(
                '<version> is a required sub-element.'
            );
        }

        /** @var Version $version */
        $version = Version::fromDomElement(self::getFirstChild($response, 'version'));

        $success = null;
        $error = null;

        // Verify that there is either a success or error and get the message.
        if (self::hasChild($response, 'success')) {
            // get success/message/<value>
            $successNode = self::getFirstChild($response, 'success');
            $messageNode = self::getFirstChild($successNode, 'message');
            $success = $messageNode->textContent;
        } else if (self::hasChild($response, 'error')) {

            $errorEl = self::getFirstChild($response, 'error');
            /** @var Error $error */
            $error = Error::fromDomElement($errorEl);
        } else {
            throw new \InvalidArgumentException(
                'Either <success/> or <error/> is required.'
            );
        }

        return new Response($version, $success, $error);
    }

    /**
     * Converts the IXmlFragment to a DOMElement.
     *
     * @param DOMDocument $document The parent document used to create the element.
     * @return DOMElement Returns the converted DOMElement.
     */
    public function toDomElement(DOMDocument $document): DOMElement
    {
        $response = $document->createElement('response');
        $response->setAttribute('xmlns', self::XML_NAMESPACE);

        $response->appendChild($this->getVersion()->toDomElement($document));

        if ($this->isSuccessful()) {
            $success = $document->createElement('success');
            $message = $document->createElement('message', $this->getSuccess());
            $response->appendChild($success);
            $success->appendChild($message);
        } else {
            $error = $document->createElement('error');
            $message = $document->createElement('message', $this->getError());
            $response->appendChild($error);
            $error->appendChild($message);
        }

        return $response;
    }

    /**
     * Returns the Document as a DOMDocument.
     *
     * @return DOMDocument Returns the Document as a DOMDocument.
     */
    public function toDomDocument() : DOMDocument
    {
        $document = new DOMDocument();
        $document->appendChild($this->toDomElement($document));
        return $document;
    }

    /**
     * Returns the document as XML.
     *
     * @return string Returns the document as XML.
     */
    public function toXml() : string
    {
        return $this->toDomDocument()->saveXML();
    }
}