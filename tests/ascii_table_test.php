<?php require_once dirname(__FILE__) . '/../ascii_table.php';
 
class ASCIITableTest extends PHPUnit_Framework_TestCase {

	private $table = array(
		    array(
		        'Name' => 'Trixie',
		        'Color' => 'Green',
		        'Element' => 'Earth',
		        'Likes' => 'Flowers'
		        ),
		    array(
		        'Name' => 'Tinkerbell', // the longest word 10 char
		        'Element' => 'Air',
		        'Likes' => 'Singning',
		        'Color' => 'Blue'
		        ), 
		    array(
		        'Element' => 'Water',
		        'Likes' => 'Dancing',
		        'Name' => 'Blum',
		        'Color' => 'Pink'
		        ),
		);
 		private $row =  array(
		        'Element' => 'Water',
		        'Likes' => 'Dancing',
		        'Name' => 'Blum',
		        'Color' => 'Pink'
		        );
		private $cell =   'Water';

		
		        
    function testCanCreateATable() {
        $AT = new ASCIITable( $this->table );

        $this->assertEquals(10, $AT->getColSize());

		$this->assertEquals($AT->getColSep() , '|');

        ob_start();
	    $AT->drowRowSep();
		$this->assertEquals( ob_get_clean(), '+--------------+--------------+--------------+--------------+</br >');


	    $cell = $AT->drawCell($this->cell);
	    $this->assertEquals($cell , '&nbsp&nbspWater&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp');
		
		$col_exta_pad =  $AT->getColSize() - strlen($this->cell) ;
		$cell_len =  strlen($this->cell) + (($AT->getRightPad() + $AT->getLeftPad() + $col_exta_pad) * 5); // multiply by 5 to add the length of '&nbsp'
		$this->assertEquals( $cell_len  , strlen($cell));

    }
 
}