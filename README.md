# PHP for Beginners Course Notes

## Episode 01 - How to Choose a Programming Language

- **Your first programming language matters less than learning core programming fundamentals because concepts such as variables, loops, and conditionals transfer to other languages.**
  ```php
  $orders = [
      ['id' => 101, 'status' => 'paid'],
      ['id' => 102, 'status' => 'pending'],
  ];

  foreach ($orders as $order) {
      if ($order['status'] === 'paid') {
          echo "Ship order #{$order['id']}" . PHP_EOL;
      }
  }
  ```

> **Takeaway:** Choose a language and start learning; once the fundamentals click, learning another language becomes much easier.

## Episode 02 - Tools of the Trade

- **Choose an editor you can work comfortably in; Visual Studio Code and Sublime Text are both suitable options.**
  ```text
  Visual Studio Code
  Sublime Text
  ```

- **A terminal only needs to support basic navigation, file listing, and running commands for this course.**
  ```bash
  cd ~/Desktop
  ls
  ```

- **On macOS or Linux, Homebrew provides a straightforward way to install PHP and MySQL.**
  ```bash
  brew install php
  brew install mysql
  ```

- **Use `php -v` to confirm PHP is installed; the recording used PHP 8.1.4, but package managers may install a newer version.**
  ```bash
  php -v
  # Recording example: PHP 8.1.4
  ```

- **On Windows, Laragon is a beginner-friendly all-in-one environment, while WSL2 is better suited to people already familiar with it.**
  ```text
  Windows recommendation: Laragon
  Alternative: WSL2
  ```

- **Docker, XAMPP, and MAMP are valid alternatives, but choose one local environment rather than combining several.**
  ```text
  Choose one: Laragon, WSL2, Docker, XAMPP, or MAMP
  ```

> **Takeaway:** Pick a comfortable editor and one local environment that lets you run PHP and MySQL; the specific tool matters less than getting started.

## Episode 03 - Your First PHP Tag

- **Choose the project directory based on your PHP environment; Homebrew can serve from anywhere, while MAMP may require its configured document root.**
  ```text
  Homebrew: ~/websites/demo
  MAMP: use the directory specified by MAMP
  ```

- **Create a folder for your sites and a separate folder for each project.**
  ```bash
  mkdir websites
  cd websites
  mkdir demo
  cd demo
  ```

- **Use `index.html` as the default entry file for a static page at the site root.**
  ```text
  demo/
    index.html
  ```

- **Use PHP's built-in server when your environment does not already provide Apache or Nginx.**
  ```bash
  php -S localhost:8888
  ```

- **Rename the entry file to `index.php` when the page needs PHP; existing HTML still renders normally.**
  ```text
  index.html -> index.php
  ```

- **Write PHP inside `<?php ... ?>` blocks rather than placing raw text inside the block.**
  ```php
  <?php
  echo 'Hello, world';
  ?>
  ```

- **Use `echo` to print a string into the page, and end the statement with a semicolon.**
  ```php
  <h1><?php echo 'Hello, world'; ?></h1>
  <p><?php echo 'Hello, universe'; ?></p>
  ```

> **Takeaway:** PHP turns a static HTML page into a dynamic page by letting you generate output inside PHP blocks.

## Episode 04 - Variables

- **Use `<?php ... ?>` blocks to mix PHP with HTML in the same document.**
  ```php
  <h1><?php echo 'Hello, world'; ?></h1>
  ```

- **Use `echo` to display a string, and end each PHP statement with a semicolon.**
  ```php
  <?php
  echo 'Hello, universe';
  ?>
  ```

- **Use `.` to concatenate strings in PHP; `+` is not the string concatenation operator.**
  ```php
  echo 'Hello, ' . 'universe';
  ```

- **Create a variable with a `$`-prefixed name and assign it a value with `=`.**
  ```php
  $greeting = 'Hello';
  echo $greeting . ' everybody';
  ```

