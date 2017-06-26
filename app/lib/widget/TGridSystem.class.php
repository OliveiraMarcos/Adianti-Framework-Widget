<?php

/**
 * TGridSystem 
 * @author  Marcos Oliveira <>
 */

class TGridSystem extends TElement

{

    protected $rows;
    protected $type;

    

    /**

     * Class Constructor

     */

    public function __construct(array $type = ['col-md-'], $box=NULL)

    {

        parent::__construct('div');

        $this->id = 'tgridsystem_' . uniqid();
        $this->{'class'} = $box;
        $this->type = $type;

        $this->rows = array();

    }

    
    public function addRow(){
        $row = new TGridRow();
        $this->rows[] = $row;
        return end($this->rows);
    }
    
    public function addCellsByRow(array $cells){
        if($cells){
            $row = new TGridRow();
            foreach($cells as $cell){
                if($cell instanceof TGridCell){
                    $row->addCell($cell);
                }
            }
            if($row->size() > 0){
                $this->rows[] = $row;
            }
        }
        return $this;
    }
    
    public function addArryCellByRow(array $array){
        $row = new TGridRow();
        foreach($array as $cell){
            $cell = new TGridCell($array[0], $array[1]);
            $row->addCell($cell);
        }
        if($row->size() > 0){
            $this->rows[] = $row;
        }
        return $this;
    }

   

    /**

     * Shows the widget at the screen

     */

    public function show()

    {
        

        foreach ($this->rows as $row)

        {
            if($row instanceof TGridRow){
                $line = new TElement('div');
                $line->{'class'} = 'row';

                
                foreach($row->getCells() as $cell){
                    $class = '';
                    if(count($this->type) >= count($cell->getSpaces())){
                        foreach($cell->getSpaces() as $key => $value){
                            $class .= $this->type[$key].$value. ' ';
                        }
                    }
                    $col = new TElement('div');
                    $col->{'class'} = $class;
                    foreach($cell->getContext() as $context){
                        $col->add($context);
                    }
                    $line->add($col);
                }
                parent::add($line);
                
            }

            

        }

        

        parent::show();

    }

}

class TGridCell{
    protected $space;
    protected $context;
    
    /**

     * Class Constructor

     */

    public function __construct($object=null, array $space=[12])

    {

        

        $this->space = $space;

        $this->context = array();
        $this->addContext($object);

    }
    
    public function addContext($context){
        $this->context[] = $context;
    }
    
    public function getSpaces(){
        return $this->space;
    }
    
    public function getContext(){
        return $this->context;
    }
    
}

class TGridRow{
    protected $cells;
    
    /**

     * Class Constructor

     */

    public function __construct()

    {

        

        $this->cells = array();

    }
    
    public function addCell(TGridCell $cell){
        $this->cells[] = $cell;
        return $this;
    }
    
    public function size(){
        return count($this->cells);
    }
    
    public function getCells(){
        return $this->cells;
    }

}

