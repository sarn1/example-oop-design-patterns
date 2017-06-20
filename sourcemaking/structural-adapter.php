<?php

/*
https://sourcemaking.com/design_patterns/adapter

In the Adapter Design Pattern, a class converts the interface of one class to be what 
another class expects.

In this example we have a SimpleBook class that has a getAuthor() and getTitle() methods. 
The client, expects a getAuthorAndTitle() method. To "adapt" SimpleBook for testAdapter we 
have an adapter class, BookAdapter, which takes in an instance of SimpleBook, and uses the  
SimpleBook getAuthor() and getTitle() methods in it's own getAuthorAndTitle() method.

Adapters are helpful if you want to use a class that doesn't have quite the exact methods you 
need, and you can't change the orignal class. The adapter can take the methods you can access 
in the original class, and adapt them into the methods you need.
*/

class SimpleBook {
    private $author;
    private $title;
    function __construct($author_in, $title_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}

class BookAdapter {
    private $book;
    function __construct(SimpleBook $book_in) {
        $this->book = $book_in;
    }
    function getAuthorAndTitle() {
        return $this->book->getTitle().' by '.$this->book->getAuthor();
    }
}

  // client

  writeln('BEGIN TESTING ADAPTER PATTERN');
  writeln('');

  $book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
  $bookAdapter = new BookAdapter($book);
  writeln('Author and Title: '.$bookAdapter->getAuthorAndTitle());
  writeln('');

  writeln('END TESTING ADAPTER PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>
Output

BEGIN TESTING ADAPTER PATTERN

Author and Title: Design Patterns by Gamma, Helm, Johnson, and Vlissides

END TESTING ADAPTER PATTERN