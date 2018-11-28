<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 10:59 PM
 */

namespace RWC\Shutterfly;


class Document
{
    /**
     * String identifier describing this document role. If it is missing
     * (backwards compatibility) then it is assumed PRINT. Other options could
     * be FOIL_PREVIEW, FOIL_DIE.
     *
     * @var string|null
     */
    protected $id;

    /**
     * The type of document that is being referenced. The valid types are
     * “pdf” and “jpeg”.
     *
     * @var string
     */
    protected $type;

    /**
     * The number of pages contained in the document.
     *
     * @var int
     */
    protected $pageCount;

    /**
     * URL for downloading the document from Shutterfly. URL is no longer valid
     * after the order is complete.
     *
     * @var string
     */
    protected $location;

    /**
     * The rotation, in degrees, that needs to be applied to the image before
     * printing. Default is 0 if not included.
     *
     * @var int|null
     */
    protected $rotation;

    /**
     * For multi-image products, defines image order. How ordering is used will
     * be product dependent. Starts at zero.
     *
     * @var int|null
     */
    protected $sequenceNumber;

    /**
     * Md5 checksum for the image. Used to verify image is intact after downloading.
     *
     * @var string|null
     */
    protected $md5Sum;

    /**
     * String identifier describing this document role. If it is missing
     * (backwards compatibility) then it is assumed PRINT. Other options could
     * be FOIL_PREVIEW, FOIL_DIE.
     *
     * @return null|string String identifier describing this document role.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * String identifier describing this document role. If it is missing
     * (backwards compatibility) then it is assumed PRINT. Other options could
     * be FOIL_PREVIEW, FOIL_DIE.
     *
     * @param null|string $id String identifier describing this document role.
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * The type of document that is being referenced. The valid types are
     * “pdf” and “jpeg”.
     *
     * @return string The type of document that is being referenced.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of document that is being referenced. The valid types are
     * “pdf” and “jpeg”.
     *
     * @param string $type The type of document that is being referenced.
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * The number of pages contained in the document.
     *
     * @return int The number of pages contained in the document.
     */
    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    /**
     * The number of pages contained in the document.
     *
     * @param int $pageCount The number of pages contained in the document.
     */
    public function setPageCount(int $pageCount): void
    {
        $this->pageCount = $pageCount;
    }

    /**
     * URL for downloading the document from Shutterfly. URL is no longer valid
     * after the order is complete.
     *
     * @return string URL for downloading the document from Shutterfly.
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * URL for downloading the document from Shutterfly. URL is no longer valid
     * after the order is complete.
     *
     * @param string $location URL for downloading the document from Shutterfly.s
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * The rotation, in degrees, that needs to be applied to the image before
     * printing. Default is 0 if not included.
     *
     * @return int|null The rotation, in degrees
     */
    public function getRotation(): ?int
    {
        return $this->rotation;
    }

    /**
     * The rotation, in degrees, that needs to be applied to the image before
     * printing. Default is 0 if not included.
     *s
     * @param int|null $rotation The rotation, in degrees
     */
    public function setRotation(?int $rotation): void
    {
        $this->rotation = $rotation;
    }

    /**
     * For multi-image products, defines image order. How ordering is used will
     * be product dependent. Starts at zero
     *
     * @return int|null For multi-image products, defines image order.
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequenceNumber;
    }

    /**
     * For multi-image products, defines image order. How ordering is used will
     * be product dependent. Starts at zero.
     *
     * @param int|null $sequenceNumber For multi-image products, defines image order.
     */
    public function setSequenceNumber(?int $sequenceNumber): void
    {
        $this->sequenceNumber = $sequenceNumber;
    }

    /**
     * Md5 checksum for the image. Used to verify image is intact after downloading.
     *
     * @return null|string Md5 checksum for the image. Used to verify image is intact after downloading.
     */
    public function getMd5Sum(): ?string
    {
        return $this->md5Sum;
    }

    /**
     * Md5 checksum for the image. Used to verify image is intact after downloading.
     *
     * @param null|string $md5Sum Md5 checksum for the image. Used to verify image is intact after downloading.
     */
    public function setMd5Sum(?string $md5Sum): void
    {
        $this->md5Sum = $md5Sum;
    }


}