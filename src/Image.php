<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 10:52 PM
 */

namespace RWC\Shutterfly;


class Image
{
    /**
     * Commands describing how to render the image. Used only by Shutterfly labs.
     *
     * @var string|null
     */
    protected $renderScript;

    /**
     * URL for downloading the rendered image from Shutterfly. URL is no longer
     * valid after the order is complete.
     *
     * @var string|null
     */
    protected $location;

    /**
     * For multi-image products, defines image order. How ordering is used
     * will be product dependent. Starts at zero.
     *
     * @var int|null
     */
    protected $sequenceNumber;

    /**
     * Md5 checksum for the image. Used to verify image is intact after
     * downloading.
     *
     * @var string|null
     */
    protected $md5Sum;

    /**
     * Commands describing how to render the image. Used only by Shutterfly labs.
     *
     * @return null|string Commands describing how to render the image. Used only by Shutterfly labs.
     */
    public function getRenderScript(): ?string
    {
        return $this->renderScript;
    }

    /**
     * Commands describing how to render the image. Used only by Shutterfly labs.
     *
     * @param null|string $renderScript Commands describing how to render the image. Used only by Shutterfly labs.
     */
    public function setRenderScript(?string $renderScript): void
    {
        $this->renderScript = $renderScript;
    }

    /**
     * URL for downloading the rendered image from Shutterfly. URL is no longer
     * valid after the order is complete.
     *
     * @return null|string URL for downloading the rendered image from Shutterfly.
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * URL for downloading the rendered image from Shutterfly. URL is no longer
     * valid after the order is complete
     *
     * @param null|string $location URL for downloading the rendered image from Shutterfly.
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * For multi-image products, defines image order. How ordering is used will
     * be product dependent. Starts at zero.
     *
     * @return int|null defines image order.
     */
    public function getSequenceNumber(): ?int
    {
        return $this->sequenceNumber;
    }

    /**
     * For multi-image products, defines image order. How ordering is used will
     * be product dependent. Starts at zero.
     *
     * @param int|null $sequenceNumber defines image order.
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