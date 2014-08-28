<?php
// no namespaces, just a test assignment

/**
 * Test
 *
 * class generating a test route , shuffling it
 */
class Test {
    /*
     * @var array Possible Means of Transportation in the system
     */
    protected $_meansOfTransport = array('bus','train','plane');

    /*
     * @var array Not really a stack, just array of used points, to generate a proper realistic test route
     */
    protected $_stackOfUsedDestinations = array();
    
    /*
     * @var integer Number of points in the route
     */
    protected $_numberOfPoints;

    
    /*
     * Constructor, accepts number of points
     * 
     * @param integer Number of points in the test route
     * @returns void
     */
    public function __construct($numberOfPoints) {
        if(empty($numberOfPoints) || !intval($numberOfPoints)) {
            throw new Exception('Number of points must be integer');
        }
        
        $this->_numberOfPoints = $numberOfPoints;
    }
    
    /*
     * Get test route shuffled
     * 
     * @param void
     * @returns array of boarding cards shuffled. Ready to test the algorithm
     */
    public function generateTestRoute() {
        // here we have to cehck whether the number of points is initialized, but this is a test task, so we just keep it in ming
        $stack = array();
        for($i = 0; $i < $this->_numberOfPoints; $i++) {
            $currentDestination = $this->_getUnusedDestination();
            $currentStart = empty($stack) ? $this->_getUnusedDestination() : $stack[count($stack) - 1]->getEndPoint();
            $currentMeans = $this->_meansOfTransport[array_rand($this->_meansOfTransport)];
            
            $card = new Boarding_Card();
            $card->setStartPoint($currentStart);
            $card->setEndPoint($currentDestination);
            $card->setSeatNumber(rand(0,100));
            $card->setMeansOfTransport($currentMeans);
            
            $stack[] = $card;
            $this->_addUsedDestination($currentDestination);
            $this->_addUsedDestination($currentStart);
        }
        
        shuffle($stack);
        
        return $stack;

    }
    
    protected function _addUsedDestination($destination) {
        if(!in_array($destination,$this->_stackOfUsedDestinations)) {
            $this->_stackOfUsedDestinations[] = $destination;
        }
    }
    
    protected function _getUnusedDestination() {
        $range = range('A','Z');
        return $range[array_rand(array_diff($range,$this->_stackOfUsedDestinations))];
    }
}

