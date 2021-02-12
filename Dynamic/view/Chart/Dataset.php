<?php


namespace Modules\PanelCore\Dynamic\view\Chart;

class Dataset
{
    public string $label = '# of Votes';
    public array $data = [];
    public int $borderWidth = 2;
    public array $borderDash ;
    public string $borderColor ;
    public bool $hidden=false ;
    public string $backgroundColor = 'transparent';
    public string $pointBorderColor = 'transparent';

    /**
     * Dataset constructor.
     * @param string $label
     * @param array|int[] $data
     * @param string $borderColor
     * @param array $borderDash
     */
    public function __construct(string $label, array $data,string $borderColor = '#3160D8', array $borderDash = [])
    {
        $this->label = $label;
        $this->data = $data;
        $this->borderColor = $borderColor;
        $this->borderDash = $borderDash;
    }

    /**
     * @return Dataset
     */
    public function makeHidden(): Dataset
    {
        $this->hidden = true;
        return $this;
    }

}
