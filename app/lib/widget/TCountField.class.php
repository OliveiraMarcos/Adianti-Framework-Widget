<?php
/**
 * TCountField 
 * @author  Marcos Oliveira <>
 */
class TCountField extends TElement
{
    private $image;
    private $title;
    private $number;
    private $porcent;
    private $caption;
    private $sort; // {asc, desc}
    
    /**
     * Class Constructor
     */
    public function __construct($number=0, 
                                $porcent=0,
                                $title='Title', 
                                $caption='Label', 
                                $image='ico_save.png',
                                $sort=NULL)
    {
        parent::__construct('div');
        $this->{'class'} = 'col-md-2 col-sm-4 col-xs-6 tile_stats_count';
        $this->setNumber($number)
             ->setPorcent($porcent)
             ->setTitle($title)
             ->setCaption($caption)
             ->setImage($image)
             ->setSort($sort);
             
    }
    
    public function setImage($image){
        $this->image = $image;
        return $this;
    }
    
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    public function setSort($sort){
        $this->sort = $sort;
        return $this;
    }
    
    public function setCaption($caption){
        $this->caption = $caption;
        return $this;
    }
    
    public function getPorcent(){
        return $this->porcent;
    }
    
    public function setPorcent($porcent){
        $this->porcent = $porcent;
        return $this;
    }
    
    public function getNumber(){
        return $this->number;
    }
    
    public function setNumber($number){
        $this->number = $number;
        return $this;
    }
    
    
    /**
     * Shows the widget at the screen
     */
    public function show()
    {
       
            $span_top = new TElement('span');
            $span_top->{'class'} = 'count_top';
            if ($this->image)
            {
                $image = new TElement('span');
                $image->{'style'} = 'padding-right:4px';
                
                if (substr($this->image,0,3) == 'bs:')
                {
                    $image = new TElement('i');
                    $image->{'style'} = 'padding-right:4px';
                    $image->{'class'} = 'glyphicon glyphicon-'.substr($this->image,3);
                }
                else if (substr($this->image,0,3) == 'fa:')
                {
                    $fa_class = substr($this->image,3);
                    if (strstr($this->image, '#') !== FALSE)
                    {
                        $pieces = explode('#', $fa_class);
                        $fa_class = $pieces[0];
                        $fa_color = $pieces[1];
                    }
                    $image = new TElement('i');
                    $image->{'style'} = 'padding-right:4px';
                    $image->{'class'} = 'fa fa-'.$fa_class;
                    if (isset($fa_color))
                    {
                        $image->{'style'} .= "; color: #{$fa_color}";
                    }
                }
                else if (file_exists('app/images/'.$this->image))
                {
                    $image = new TImage('app/images/'.$this->image);
                    $image->{'style'} = 'padding-right:4px';
                }
                else if (file_exists('lib/adianti/images/'.$this->image))
                {
                    $image = new TImage('lib/adianti/images/'.$this->image);
                    $image->{'style'} = 'padding-right:4px';
                }
                
                $span_top->add($image);
            }
            
            $span_top->add($this->title);
            parent::add($span_top);
            
            $div = new TElement('div');
            $div->{'class'} = 'count';
            $div->add($this->number);
            parent::add($div);
            
            $span_bottom = new TElement('span');
            $span_bottom->{'class'} = 'count_bottom';
            
            $icon_porcent = new TElement('i');
            $icon_porcent->{'class'} = 'green';
            
            if($this->sort){
                $icon = new TElement('i');
                $icon->{'class'} = 'fa fa-sort-'.$this->sort;
                $icon_porcent->add($icon);
            }
            
            $icon_porcent->add($this->porcent.'%');
            $span_bottom->add($icon_porcent);
            $span_bottom->add($this->caption);
            
            parent::add($span_bottom);
            
            parent::show();
        }
        
     
}