- **Use variables when values may come from application data or later processing, so the same output code can handle different values.**
  ```php
  $user = ['name' => 'Taylor', 'greeting' => 'Hello'];

  echo $user['greeting'] . ' ' . $user['name'];
  ```

- **Refactoring changes the code without changing the result shown to the user.**
  ```php
  // Before
  echo $greeting . ' everybody';

  // After
  echo "$greeting everybody";
  ```

- **Double-quoted strings interpolate variables, while single-quoted strings treat them as literal text.**
  ```php
  $name = 'Taylor';

  echo "Hello, $name"; // Hello, Taylor
  echo 'Hello, $name'; // Hello, $name
  ```

> **Takeaway:** Variables let PHP produce dynamic output while keeping the surrounding HTML and output logic reusable.

## Episode 05 - Conditionals and Booleans

- **Use a Boolean value, `true` or `false`, for a yes-or-no state such as whether a user has read a book.**
  ```php
  $name = 'Dark Matter';
  $read = true;
  ```

- **Use an `if` statement to run code only when its condition evaluates to `true`.**
  ```php
  if ($read) {
      $message = "You have read $name.";
  }
  ```

- **Use `else` for the false path and assign the result in both branches so the output variable is always defined.**
  ```php
  if ($read) {
      $message = "You have read $name.";
  } else {
      $message = "You have not read $name.";
  }
  ```

- **Use `<?= ... ?>` as shorthand for echoing a value directly into HTML; the closing tag makes the semicolon optional.**
  ```php
  <p><?= $message ?></p>
  ```

- **Remove a conditional and its unreachable branch when a flag is hard-coded to a constant value such as `true`.**
  ```php
  // Before
  if ($read) {
      $message = "You have read $name.";
  } else {
      $message = "You have not read $name.";
  }

  // After
  $message = "You have read $name.";
  ```

> **Takeaway:** Booleans and conditionals let PHP choose dynamic behavior, while handling both branches keeps the resulting output reliable.

## Episode 06 - Arrays

- **Use an array with `[]` to store a collection of related values in one variable.**
  ```php
  $books = [
      'The Martian',
      'The Langoliers',
      'Project Hail Mary',
  ];
  ```

- **Use `foreach` to run the same logic once for every item in an array.**
  ```php
  foreach ($books as $book) {
      echo '<li>' . $book . '</li>';
  }
  ```

- **Use braces around an interpolated variable when text follows it immediately.**
  ```php
  echo "{$book} - recommended";
  ```

- **Use the alternative `foreach` syntax when the loop contains a larger HTML fragment.**
  ```php
  <ul>
      <?php foreach ($books as $book): ?>
          <li><?php echo $book; ?></li>
      <?php endforeach; ?>
  </ul>
  ```

- **Use `<?= ... ?>` as the concise way to echo a value inside HTML.**
  ```php
  <li><?= $book ?></li>
  ```

> **Takeaway:** Arrays group related values, and `foreach` lets you process each item while keeping generated HTML readable.

## Episode 07 - Associative Arrays

- **Use zero-based indexes to access individual items in a numeric array; index `1` returns the second item.**
  ```php
  $books = [
      'The Martian',
      'The Langoliers',
      'Project Hail Mary',
  ];

  echo $books[1]; // The Langoliers
  ```

- **Use an associative array to give each value a descriptive key with the `=>` operator.**
  ```php
  $books = [
      [
          'name' => 'The Langoliers',
          'author' => 'Stephen King',
          'purchase_url' => 'https://example.com/books/the-langoliers',
      ],
  ];
  ```

- **Access an associative-array value by its key instead of relying on its numeric position.**
  ```php
  echo $books[0]['purchase_url'];
  ```

- **When looping over an array of associative arrays, each item is an array, so access the field you want by key.**
  ```php
  foreach ($books as $book) {
      echo $book['name'];
  }
  ```

> **Takeaway:** Associative arrays make structured data easier to understand and retrieve because each value has a meaningful key.

