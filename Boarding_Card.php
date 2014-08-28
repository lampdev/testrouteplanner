<?php

/**
 * Boarding_Card
 *
 * class implementing Boarding Card entity
 */
class Boarding_Card {
    /*
     * @var string Start Point
     */
    protected $_startPoint;
    
    /*
     * @var string End Point
     */
    protected $_endPoint;
    
    /*
     * @var string Seat Number
     */
    protected $_seatNumber;
    
    /*
     * @var string Means of Transport
     */
    protected $_meansOfTransport;
    
    /*
     * Constructor, optionally accepts all the properties
     * 
     * @param string Start Point
     * @param string End Point
     * @param string Seat Number
     * @param string Means of Transport
     * @returns void
     */
    public function __construct($startPoint = null, $endPoint = null, $seatNumber = null, $meansOfTransport = null) {
        $this->_startPoint = $startPoint;
        $this->_endPoint = $endPoint;
        $this->_seatNumber = $seatNumber;
        $this->_meansOfTransport = $meansOfTransport;
    }
    
    /*
     * Getter
     * 
     * @param void
     * @returns string Start Point
     */
    public function getStartPoint() {
        return $this->_startPoint;
    }
    
    /*
     * Getter
     * 
     * @param void
     * @returns string End Point
     */
    public function getEndPoint() {
        return $this->_endPoint;
    }
    
    /*
     * Getter
     * 
     * @param void
     * @returns string Seat Number
     */
    public function getSeatNumber() {
        return $this->_seatNumber;
    }
    
    /*
     * Getter
     * 
     * @param void
     * @returns string Means of Transport
     */
    public function getMeansOfTransport() {
        return $this->_meansOfTransport;
    }
    
    /*
     * Setter
     * 
     * @param string Start Point
     * @returns void
     */
    public function setStartPoint($startPoint) {
        $this->_startPoint = $startPoint;
    }

    /*
     * Setter
     * 
     * @param string End Point
     * @returns void
     */
    public function setEndPoint($endPoint) {
        $this->_endPoint = $endPoint;
    }

    /*
     * Setter
     * 
     * @param string Seat Number
     * @returns void
     */
    public function setSeatNumber($seatNumber) {
        $this->_seatNumber = $seatNumber;
    }

    /*
     * Setter
     * 
     * @param string Means of Transport
     * @returns void
     */
    public function setMeansOfTransport($meansOfTransport) {
        $this->_meansOfTransport = $meansOfTransport;
    }
}
