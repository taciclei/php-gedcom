<?php

namespace GedcomTest;

use PhpGedcom\Parser;
use PHPUnit\Framework\TestCase;

/**
 * Class Issue00018Test.
 */
class Issue00018Test extends TestCase
{
    /**
     * Test handling an empty note.
     */
    public function testEmptyNote()
    {
        $sample = realpath(__DIR__.'/files/issue00018.ged');

        $parser = new Parser();
        $gedcom = $parser->parse($sample);

        $sour = current($gedcom->getSour());

        $this->assertCount(0, $sour->getNote());
        $this->assertCount(1, $parser->getErrors());
    }
}