## Episode 08 - Functions and Filtering

- **Use `=` to assign a value and `===` to compare values in a condition.**
  ```php
  $author = 'Andy Weir';

  if ($book['author'] === $author) {
      echo $book['name'];
  }
  ```

- **Define a function to isolate reusable behavior; its body runs when called, and `return` sends a result back.**
  ```php
  function bookLabel($book)
  {
      return $book['name'] . ' by ' . $book['author'];
  }

  echo bookLabel($book);
  ```

- **Build a filtered collection by checking each item and appending only matching items to a new array.**
  ```php
  function filterByAuthor($books, $author)
  {
      $filteredBooks = [];

      foreach ($books as $book) {
          if ($book['author'] === $author) {
              $filteredBooks[] = $book;
          }
      }

      return $filteredBooks;
  }
  ```

- **Pass values as arguments so the same filter can work for any author instead of using a hard-coded name.**
  ```php
  foreach (filterByAuthor($books, 'Andy Weir') as $book) {
      echo $book['name'];
  }
  ```

> **Takeaway:** Functions make reusable behavior easier to call, and filtering lets you return only the data that matches a condition.

## Episode 09 - Lambda Functions

- **Refactor duplicated filters when only the comparison changes; one generic filter is easier to extend.**
  ```php
  // Before: the loop would be duplicated.
  $booksByAuthor = filterByAuthor($books, 'Andy Weir');
  $booksByYear = filterByYear($books, 1968);

  // After: one filter accepts the field and value.
  $booksByAuthor = filter($books, 'author', 'Andy Weir');
  $booksByYear = filter($books, 'releaseYear', 1968);
  ```

- **Extract a function's returned array into a variable when that makes the value being iterated easier to understand.**
  ```php
  $filteredBooks = filterByAuthor($books, 'Andy Weir');

  foreach ($filteredBooks as $book) {
      echo $book['name'];
  }
  ```

- **An anonymous function, also called a lambda function, has no name and can be stored in a variable.**
  ```php
  $matchesAuthor = function ($book) {
      return $book['author'] === 'Andy Weir';
  };

  if ($matchesAuthor($book)) {
      echo $book['name'];
  }
  ```

- **Make a filter generic by accepting the collection, the key, and the value that the key should match.**
  ```php
  function filter($items, $key, $value)
  {
      $filteredItems = [];

      foreach ($items as $item) {
          if ($item[$key] === $value) {
              $filteredItems[] = $item;
          }
      }

      return $filteredItems;
  }

  $booksByAuthor = filter($books, 'author', 'Andy Weir');
  ```

- **Pass a callback when the caller needs to control how each item is accepted, such as using a range comparison instead of equality.**
  ```php
  function filter($items, $fn)
  {
      $filteredItems = [];

      foreach ($items as $item) {
          if ($fn($item)) {
              $filteredItems[] = $item;
          }
      }

      return $filteredItems;
  }

  $recentBooks = filter($books, function ($book) {
      return $book['releaseYear'] >= 2000;
  });
  ```

- **Use PHP's `array_filter()` when its built-in callback-based filtering already solves the problem.**
  ```php
  $booksByAuthor = array_filter($books, function ($book) {
      return $book['author'] === 'Andy Weir';
  });
  ```

> **Takeaway:** Anonymous functions let callers provide filtering rules, so one generic filter can handle many kinds of comparisons.

## Episode 10 - Separate Logic From the Template

- **Separate data preparation from HTML rendering because a file that handles both can become difficult to read and maintain.**
  ```text
  Before: index.php contains data logic and HTML.
  After:  index.php prepares data; index.view.php renders it.
  ```

- **Keep `index.php` focused on preparing data and requiring the view; a PHP-only file does not need a closing tag.**
  ```php
  <?php

  $filteredBooks = array_filter($books, function ($book) {
      return $book['author'] === 'Andy Weir';
  });

  require 'index.view.php';
  ```

