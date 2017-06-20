# OOP Design Patterns
Design patterns examples and notes from the following sites:
* [Source Making][sourcemaking url]
* [OODesign][oodesign url]
* [TreeHouse: Introduction to Design Patterns ][treehouse url]
* [Tuts+: PHP Design Patterns][tutsplus url]
* [Tuts+ Github OOD Page][tutsplusood url]

[sourcemaking url]: https://sourcemaking.com
[oodesign url]: http://www.oodesign.com/
[treehouse url]: https://teamtreehouse.com/library/introduction-to-design-patterns
[tutsplus url]: https://code.tutsplus.com/courses/php-design-patterns
[tutsplusood url]: https://github.com/tutsplus/php-design-patterns

### Other Notes
* Pattern design is not a magic bullet and will not solve all programming problems.
* A developer should NOT start with a pattern, instead reach for it only if you need it.
* In other words, always go for the simpliest solution first and use a design pattern if you need it.
* The benefit of the familiarity of design patterns allows shared vocabulary and allows one to communicate very specific and complex solutions with just a few words.
* MVC = complex pattern because it follows several design patterns.  (controller = mediator, view = composite, model = observer)
* Patterns allows framework authors to structure their code in a way that is predicatable and understandble by developers looking to integrate/extend their framework without the developer modifying the framework code.
* Patterns allow you to leverage "experence" re-use.  Simular to code re-use.  Patterns are tried and true ways for structuring and organizing code by those who've been there before.
* Patterns may take more time to develop, it creates more complexity, and may contain more files, but they allow for easier understanding/comprehension of the codebase, ease maintenance, and allow for easier adaptability and tweaking in a fast pace environment.
* When describing a design pattern:
    * pattern name
    * problem/intent = when to apply it, may contain list of conditions
    * solution/implementation = describe the design, relationship, responsibility, - contains diagrame, high-level
    * consequences = take more time, make more complexity, contains more files
* Don't worry too much about patterns or doing something "correctly" while writing your code.  That's the easiest and quickest way to bog you down to the point where you get no work done.  Instead, write the application so it runs. When it runs, then you can find spots to refactor to make it better.  Start small and find spots where you could apply a pattern.  When you do find a spot to clean up, applying patterns will become easier.