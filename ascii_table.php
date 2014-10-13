<?php 

/*
array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
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


+----------+---------+---------+----------+
| Name     | Color   | Element |  Likes   |
+----------+---------+---------+----------+
| Trixie   | Green   | Earth   | Flowers  |
| Tinker   | Blue    | Air     | Singing  |
| Blum     | Pink    | Water   | Dancing  |
+----------+---------+---------+----------+
*/
class ASCIITable
{

    private $cols_count;
    private $rows_count;
    private $table_data;
    private $col_size;
    private $cellLeftPadding;
    private $cellRightPadding;
    private $colColors;

    private $current_idx = array( );


    function __construct( $tableData ){
        $this->table_data = $tableData;
        $this->rows_count = count($this->table_data);
        $this->cols_count = count($this->table_data[0]);
        $this->setColSize();
        $this->cellLeftPadding = 2;
        $this->cellRightPadding = 2;
        $this->colColors = array();
        for ($y=0; $y < $this->cols_count; $y++) {
            $this->colColors[] = $this->random_color();
        }
        $this->current_idx = array(0, 0);

    }
    public function drowRowSep(){
        $sep = '+';
        for ($y=0; $y<$this->cols_count; $y++) {
            for ($x = 0; $x < ($this->cellLeftPadding + $this->cellRightPadding)  ; $x++) {
                    $sep .= '-';
            }
            for ($x=0; $x<$this->col_size; $x++) {
               $sep .= '-';
            }  $sep .= '+';
        }
        echo $sep.'</br >';
    }
    public function getColSep(){
        return '|';
    }
    public function drawCell( $cell ){
        $ret =  '';
        $length = strlen($cell);
        
        for ($x = 0; $x < $this->cellLeftPadding; $x++) {
            $ret .= '&nbsp';
        }
        $ret .= $cell;
        for ($x = 0; $x < $this->cellRightPadding + ($this->col_size - $length) ; $x++) {
            $ret .= '&nbsp';
        }

       
        return $ret ;
    }
    public function wrapCellColor($cell){
        $cell = $this->getColSep() . '<span style="background:'.$this->colColors[$this->current_idx[1]].'">' . $cell . '</span>' ;
        $this->current_idx[1]++;
        return $cell ; 
    }
    public function drowRow( $row ){
        $row_line = '';
        foreach ($row  as $cell) {
            $row_line .= $this->wrapCellColor($this->drawCell($cell));
        }
        $row_line .= '|<br />';
        echo $row_line;
        $this->current_idx[0]++;
    }
    

    public function drawTable(){
        $this->drowRowSep();
        $head = array();
        foreach ($this->table_data[0] as $key => $cell) {
            $head[] = $key;
        }

        $this->drowRow($head);
        $this->current_idx[1] = 0;
        $this->drowRowSep();

        foreach ($this->table_data as $row) {
            $this->drowRow($row);
            $this->current_idx[1] = 0;
        }
        $this->drowRowSep();

    }
    public function setColSize(){
        $lengths = array();
        foreach ($this->table_data as $row) {
            foreach ($row as $cell) {
                $lengths[] = strlen($cell);
            }
        }
        $this->col_size = max($lengths);
    }

    public function getColSize(){
        return $this->col_size;
    }
    public function getRightPad(){
        return $this->cellRightPadding ;
    }
    public function getLeftPad(){
        return $this->cellLeftPadding;
    }

    function random_color() {
         $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
         return  '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    }
}