- **Keep `index.view.php` effectively dumb by using prepared variables only to render the page.**
  ```php
  <ul>
      <?php foreach ($filteredBooks as $book): ?>
          <li><?= $book['name'] ?></li>
      <?php endforeach; ?>
  </ul>
  ```

> **Takeaway:** Separating PHP logic from the view makes both data processing and presentation easier to understand and change.

## Episode 11 - Technical Check-in #1 (With Exam)

- **Define PHP variables with a `$`-prefixed name, assign values with `=`, and end statements with `;`.**
  ```php
  $businessName = 'Lerikas';
  $monthlyCost = 15;
  ```

- **Use an associative array when related attributes belong together, then access each value by its key.**
  ```php
  $business = [
      'name' => 'Lerikas',
      'monthlyCost' => 15,
      'categories' => ['Testing', 'PHP training', 'JavaScript training'],
  ];

  echo $business['name'];
  ```

- **Use an `if` statement to change behavior when a value crosses a threshold.**
  ```php
  if ($business['monthlyCost'] > 99) {
      echo 'Not interested.';
  }
  ```

- **Use `foreach` to process every value in a collection, such as the categories a business offers.**
  ```php
  foreach ($business['categories'] as $category) {
      echo $category . '<br>';
  }
  ```

- **Use a function to group the steps for a reusable action such as registering a user.**
  ```php
  function register($user)
  {
      // Save the user, sign them in, and send a welcome email.
  }
  ```

- **Use `require` or `include` to keep data preparation and application logic separate from the view that renders it.**
  ```php
  <?php
  $business = [
      'name' => 'Lerikas',
      'categories' => ['Testing', 'PHP training', 'JavaScript training'],
  ];

  function register($user)
  {
      // Registration logic belongs here.
  }

  require 'index.view.php';
  ```

- **Render prepared variables in the view with short echo tags and alternative `foreach` syntax.**
  ```php
  <h1><?= $business['name'] ?></h1>
  <ul>
      <?php foreach ($business['categories'] as $category): ?>
          <li><?= $category ?></li>
      <?php endforeach; ?>
  </ul>
  ```

- **Complete the quiz before moving to Section 2 to check your understanding of the chapter fundamentals.**
  ```text
  Section 1 -> Technical Check-in #1 quiz -> Section 2
  ```

> **Takeaway:** PHP fundamentals work together: prepare data, apply conditions or loops, package behavior in functions, and render the result through a separate view.

## Episode 12 - Page Links

- **Start Section 2 with an existing HTML boilerplate so you can focus on building a PHP and MySQL website instead of styling from scratch.**
  ```text
  Section 2 project: PHP + MySQL website
  Starting point: existing HTML boilerplate
  ```

- **Import Tailwind CSS and add `h-full` to the `html` and `body` elements when the page needs a full-height layout.**
  ```html
  <html class="h-full">
  <head>
      <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="h-full">
  ```

- **Use explicit PHP file paths in navigation until routing can map clean URLs such as `/about` to a page.**
  ```html
  <nav>
      <a href="/">Home</a>
      <a href="/about.php">About Us</a>
      <a href="/contact.php">Contact</a>
  </nav>
  ```

- **Create a page entry file that requires its matching view so each page can keep its HTML in a separate template.**
  ```php
  <?php

  require 'about.view.php';
  ```

- **Create the contact page with the same entry-file and view pattern used for the about page.**
  ```php
  <?php

  require 'contact.view.php';
  ```

- **Update copied views with page-specific content so the URL and heading identify the same page.**
  ```php
  <!-- about.view.php -->
  <h1>About Us</h1>
  ```

- **The built-in PHP server uses `index.php` as the default entry point when a request does not resolve to a specific page.**
  ```text
  /            -> index.php
  /about.php   -> about.php
  /about       -> index.php (until routing is added)
  ```

