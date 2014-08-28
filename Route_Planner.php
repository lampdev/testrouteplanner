<?php

/**
 * Route_Planner
 *
 * class implementing algorithm of the route planner
 */
class Route_Planner {
    /*
     * @var array of Boarding_Cards. Unsorted
     */
    protected $_inputCards;
    
    /*
     * @var integer Number of Start Point in the output Route
     */
    protected $_start;
    
    /*
     * @var integer Number of End Point in the output Route
     */
    protected $_end;
    
    /*
     * @var array Output sorted route
     */
    protected $_route = array();
    
    /*
     * Constructor, accepts unsorted array of Boarding_Cards
     * 
     * @param array Boarding Cards
     * @returns void
     */
    public function __construct($inputCards) {
        if(empty($inputCards) || !count($inputCards)) {
            throw new Exception('There must be at least one barding card');
        }
        $this->_inputCards = $inputCards;
    }
    
    /*
     * Get the current start point from the current set of points
     * 
     * @param void
     * @returns Boarding_Card of start point
     */
    protected function _getCurrentStart() {
        if(!count($this->_inputCards)) {
            return false;
        }
        // we need to determine the start point. This will be the one which met only once in the whole
        // set and start will be the one that is "start point" in a card
        $points = array();
        for ($i = 0; $i < count($this->_inputCards); $i++) {
            $card = $this->_inputCards[$i];
            
            if(!array_key_exists($card->getStartPoint(),$points)) {
                $points[$card->getStartPoint()] = array('purpose' => 'start', 'number' => 1, 'position' => $i);
            } else {
                $points[$card->getStartPoint()]['number']++;
            }
            if(!array_key_exists($card->getEndPoint(),$points)) {
                $points[$card->getEndPoint()] = array('purpose' => 'end', 'number' => 1, 'position' => $i);
            } else {
                $points[$card->getEndPoint()]['number']++;
            }
        }
        
        foreach($points as $key => $point) {
            if($point['number'] == 1 && $point['purpose'] == 'start') {
                $start = array_slice($this->_inputCards,$point['position'],1)[0];
                array_splice($this->_inputCards,$point['position'],1);
            }
        }
        
        return $start;
    }
    
    /*
     * Get the route
     * 
     * @param void
     * @returns array of boarding cards shuffled. Ready to test the algorithm
     */
    public function calculateRoute() {
        while(($point = $this->_getCurrentStart()) !== false) {
            array_push($this->_route,$point);
        }
        
        return $this->_route;
    }
}
