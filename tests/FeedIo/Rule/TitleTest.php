<?php
/*
 * This file is part of the feed-io package.
 *
 * (c) Alexandre Debril <alex.debril@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FeedIo\Rule;


use FeedIo\Feed\Item;

class TitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Title
     */
    protected $object;

    const TITLE = 'my great article';

    protected function setUp()
    {
        $this->object = new Title();
    }

    public function testGetNodeName()
    {
        $this->assertEquals('title', $this->object->getNodeName());
    }

    public function testSet()
    {
        $item = new Item();

        $this->object->setProperty($item, new \DOMElement('title', 'feed-io title'));
        $this->assertEquals('feed-io title', $item->getTitle());
    }

    public function testCreateElement()
    {
        $item = new Item();
        $item->setTitle(self::TITLE);

        $element = $this->object->createElement(new \DOMDocument(), $item);
        $this->assertInstanceOf('\DomElement', $element);
        $this->assertEquals(self::TITLE, $element->nodeValue);
        $this->assertEquals('title', $element->nodeName);
    }

}
 