- **Duplicating navigation across every view makes site-wide changes expensive, so shared markup should be extracted as more pages are added.**
  ```text
  index.view.php   -> copied navigation
  about.view.php   -> copied navigation
  contact.view.php -> copied navigation
  ```

> **Takeaway:** Building multiple PHP pages exposes the need for routing and reusable views before duplicated HTML becomes difficult to maintain.

## Episode 13 - PHP Partials

- **Keep view templates in a dedicated `views/` directory so the project root does not become crowded with page markup.**
  ```php
  <?php

  require 'views/about.view.php';
  ```

- **Use a `views/partials/` directory for reusable pieces of HTML shared by multiple views.**
  ```text
  views/
    about.view.php
    contact.view.php
    partials/
      nav.php
      head.php
      banner.php
      footer.php
  ```

- **Replace copied navigation markup with a required `nav.php` partial so site-wide link changes happen in one place.**
  ```php
  <!-- In every view, instead of duplicating the full navigation. -->
  <?php require 'partials/nav.php'; ?>
  ```

- **Extract repeated document sections into `head.php` and `footer.php` so views contain mostly page-specific content.**
  ```php
  <?php require 'partials/head.php'; ?>

  <main>
      <!-- Page-specific content. -->
  </main>

  <?php require 'partials/footer.php'; ?>
  ```

- **Extract the shared banner markup into `banner.php`, but keep page-specific text out of the partial.**
  ```php
  <?php require 'partials/banner.php'; ?>
  ```

- **Treat each page entry file as a controller-like layer that prepares variables before requiring its corresponding view.**
  ```php
  <?php

  $heading = 'About Us';
  require 'views/about.view.php';
  ```

- **Define the heading in each page file and read it in the banner partial so one shared template can render different pages.**
  ```php
  <?php

  // about.php
  $heading = 'About Us';
  require 'views/about.view.php';
  ?>

  <!-- views/partials/banner.php -->
  <h1><?= $heading ?></h1>
  ```

> **Takeaway:** Partials eliminate duplicated HTML, while page entry files provide the dynamic values that shared views need.

## Episode 14 - Superglobals and Current Page Styling

- **Use `echo` for strings, and use `var_dump()` when you need to inspect an array or object.**
  ```php
  $value = ['message' => 'Debugging output'];

  echo $value; // Warning: Array to string conversion
  var_dump($value);
  ```

- **Use the `$_SERVER` superglobal to access request and server information from any script.**
  ```php
  var_dump($_SERVER);
  ```

- **Read `$_SERVER['REQUEST_URI']` to inspect the current request URI, such as `/` or `/about`.**
  ```php
  echo $_SERVER['REQUEST_URI'];
  ```

- **Wrap complex debug output in `<pre>` tags to preserve its formatting.**
  ```php
  echo '<pre>';
  var_dump($_SERVER);
  echo '</pre>';
  ```

- **Call `die()` after a debug dump when you need to stop the rest of the page from executing.**
  ```php
  var_dump($value);
  die();
  ```

- **Create a `dd()` helper to combine formatted dumping and execution termination.**
  ```php
  function dd($value): void
  {
      echo '<pre>';
      var_dump($value);
      echo '</pre>';
      die();
  }

  dd($_SERVER);
  ```

- **Replace hardcoded active classes with a ternary condition so only the current page is highlighted.**
  ```php
  <!-- Before: every visit uses the active classes. -->
  <a href="/" class="bg-gray-900 text-white">Home</a>

  <!-- After: the classes depend on the current URI. -->
  <a href="/"
     class="<?= $_SERVER['REQUEST_URI'] === '/' ? 'bg-gray-900 text-white' : 'text-gray-300' ?>">
      Home
  </a>
  ```

- **Extract the URI comparison into a reusable `urlIs()` helper so navigation markup stays readable.**
  ```php
  <?php

  function urlIs($value): bool
  {
      return $_SERVER['REQUEST_URI'] === $value;
  }

  ?>
  <a href="/about"
     class="<?= urlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>">
      About
  </a>
  ```

