<?php
include_once 'AbstractSubject.php';
include_once 'fooditem.php';
class PatternSubject extends AbstractSubject {
    public $favoritePatterns = array();
    private $observers = array();
    function __construct() {

    }

    function attach(AbstractObserver $observer_in) { // gets observer and add it to observers array
      //could also use array_push($this->observers, $observer_in);
      $this->observers[] = $observer_in;
    }
    function detach(AbstractObserver $observer_in) {
      //$key = array_search($observer_in, $this->observers);
      foreach($this->observers as $okey => $oval) {
        if ($oval == $observer_in) { 
          unset($this->observers[$okey]);
        }
      }
    }
    function notify($item) {
        $count = 0;
       foreach($this->observers as $obs) {
         $obs->update($item,$this->favoritePatterns[$count]);
         $count = $count +1;
       }
    }
   
}
?>