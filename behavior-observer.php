<?php

/*
https://sourcemaking.com/design_patterns/observer/php

In the Observer pattern a subject object will notify an observer object if the subject's state changes.

In this example, the PatternSubject is the subject, and the PatternObserver is the observer. For the observer to be notified of changes in the subject it must first be registered with the subject using the attach method. For the observer to no longer be notified of changes in the subject it must be unregistered with the detach method.

When the subject changes it calls the observer's update method with itself. The observer can then take the subject and use whatever methods have been made available for it to determine the subjects current state.

The Observer Pattern is often called Publish-Subscribe, where the subject would be the publisher, and the observer would be the subscriber.
*/

abstract class AbstractObserver {
    abstract function update(AbstractSubject $subject_in);
}

abstract class AbstractSubject {
    abstract function attach(AbstractObserver $observer_in);
    abstract function detach(AbstractObserver $observer_in);
    abstract function notify();
}

function writeln($line_in) {
    echo $line_in."<br/>";
}

class PatternObserver extends AbstractObserver {
    public function __construct() {
    }
    public function update(AbstractSubject $subject) {
      writeln('*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*');
      writeln(' new favorite patterns: '.$subject->getFavorites());
      writeln('*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*');      
    }
}

class PatternSubject extends AbstractSubject {
    private $favoritePatterns = NULL;
    private $observers = array();
    function __construct() {
    }
    function attach(AbstractObserver $observer_in) {
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
    function notify() {
      foreach($this->observers as $obs) {
        $obs->update($this);
      }
    }
    function updateFavorites($newFavorites) {
      $this->favorites = $newFavorites;
      $this->notify();
    }
    function getFavorites() {
      return $this->favorites;
    }
}

  writeln('BEGIN TESTING OBSERVER PATTERN');
  writeln('');

  $patternGossiper = new PatternSubject();
  $patternGossipFan = new PatternObserver();
  $patternGossiper->attach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract factory, decorator, visitor');
  $patternGossiper->updateFavorites('abstract factory, observer, decorator');
  $patternGossiper->detach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract factory, observer, paisley');

  writeln('END TESTING OBSERVER PATTERN');

?>
Output

BEGIN TESTING OBSERVER PATTERN

*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*
new favorite patterns: abstract factory, decorator, visitor
*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*

*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*
new favorite patterns: abstract factory, observer, decorator
*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*

END TESTING OBSERVER PATTERN