- **Keep shared helper definitions in one `functions.php` file and load it before rendering pages to avoid duplication.**
  ```php
  <?php

  require 'functions.php';
  require 'views/index.view.php';
  ```

> **Takeaway:** Superglobals reveal the current request, while shared debugging and URL helpers keep dynamic navigation styling concise and reusable.

## Episode 15 - Make a PHP Router

- **Use a single entry point to centralize URL-to-controller mapping instead of exposing each controller as a public file path.**
  ```text
  /about -> index.php -> controllers/about.php
  ```

- **Load shared helpers before controllers and remove duplicate helper imports so functions are not declared twice.**
  ```php
  // index.php
  require 'functions.php';
  require 'controllers/about.php'; // The controller does not require functions.php again.
  ```

- **Extract only the path from `$_SERVER['REQUEST_URI']` so query strings do not break route matching.**
  ```php
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  // /contact?name=Taylor becomes /contact
  ```

- **Represent routes as an associative array so each clean URI maps directly to a controller.**
  ```php
  $routes = [
      '/' => 'controllers/index.php',
      '/about' => 'controllers/about.php',
      '/contact' => 'controllers/contact.php',
  ];
  ```

- **Use `array_key_exists()` to dispatch only when the requested URI has a registered route.**
  ```php
  if (array_key_exists($uri, $routes)) {
      require $routes[$uri];
  }
  ```

- **Return an HTTP 404 response and render a dedicated view when no route matches instead of showing a blank page.**
  ```php
  http_response_code(404);
  require 'views/404.php';
  die();
  ```

- **Keep the 404 view independent of page-specific partials when those partials require variables such as `$heading`.**
  ```php
  <!-- views/404.php -->
  <h1>Sorry, page not found.</h1>
  <a href="/">Go back home</a>
  ```

- **Wrap request termination in an `abort()` helper and default its status code to 404 while allowing overrides.**
  ```php
  function abort($code = 404)
  {
      http_response_code($code);
      require "views/{$code}.php";
      die();
  }
  ```

- **Move route selection into `routeToController()` and keep the bootstrap file small by extracting routing into `router.php`.**
  ```php
  // router.php
  function routeToController($uri, $routes)
  {
      if (!array_key_exists($uri, $routes)) {
          abort();
      }

      require $routes[$uri];
  }

  // index.php
  require 'functions.php';
  require 'router.php';
  ```

> **Takeaway:** A small router turns clean URLs into a centralized dispatch layer while keeping controllers, views, and bootstrap code separate.

## Episode 16 - Create a MySQL Database

- **Create the application database with `CREATE DATABASE`, and end SQL statements with a semicolon.**
  ```sql
  CREATE DATABASE myapp;
  ```

- **Connect a local MySQL client such as TablePlus with the host, port, and credentials used by the local server.**
  ```text
  Host: localhost
  Port: 3306
  User: root
  Password: none
  Database: myapp
  ```

- **Represent blog posts in a table and choose a column type that matches each value, such as `VARCHAR(255)` for a required title.**
  ```sql
  CREATE TABLE posts (
      id INT AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(255) NOT NULL
  );
  ```

- **Use a primary key as a unique row identifier, and let the auto-incrementing ID be generated when records are inserted.**
  ```sql
  INSERT INTO posts (title) VALUES
      ('My first blog post'),
      ('My second blog post');

  -- The generated IDs are 1 and 2.
  ```

- **Use relationships to connect records across tables, such as linking each post to the user who created it.**
  ```text
  users.id -> posts.user_id
  ```

- **Use `ALTER TABLE` to add fields when the initial schema needs more post data.**
  ```sql
  ALTER TABLE posts ADD body TEXT;
  ```

- **Use `UPDATE` with a `WHERE` clause to change one existing record without changing every row.**
  ```sql
  UPDATE posts SET title = 'Updated title' WHERE id = 1;
  ```

