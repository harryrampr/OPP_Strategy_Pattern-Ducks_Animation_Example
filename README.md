## Strategy Pattern (OOP) - Ducks Animation Example

We are sharing some simple PHP code, showing the use of
the [Strategy Pattern](https://en.wikipedia.org/wiki/Strategy_pattern). You will see how modern
versions of PHP, supporting Classes, Abstract Classes and Interfaces, make it easy to implement the Strategy Pattern
using this language.

### About It

The Strategy pattern is a behavioral design pattern
in [object-oriented programming](https://en.wikipedia.org/wiki/Object-oriented_programming) that enables selecting
different algorithms or strategies at runtime. It encapsulates each algorithm in separate classes and allows the client
to choose the appropriate algorithm dynamically. By decoupling the algorithm implementation from the client code, the
Strategy pattern promotes flexibility and enhances code reusability.

### History

The Strategy pattern has its roots in the field of software engineering and object-oriented programming. It was first
formally introduced as one of the 23 design patterns in the book ["Design Patterns: Elements of Reusable Object-Oriented
Software"](https://en.wikipedia.org/wiki/Design_Patterns) by Erich Gamma, Richard Helm, Ralph Johnson, and John
Vlissides, commonly known as the Gang of Four (GoF). Published in 1994, the book presented the Strategy pattern as a
solution to common design problems.

However, the concept of encapsulating algorithms or strategies and making them interchangeable predates the
formalization of the Strategy pattern. The core idea behind the pattern can be traced back to earlier software
engineering practices and principles, including modular design, separation of concerns, and object-oriented programming
principles.

The Strategy pattern was influenced by various other concepts and techniques, such
as [functional programming](https://en.wikipedia.org/wiki/Functional_programming), [dependency
inversion principle](https://en.wikipedia.org/wiki/Dependency_inversion_principle), and general principles of software
design. In functional programming, the idea of passing behavior as a function parameter or object is similar to the
Strategy pattern's approach of encapsulating algorithms in separate classes. The dependency inversion principle, which
promotes coding to abstractions, also aligns with the Strategy pattern's goal of decoupling the client code from
specific algorithm implementations.

### Intent

The intent of the Strategy pattern is to define a family of algorithms, encapsulate each one as a separate class, and
make them interchangeable at runtime. It enables the client to select an algorithm dynamically, depending on the
specific situation or requirements. The pattern provides a way to vary the behavior of an object by changing the
strategy class it uses, without modifying its structure or implementation.

### Structure

- **Context:** Represents the object that uses the strategy. It maintains a reference to the selected strategy object
  and delegates the algorithm execution to it.
- **Strategy:** Defines an interface or an abstract class for the algorithms or strategies. It encapsulates the behavior
  that can vary.
- **Concrete Strategies:** Implement the specific algorithms or strategies defined by the Strategy interface. Each
  concrete strategy provides a different implementation of the behavior encapsulated by the interface.

### How it Works

1. The Context object maintains a reference to the selected Strategy object.
2. The client sets or changes the strategy by providing a specific Concrete Strategy object to the Context.
3. The Context delegates the algorithm execution to the selected Strategy object, without needing to know the details of
   the algorithm's implementation.
4. At runtime, the client can switch the Strategy object in the Context, effectively changing the behavior of the
   Context.
5. The Context interacts with the Strategy object using the common interface defined by the Strategy class, ensuring
   interchangeability between different strategies.

### Benefits

- Promotes code reusability by encapsulating algorithms or strategies into separate classes.
- Enables dynamic selection of algorithms at runtime, providing flexibility and adaptability.
- Allows easy addition of new strategies without modifying existing code.
- Enhances code maintainability by separating the algorithmic logic from the client code.
- Supports the ["Open-Closed Principle"](https://en.wikipedia.org/wiki/Open%E2%80%93closed_principle) by allowing new
  strategies to be added without modifying existing code.
- Facilitates testing and debugging as strategies can be tested independently of the context.

### Applications

- **Sorting Algorithms:** The Strategy pattern is frequently used in sorting algorithms, where different sorting
  strategies such as bubble sort, merge sort, or quicksort can be encapsulated as separate strategies. The client can
  dynamically select the appropriate sorting strategy based on the input data or performance requirements.

- **File Compression:** File compression applications often employ the Strategy pattern to support multiple compression
  algorithms such as ZIP, RAR, or GZIP. Each compression algorithm is implemented as a separate strategy, and the client
  can choose the desired compression strategy at runtime.

- **Payment Processing:** Payment processing systems can utilize the Strategy pattern to handle different payment
  methods such as credit cards, PayPal, or bank transfers. Each payment method is implemented as a separate strategy,
  allowing the client to choose the desired payment strategy dynamically.

- **Image Processing:** Image processing applications can use the Strategy pattern to implement various image filters
  and transformations. Each filter or transformation, such as blurring, sharpening, or resizing, can be encapsulated as
  a separate strategy, and the client can apply different strategies based on the desired image processing effects.

- **Routing Algorithms:** Routing algorithms in networking or transportation systems can employ the Strategy pattern to
  implement different routing strategies. Each routing strategy, such as shortest path or least congested route, can be
  encapsulated as a separate strategy, and the client can select the appropriate strategy based on the current
  conditions.

- **AI and Game Development:** In AI systems and game development, the Strategy pattern can be used to implement
  different behaviors or strategies for characters or agents. Each behavior, such as aggressive, defensive, or
  cooperative, can be represented as a separate strategy, and the client can switch between strategies dynamically based
  on the game's logic or user interactions.

- **Data Validation:** Data validation frameworks can leverage the Strategy pattern to implement various validation
  rules and strategies. Each validation rule, such as email validation, length validation, or format validation, can be
  implemented as a separate strategy, and the client can apply different strategies to validate input data.

- **Logging:** Logging frameworks can use the Strategy pattern to implement different logging strategies, such as
  writing logs to a file, sending logs to a database, or outputting logs to the console. Each logging strategy can be
  encapsulated as a separate strategy, and the client can choose the desired logging strategy dynamically.

- **Text Processing:** Text processing applications can employ the Strategy pattern to implement different parsing or
  processing strategies. For example, a text processing system may have strategies for XML parsing, JSON parsing, or
  plain text processing, allowing the client to select the appropriate strategy based on the input data format.

- **Data Storage:** Data storage systems can use the Strategy pattern to support different storage strategies, such as
  relational databases, NoSQL databases, or file-based storage. Each storage strategy can be implemented as a separate
  strategy, and the client can choose the desired storage strategy based on the application's requirements.

### Other Examples

An example of the Strategy pattern is a sorting algorithm implementation. The Context class represents a sorting
algorithm execution context, while the Strategy interface defines the behavior for sorting. Concrete strategies
like "BubbleSort," "MergeSort," and "QuickSort" encapsulate different sorting algorithms. The client can dynamically
select and change the sorting strategy used by the Context at runtime, allowing for flexibility in sorting large
datasets. The Strategy pattern separates the sorting algorithm from the client code, making it easy to switch between
different strategies without modifying the Context.