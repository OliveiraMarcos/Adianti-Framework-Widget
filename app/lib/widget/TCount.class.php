<?php
/**
 * TCount 
 * @author  Marcos Oliveira <>
 */
class TCount extends TElement
{
    protected $fields;
    
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct('div');
        $this->fields = array();
        $this->{'class'} = 'row tile_count';
    }
    
    
    public function addField(TCountField $field)
    {
        $this->fields[] = $field;
    }
    
    /**
     * Shows the widget at the screen
     */
    public function show()
    {
        TPage::include_css('app/resources/custom.css');
        foreach ($this->fields as $field)
        {
            parent::add($field);
        }
        
        parent::show();
    }
}