> **Takeaway:** A relational database stores structured records in tables, uses primary keys to identify rows, and connects related records across tables.

## Episode 17 - PDO First Steps

- **Use `SELECT` to choose columns from a table, and use `*` when you need every column.**
  ```sql
  SELECT * FROM posts;
  SELECT id, title FROM posts;
  ```

- **Add a `WHERE` clause when you need only rows matching a condition such as a post's primary key.**
  ```sql
  SELECT * FROM posts WHERE id = 1;
  ```

- **Instantiate a class with `new`, access object properties and methods with `->`, and use `$this` for the current instance.**
  ```php
  class Person
  {
      public $name;

      public function breathe()
      {
          echo $this->name . ' is breathing';
      }
  }

  $person = new Person();
  $person->name = 'John Doe';
  $person->breathe();
  ```

- **Build a PDO DSN with the MySQL driver, host, port, database, and character set, then pass the credentials to `new PDO`.**
  ```php
  $dsn = 'mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4';

  $pdo = new PDO($dsn, 'root', '');
  ```

- **Prepare a SQL statement before executing it so PDO can send the query to MySQL.**
  ```php
  $statement = $pdo->prepare('SELECT * FROM posts');
  $statement->execute();
  ```

- **Fetch all rows as associative arrays with `PDO::FETCH_ASSOC` so columns can be accessed by name without duplicate numeric keys.**
  ```php
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
  ```

- **Loop over the fetched rows to render database values in the page.**
  ```php
  foreach ($posts as $post) {
      echo '<li>' . $post['title'] . '</li>';
  }
  ```

> **Takeaway:** PDO turns a database query into a repeatable PHP flow: connect, prepare, execute, fetch, and render.

## Episode 18 - Extract a PHP Database Class

- **Use a `Database` class to group connection and query behavior, and name its SQL method `query()` because methods represent actions.**
  ```php
  class Database
  {
      public function query($query)
      {
          // Prepare and execute the SQL query here.
      }
  }

  $db = new Database();
  ```

- **Extract the existing PDO workflow into the class so the calling page no longer manages the connection and statement directly.**
  ```php
  // Before
  $statement = $pdo->prepare('SELECT * FROM posts');
  $statement->execute();
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

  // After
  $posts = $db->query('SELECT * FROM posts')
      ->fetchAll(PDO::FETCH_ASSOC);
  ```

- **Accept the SQL string as a `query()` argument so one database object can execute different queries.**
  ```php
  $posts = $db->query('SELECT * FROM posts WHERE id > 1')
      ->fetchAll(PDO::FETCH_ASSOC);

  $users = $db->query('SELECT * FROM users')
      ->fetchAll(PDO::FETCH_ASSOC);
  ```

- **Use `__construct()` for work that should happen automatically when `new Database()` creates an instance, such as initializing PDO.**
  ```php
  class Database
  {
      public function __construct()
      {
          $this->connection = new PDO(
              'mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4',
              'root',
              ''
          );
      }
  }
  ```

- **Store the PDO object on `$this->connection` so every method on the same instance can reuse the database connection.**
  ```php
  class Database
  {
      public $connection;

      public function query($query)
      {
          $statement = $this->connection->prepare($query);
          $statement->execute();

          return $statement;
      }
  }
  ```

- **Return the statement from `query()` instead of choosing a fetch mode inside the class so the caller controls the result shape.**
  ```php
  $post = $db->query('SELECT * FROM posts WHERE id = 1')
      ->fetch(PDO::FETCH_ASSOC);

  $posts = $db->query('SELECT * FROM posts')
      ->fetchAll(PDO::FETCH_ASSOC);
  ```

- **Move a class into a class-only `Database.php` file and require it before instantiating the class.**
  ```php
  // Database.php
  <?php
  class Database { /* ... */ }

  // index.php
  require 'Database.php';

  $db = new Database();
  ```

> **Takeaway:** A small `Database` abstraction centralizes connection and query setup while letting the caller choose the SQL and result shape.
