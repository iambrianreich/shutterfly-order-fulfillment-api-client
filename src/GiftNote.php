<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 3:56 PM
 */

namespace RWC\Shutterfly;

/**
 * A gift note to apply to an order. How gift notes are handled is determined
 * offline between Shutterfly and the fulfiller.
 *
 * @package RWC\Shutterfly
 */
class GiftNote
{
    /**
     * Lines of text comprising the gift note. There will be from one to four
     * lines of text.
     *
     * @var string[]
     */
    protected $lines;

    /**
     * Lines of text comprising the gift note. There will be from one to four
     * lines of text.
     *
     * @return string[] Lines of text comprising the gift note
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * Lines of text comprising the gift note. There will be from one to four
     * lines of text.
     *
     * @param string[] $lines Lines of text comprising the gift note.
     */
    public function setLines(array $lines): void
    {
        $this->lines = $lines;
    }

    /**
     * Lines of text comprising the gift note. There will be from one to four
     * lines of text.
     *
     * @param string $line Lines of text comprising the gift note.
     */

    public function addLine(string $line) : void
    {
        if (! is_array($this->lines)) {
            $this->lines = [];
        }

        $this->lines[] = $line;
    }

}