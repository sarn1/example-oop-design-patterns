<?php

/*
https://sourcemaking.com/design_patterns/factory_method/php/1

In the Factory Method Pattern, a factory method defines what functions must be available in the non-abstract or concrete factory. These functions must be able to create objects that are extensions of a specific class. Which exact subclass is created will depend on the value of a parameter passed to the function.

In this example we have a factory method, AbstractFactoryMethod, that specifies the function,  makePHPBook($param).

The concrete class OReillyFactoryMethod factory extends AbstractFactoryMethod, and can create the correct the extension of the AbstractPHPBook class for a given value of $param.
*/

abstract class AbstractFactoryMethod {
    abstract function makePHPBook($param);
}

class OReillyFactoryMethod extends AbstractFactoryMethod {
    private $context = "OReilly";  
    function makePHPBook($param) {
    $book = NULL;   
        switch ($param) {
            case "us":
                $book = new OReillyPHPBook;
            break;
            case "other":
                $book = new SamsPHPBook;
            break;
            default:
                $book = new OReillyPHPBook;
            break;        
        }     
    return $book;
    }
}

class SamsFactoryMethod extends AbstractFactoryMethod {
    private $context = "Sams";
    function makePHPBook($param) {
        $book = NULL;
        switch ($param) {
            case "us":
                $book = new SamsPHPBook;
            break;      
            case "other":
                $book = new OReillyPHPBook;
            break;
            case "otherother":
                $book = new VisualQuickstartPHPBook;
            break;
            default:
                $book = new SamsPHPBook;
            break;    
        }     
        return $book;
    }
}

abstract class AbstractBook {
    abstract function getAuthor();
    abstract function getTitle();
}

abstract class AbstractPHPBook {
    private $subject = "PHP";
}

class OReillyPHPBook extends AbstractPHPBook {
    private $author;
    private $title;
    private static $oddOrEven = 'odd';
    function __construct() {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title  = 'Programming PHP';
            self::$oddOrEven = 'even';
        } else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title  = 'PHP Cookbook'; 
            self::$oddOrEven = 'odd';
        }  
    }
    function getAuthor() {return $this->author;}
    function getTitle() {return $this->title;}
}

class SamsPHPBook extends AbstractPHPBook {
    private $author;
    private $title;
    function __construct() {
        //alternate randomly between 2 books
        mt_srand((double)microtime()*10000000);
        $rand_num = mt_rand(0,1);      
 
        if (1 > $rand_num) {
            $this->author = 'George Schlossnagle';
            $this->title  = 'Advanced PHP Programming';
        } else {
            $this->author = 'Christian Wenz';
            $this->title  = 'PHP Phrasebook'; 
        }  
    }
    function getAuthor() {return $this->author;}
    function getTitle() {return $this->title;}
}

class VisualQuickstartPHPBook extends AbstractPHPBook {
    private $author;
    private $title;
    function __construct() {
      $this->author = 'Larry Ullman';
      $this->title  = 'PHP for the World Wide Web';
    }
    function getAuthor() {return $this->author;}
    function getTitle() {return $this->title;}
}

  writeln('START TESTING FACTORY METHOD PATTERN');
  writeln('');

  writeln('testing OReillyFactoryMethod');
  $factoryMethodInstance = new OReillyFactoryMethod;
  testFactoryMethod($factoryMethodInstance);
  writeln('');

  writeln('testing SamsFactoryMethod');
  $factoryMethodInstance = new SamsFactoryMethod;
  testFactoryMethod($factoryMethodInstance);
  writeln('');

  writeln('END TESTING FACTORY METHOD PATTERN');
  writeln('');

  function testFactoryMethod($factoryMethodInstance) {
    $phpUs = $factoryMethodInstance->makePHPBook("us");
    writeln('us php Author: '.$phpUs->getAuthor());
    writeln('us php Title: '.$phpUs->getTitle());

    $phpUs = $factoryMethodInstance->makePHPBook("other");
    writeln('other php Author: '.$phpUs->getAuthor());
    writeln('other php Title: '.$phpUs->getTitle());
 
    $phpUs = $factoryMethodInstance->makePHPBook("otherother");
    writeln('otherother php Author: '.$phpUs->getAuthor());
    writeln('otherother php Title: '.$phpUs->getTitle());
  }

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
?>
Output

START TESTING FACTORY METHOD PATTERN

testing OReillyFactoryMethod
us php Author: Rasmus Lerdorf and Kevin Tatroe
us php Title: Programming PHP
other php Author: George Schlossnagle
other php Title: Advanced PHP Programming
otherother php Author: David Sklar and Adam Trachtenberg
otherother php Title: PHP Cookbook


testing SamsFactoryMethod
us php Author: Christian Wenz
us php Title: PHP Phrasebook
other php Author: Rasmus Lerdorf and Kevin Tatroe
other php Title: Programming PHP
otherother php Author: Larry Ullman
otherother php Title: PHP for the World Wide Web


END TESTING FACTORY METHOD PATTERN