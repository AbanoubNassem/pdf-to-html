<?php
use Gufy\PdfToHtml\Pdf;

class PdfInfoTest extends PHPUnit_Framework_TestCase
{
  public function testGetOptions()
  {
    $file = dirname(__FILE__).'/source/test.pdf';
    $pdf = new Pdf($file);
    $this->assertArrayHasKey('pages', $pdf->getInfo());
  }
  public function testAbstract()
  {
    $file = dirname(__FILE__).'/source/test.pdf';
    $pdf = new Pdf($file);
    $html = $pdf->html();
    $this->assertArrayHasKey('pages', $pdf->getInfo());
  }
  public function testChangePage()
  {
    $file = dirname(__FILE__).'/source/test.pdf';
    $pdf = new Pdf($file);
    $html = $pdf->html();

    $this->assertEquals(1, $html->getCurrentPage());
    $html->goToPage(1);
    $this->assertEquals(1, $html->getCurrentPage());
    $this->assertEquals(1, $html->getTotalPages());
    $this->assertArrayHasKey('pages', $pdf->getInfo());
  }
}
