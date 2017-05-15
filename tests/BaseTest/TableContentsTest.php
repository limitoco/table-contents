<?php

use Lutdev\TOC\TableContents;

class TableContentsTest extends PHPUnit_Framework_TestCase
{
	/** @var  TableContents */
	public $toc;

	private $text = '';

	public function setUp()
	{
		parent::setUp();
		$this->toc = new TableContents();
		$this->setText();
	}

	public function setText()
	{
		$this->text = '<h1>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</h1>' .
			'Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. ' .
			'<h2>Quisque velit nisi, pretium ut lacinia in, elementum id enim.</h2> Donec sollicitudin molestie malesuada. ' .
			'Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. ' .
			'<h3>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h3> Lorem ipsum dolor sit amet, consectetur ' .
			'adipiscing elit. Nulla quis lorem ut libero malesuada feugiat.';

		return $this;
	}

	/**
	 * @test
	 */
	public function propertyType()
	{
		$this->assertInternalType('string', $this->toc->spaces);
		$this->assertInternalType('string', $this->toc->symbols);
		$this->assertInternalType('string', $this->toc->stripTags);
	}

	/**
	 * @test
	 */
	public function headerLinks()
	{
		$newDescription = $this->toc->headerLinks($this->text);

		$this->assertEquals("<h1 id='vestibulum-ac-diam-sit-amet-quam-vehicula-elementum-sed-sit-amet-dui'>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</h1>Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. <h2 id='quisque-velit-nisi-pretium-ut-lacinia-in-elementum-id-enim'>Quisque velit nisi, pretium ut lacinia in, elementum id enim.</h2> Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. <h3 id='mauris-blandit-aliquet-elit-eget-tincidunt-nibh-pulvinar-a'>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h3> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat."
			, $newDescription);
	}
}
