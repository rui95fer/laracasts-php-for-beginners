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

## Episode 19 - Environments and Configuration Flexibility

- **Pass the database username, password, and options separately from the PDO DSN so each part can change independently.**
  ```php
  $pdo = new PDO(
      $dsn,
      'root',
      '',
      [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]
  );
  ```

- **Use `ClassName::CONSTANT` to access a class constant; constants provide readable names for values that do not change.**
  ```php
  PDO::ATTR_DEFAULT_FETCH_MODE;
  PDO::FETCH_ASSOC;
  ```

- **Configure the default fetch mode once on PDO so callers do not repeat `PDO::FETCH_ASSOC` for every result.**
  ```php
  // Before
  $posts = $db->query('SELECT * FROM posts')
      ->fetchAll(PDO::FETCH_ASSOC);

  // After
  $posts = $db->query('SELECT * FROM posts')
      ->fetchAll();
  ```

- **Move environment-dependent connection values into a configuration array instead of hard-coding them inside `Database`.**
  ```php
  $config = [
      'host' => 'localhost',
      'port' => 3306,
      'database' => 'myapp',
      'charset' => 'utf8mb4',
  ];
  ```

- **Use `http_build_query()` to assemble the variable portion of a DSN while keeping the `mysql:` driver prefix explicit.**
  ```php
  $dsn = 'mysql:' . http_build_query([
      'host' => $config['host'],
      'port' => $config['port'],
      'dbname' => $config['database'],
      'charset' => $config['charset'],
  ], '', ';');
  ```

- **Accept the configuration and credentials in `Database` so the class can connect to different environments without changing its source code.**
  ```php
  class Database
  {
      public function __construct($config, $username = 'root', $password = '')
      {
          $dsn = 'mysql:' . http_build_query([
              'host' => $config['host'],
              'port' => $config['port'],
              'dbname' => $config['database'],
              'charset' => $config['charset'],
          ], '', ';');

          $this->connection = new PDO($dsn, $username, $password, [
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          ]);
      }
  }
  ```

- **Return configuration from a regular PHP file and capture the returned value when requiring it, allowing local and production files to provide different values.**
  ```php
  // config.php
  <?php
  return [
      'database' => [
          'host' => 'localhost',
          'port' => 3306,
          'database' => 'myapp',
          'charset' => 'utf8mb4',
      ],
  ];

  // index.php
  $config = require 'config.php';
  $db = new Database($config['database']);
  ```

> **Takeaway:** Push environment-specific values upward into configuration so database classes remain reusable and application settings have one central home.

## Episode 20 - SQL Injection Vulnerabilities Explained

- **Treat every query-string or form value as untrusted input because it can change the meaning of a SQL query.**
  ```php
  $id = $_GET['id'];
  ```

- **An `OR` clause broadens a `WHERE` condition and can return records beyond the intended match.**
  ```sql
  SELECT * FROM users WHERE id = 2 OR admin = 1;
  ```

- **Never inline user input into SQL because an attacker can add SQL syntax to the query.**
  ```php
  // Unsafe
  $query = "SELECT * FROM posts WHERE id = {$_GET['id']}";
  ```

- **An injected value can append an unintended destructive statement such as dropping a table.**
  ```text
  /note?id=1; DROP TABLE users;
  ```

- **Use a placeholder in the SQL and bind the user value when executing the prepared statement.**
  ```php
  $post = $db->query('SELECT * FROM posts WHERE id = ?', [
      $_GET['id'],
  ])->fetch();
  ```

- **Let `Database::query()` accept a parameter array and pass it to `execute()` so callers consistently use bound parameters.**
  ```php
  public function query($query, $params = [])
  {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);

      return $statement;
  }
  ```

- **Prepared statements keep SQL and values separate, so injection text is treated as data instead of executable SQL.**
  ```text
  SQL:    SELECT * FROM posts WHERE id = ?
  Params: ["1; DROP TABLE users;"]
  Result: users table remains intact
  ```

> **Takeaway:** Never inline user input into SQL; use prepared statements with bound parameters to keep malicious text from becoming executable SQL.

## Episode 21 - Database Tables and Indexes

- **Name tables using plural nouns and choose column types that fit the expected data, such as `TEXT` for unbounded note content.**
  ```sql
  CREATE TABLE notes (
      id INT AUTO_INCREMENT PRIMARY KEY,
      body TEXT NOT NULL
  );
  ```

- **Store user accounts in a dedicated `users` table with a primary key and required fields for identity.**
  ```sql
  CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL
  );
  ```

- **Add a unique index to columns such as `email` to enforce uniqueness at the database level and prevent duplicate entries.**
  ```sql
  ALTER TABLE users ADD UNIQUE (email);
  ```

- **Add a foreign key column whose data type matches the referenced table's primary key, and set it to `NOT NULL` when child records must have an owner.**
  ```sql
  ALTER TABLE notes ADD user_id INT NOT NULL;
  ```

- **Define a foreign key constraint to link the child column to the parent table and prevent orphan records pointing to non-existent rows.**
  ```sql
  ALTER TABLE notes
  ADD CONSTRAINT fk_notes_users
  FOREIGN KEY (user_id) REFERENCES users(id);
  ```

- **Configure `ON DELETE CASCADE` on foreign key constraints so deleting a parent record automatically cleans up its dependent records.**
  ```sql
  ALTER TABLE notes
  ADD CONSTRAINT fk_notes_users
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;

  -- Deleting a user automatically removes all of their notes.
  DELETE FROM users WHERE id = 1;
  ```

> **Takeaway:** Database indexes and foreign key constraints enforce business rules and relational integrity directly at the storage level.

## Episode 22 - Render the Notes and Note Page

- **Filter notes by their owner's `user_id` so the query returns only that user's records.**
  ```sql
  SELECT * FROM notes WHERE user_id = 1;
  -- Change 1 to 2 to select another user's notes.
  ```

- **A request flows from route to controller to view: the route selects the controller, the controller prepares data, and the view renders it.**
  ```text
  GET /notes
      -> router -> notes controller -> notes view
  ```

- **Register the notes endpoint and add a navigation link so users can reach the page.**
  ```php
  // routes.php
  $router->get('/notes', 'notes.php');

  // views/partials/nav.php
  <a href="/notes">Notes</a>
  ```

- **Create shared dependencies before dispatching requests so a controller can use the database connection.**
  ```php
  $db = new Database($config['database']);
  require 'router.php';
  ```

- **Let the controller fetch the relevant notes and require the view that will present them.**
  ```php
  $notes = $db->query(
      'SELECT * FROM notes WHERE user_id = 1'
  )->fetchAll();

  require 'notes.view.php';
  ```

- **Loop over the notes in the view and build each detail link from that note's ID.**
  ```php
  <ul>
      <?php foreach ($notes as $note): ?>
          <li>
              <a href="/note?id=<?= $note['id'] ?>">
                  <?= $note['body'] ?>
              </a>
          </li>
      <?php endforeach; ?>
  </ul>
  ```

- **Read the query-string ID, bind it to the SQL query, and fetch one record for the single-note page.**
  ```php
  $note = $db->query(
      'SELECT * FROM notes WHERE id = ?',
      [$_GET['id']]
  )->fetch();
  ```

- **Give the individual note its own view and provide a link back to the notes list.**
  ```php
  <p><?= $note['body'] ?></p>
  <a href="/notes">Go back</a>
  ```

> **Takeaway:** MVC connects clean URLs, controller-level data preparation, and views that render either a collection of notes or one note.

## Episode 23 - Introduction to Authorization

- **Authorization decides whether the current user may access a resource; until authentication is introduced, use a temporary ID to represent that user.**
  ```php
  $currentUserId = 1; // Temporary stand-in for the authenticated user.
  ```

- **Filtering a detail query by both owner and ID can block unauthorized access, but it makes a missing note indistinguishable from an unauthorized one.**
  ```sql
  -- First attempt: both cases return no row.
  SELECT * FROM notes WHERE user_id = ? AND id = ?;
  ```

- **Fetch the note by ID before checking ownership when the response should distinguish not found from forbidden.**
  ```php
  $note = $db->query(
      'SELECT * FROM notes WHERE id = ?',
      [$_GET['id']]
  )->fetch();
  ```

- **Return `404` when the note does not exist and `403` when it exists but belongs to another user.**
  ```php
  if (!$note) {
      abort(Response::NOT_FOUND);
  }

  if ($note['user_id'] !== $currentUserId) {
      abort(Response::FORBIDDEN);
  }
  ```

- **Create a dedicated `403` view that clearly explains that the user is not authorized to access the page.**
  ```php
  <!-- views/403.php -->
  <h1>Unauthorized</h1>
  <p>You are not authorized to view this page.</p>
  ```

- **Replace HTTP status magic numbers with named constants so their meaning is clear wherever they are used.**
  ```php
  class Response
  {
      const NOT_FOUND = 404;
      const FORBIDDEN = 403;
  }

  abort(Response::FORBIDDEN);
  ```

> **Takeaway:** Find the resource first, then authorize ownership, using `404` for absence and `403` for access denial.

## Episode 24 - Programming is Rewriting

- **Refactoring improves a working feature through small changes while preserving its externally visible behavior.**
  ```php
  // Before
  $note = $db->query(
      'SELECT * FROM notes WHERE id = :id',
      ['id' => $_GET['id']]
  )->fetch();

  if (!$note) {
      abort(Response::NOT_FOUND);
  }

  if ($note['user_id'] !== $currentUserId) {
      abort(Response::FORBIDDEN);
  }

  // After
  $note = $db->query(
      'SELECT * FROM notes WHERE id = :id',
      ['id' => $_GET['id']]
  )->findOrFail();

  authorize($note['user_id'] === $currentUserId);
  ```

- **Store the prepared statement on the `Database` object so other methods can use the result of the latest query.**
  ```php
  public ?PDOStatement $statement = null;

  $this->statement = $this->connection->prepare($query);
  $this->statement->execute($params);
  ```

- **Return `$this` from `query()` when the database class should provide its own fluent helper methods.**
  ```php
  public function query($query, $params = []): Database
  {
      $this->statement = $this->connection->prepare($query);
      $this->statement->execute($params);

      return $this;
  }
  ```

- **Wrap `PDOStatement::fetch()` in an application-owned `find()` method so callers use language that describes the operation.**
  ```php
  public function find()
  {
      return $this->statement->fetch();
  }

  // The caller now uses the database API instead of PDO directly.
  $note = $db->query($query, $params)->find();
  ```

- **Use `findOrFail()` to centralize the common not-found check and return a `404` when no record exists.**
  ```php
  public function findOrFail(): ?array
  {
      $result = $this->find();

      if (!$result) {
          abort(Response::NOT_FOUND);
      }

      return $result;
  }
  ```

- **Use an `authorize()` helper to express ownership checks directly and abort with `403` when the condition is false.**
  ```php
  function authorize($condition, $status = Response::FORBIDDEN): bool
  {
      if (!$condition) {
          abort($status);
      }

      return true;
  }

  authorize($note['user_id'] === $currentUserId);
  ```

- **Expose a concise `get()` method for fetching all rows so controllers do not depend on PDO's `fetchAll()` name.**
  ```php
  // Before
  $notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->fetchAll();

  // After
  $notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->get();
  ```

> **Takeaway:** Programming is rewriting: once code works, keep refining it into meaningful, reusable abstractions without changing its behavior.

## Episode 25 - Intro to Forms and Request Methods

- **Link to `/notes/create` from the notes index so users can reach the page for creating a note.**
  ```php
  <p class="mt-4">
      <a href="/notes/create" class="text-blue-500 hover:underline">Create a new note</a>
  </p>
  ```

- **Keep route declarations in `routes.php` so the entry point does not become a list of route details.**
  ```php
  // routes.php
  $router->get('/notes/create', 'notes/create.php');
  $router->post('/notes', 'notes/store.php');

  // public/index.php
  $router = new Router();
  require base_path('routes.php');
  ```

- **Use resource-oriented URIs so the path communicates whether a request lists notes, shows one note, or displays the create form.**
  ```text
  GET /notes        -> list notes
  GET /note?id=1    -> show note 1 in the simple router
  GET /notes/create -> display the create form
  ```

- **Give every form control a `name` because only named controls are included in submitted form data.**
  ```php
  <textarea id="body" name="body"></textarea>
  ```

- **Point a label's `for` attribute at the control's `id`, not its `name`, to associate the label with the correct field.**
  ```php
  <label for="body">Body</label>
  <textarea id="body" name="body"></textarea>
  ```

- **A form uses GET by default, placing named fields in the query string; use it for safe, repeatable reads.**
  ```text
  <form action="/notes/create">
      <textarea name="body"></textarea>
  </form>

  GET /notes/create?body=Some+new+note
  ```

- **Use POST for actions that create or change data because repeating a POST submission can create multiple records.**
  ```php
  <form method="POST">
      <textarea id="body" name="body"></textarea>
      <button type="submit">Create Note</button>
  </form>
  ```

- **Use `action` to send a form to the endpoint that handles it; without `action`, the form submits to the current URL.**
  ```php
  <form method="POST" action="/notes">
      <textarea id="body" name="body"></textarea>
      <button type="submit">Create Note</button>
  </form>
  ```

- **Inspect `$_SERVER['REQUEST_METHOD']` to distinguish the initial GET request from a POST form submission.**
  ```php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'You submitted the form.';
  }
  ```

- **Read submitted values from the `$_POST` superglobal using the control's `name` as the key.**
  ```php
  $body = $_POST['body'] ?? '';
  ```

- **Enable Tailwind's `forms` plugin through the CDN when the default controls need the course's styled appearance.**
  ```html
  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  ```

> **Takeaway:** Forms are request boundaries: name their controls, use GET for reads, use POST for state changes, and route each submission to the right handler.

## Episode 26 - Always Escape Untrusted Input

- **Inspect `$_POST` after a form submission to see the named fields and values sent by the browser.**
  ```php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      var_dump($_POST);
  }
  ```

- **Insert submitted note data with a prepared statement so user values cannot change the SQL syntax.**
  ```php
  $db->query(
      'INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',
      [
          'body' => $_POST['body'],
          'user_id' => 1, // Temporary until authentication is added.
      ]
  );
  ```

- **Prepared statements protect the database query, but stored user input is still unsafe to render as HTML.**
  ```text
  User input: <script>alert('XSS')</script>
  ```

- **Escape untrusted text with `htmlspecialchars()` everywhere it is rendered in HTML so tags become text instead of executable markup.**
  ```php
  // Notes index
  <?= htmlspecialchars($note['body']) ?>

  // Individual note page
  <p><?= htmlspecialchars($note['body']) ?></p>
  ```

- **Validate submitted values before inserting them so required data meets application rules such as a non-empty, bounded note body.**
  ```php
  $body = $_POST['body'] ?? '';

  if (!Validator::string($body, 1, 1000)) {
      $errors['body'] = 'Body must be between 1 and 1000 characters.';
  }
  ```

> **Takeaway:** Treat submitted data as untrusted: use prepared statements for SQL, validate it against application rules, and escape it whenever it enters HTML.

## Episode 27 - Intro to Form Validation

- **Client-side validation improves feedback, but it cannot protect the application because users can submit requests without the browser form.**
  ```bash
  curl -X POST http://localhost:8888/notes -d "body="
  ```

- **Collect validation errors before writing to the database, and only run the insert when the error collection is empty.**
  ```php
  $body = $_POST['body'] ?? '';
  $errors = [];

  if (strlen($body) === 0) {
      $errors['body'] = 'A body is required.';
  }

  if (empty($errors)) {
      $db->query(
          'INSERT INTO notes (body, user_id) VALUES (:body, :user_id)',
          ['body' => $body, 'user_id' => 1]
      );
  } else {
      return view('notes/create.view.php', [
          'errors' => $errors,
      ]);
  }
  ```

- **Display a field-specific validation message only when that field has an error, so users know what to fix.**
  ```php
  <?php if (isset($errors['body'])): ?>
      <p class="text-red-600"><?= htmlspecialchars($errors['body']) ?></p>
  <?php endif; ?>
  ```

- **Apply a maximum length rule when unbounded input would be too large for the application, such as limiting a note body to 1000 characters.**
  ```php
  if (strlen($body) > 1000) {
      $errors['body'] = 'Body cannot be more than 1000 characters.';
  }
  ```

- **Preserve submitted input after validation fails, and use the null coalescing operator so the initial GET request does not trigger an undefined-key warning.**
  ```php
  <textarea name="body"><?= htmlspecialchars($_POST['body'] ?? '') ?></textarea>
  ```

> **Takeaway:** Browser validation helps users, but server-side validation is the authority that prevents invalid data from reaching the database.

## Episode 28 - Extract a Simple Validator Class

- **Move validation rules into a dedicated `Validator` class so controllers can reuse them instead of repeating input checks.**
  ```php
  // Core/Validator.php
  class Validator
  {
      public function string($value)
      {
          return strlen($value) >= 1;
      }
  }

  $validator = new Validator();
  $validator->string($body);
  ```

- **Trim a value before measuring it so whitespace-only input fails the minimum-length rule.**
  ```php
  public function string($value)
  {
      $value = trim($value);

      return strlen($value) >= 1;
  }
  ```

- **Accept minimum and maximum lengths in one string rule, defaulting to one character and no practical upper bound.**
  ```php
  public function string($value, $min = 1, $max = INF)
  {
      $value = trim($value);

      return strlen($value) >= $min && strlen($value) <= $max;
  }

  $validator->string($body, 1, 1000);
  ```

- **A pure function depends only on its arguments, so it can be declared `static` and called without creating a class instance.**
  ```php
  public static function string($value, $min = 1, $max = INF): bool
  {
      $value = trim($value);

      return strlen($value) >= $min && strlen($value) <= $max;
  }

  Validator::string($body, 1, 1000);
  ```

- **Use `filter_var()` with `FILTER_VALIDATE_EMAIL` to validate an email address's format without checking whether the address exists.**
  ```php
  public static function email($value): bool
  {
      return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  if (!Validator::email($email)) {
      $errors['email'] = 'A valid email address is required.';
  }
  ```

- **Keep validation before the database write; extracting the rules changes the structure of the code without changing its behavior.**
  ```php
  $errors = [];

  if (!Validator::string($_POST['body'], 1, 1000)) {
      $errors['body'] = 'Body must be between 1 and 1000 characters.';
  }

  if (empty($errors)) {
      $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
          'body' => $_POST['body'],
          'user_id' => 1,
      ]);
  }
  ```

> **Takeaway:** Small, pure validation methods keep controllers focused while making common input rules reusable across the application.

## Episode 29 - Resourceful Naming Conventions

- **Group controllers and views by resource so flat directories remain easy to navigate as the application grows.**
  ```text
  # Before
  Http/controllers/
    noteCreate.php
    noteIndex.php
    noteShow.php
  views/
    noteCreate.view.php
    noteIndex.view.php
    noteShow.view.php

  # After
  Http/controllers/notes/
    create.php
    index.php
    show.php
  views/notes/
    create.view.php
    index.view.php
    show.view.php
  ```

- **Let the resource directory provide context, then use conventional action names such as `index`, `show`, and `create`.**
  ```text
  notes/index.php  -> list notes
  notes/show.php   -> show one note
  notes/create.php -> display the create form
  ```

- **Update route targets after moving and renaming controller files.**
  ```php
  $router->get('/notes', 'notes/index.php');
  $router->get('/note', 'notes/show.php');
  $router->get('/notes/create', 'notes/create.php');
  ```

- **Use the same resource-and-action convention for view filenames so controllers and templates are easy to find together.**
  ```php
  view('notes/index.view.php', ['notes' => $notes]);
  view('notes/show.view.php', ['note' => $note]);
  view('notes/create.view.php', ['errors' => $errors]);
  ```

- **Use a project-rooted path for shared partials after moving a view into a resource subdirectory.**
  ```php
  <?php require base_path('views/partials/nav.php') ?>
  ```

- **Apply the same convention to every resource so a future user form follows the same predictable path.**
  ```text
  Http/controllers/users/create.php
  views/users/create.view.php
  GET /users/create
  ```

> **Takeaway:** Resource-based folders and consistent action names make a growing application easier to navigate, maintain, and work on as a team.

## Episode 30 - PHP Autoloading and Extraction

- **Set the web server's document root to `public/` so only the front controller and public assets can be requested directly.**
  ```bash
  php -S localhost:8888 -t public
  # config.php and other application files remain outside the document root.
  ```

- **Build an absolute project root from the front controller's location, then load shared helpers before using them.**
  ```php
  // public/index.php
  const BASE_PATH = __DIR__ . '/../';

  require BASE_PATH . 'Core/functions.php';
  ```

- **Use `base_path()` to resolve project-relative files so moving the entry point does not require rewriting every path.**
  ```php
  function base_path($path): string
  {
      return BASE_PATH . $path;
  }

  // Before: require 'routes.php';
  require base_path('routes.php');
  ```

- **Hide template paths behind a `view()` helper so controllers can request a view through a small, consistent interface.**
  ```php
  function view($path, $attributes = [])
  {
      require base_path('views/' . $path);
  }

  view('about.view.php');
  ```

- **Pass view data as an associative array and use `extract()` to make each key available as a template variable.**
  ```php
  function view($path, $attributes = [])
  {
      extract($attributes);

      require base_path('views/' . $path);
  }

  view('notes/index.view.php', [
      'heading' => 'My Notes',
      'notes' => $notes,
  ]);
  // The view can now use $heading and $notes.
  ```

- **Register an autoloader so PHP loads a class file only when the class is first needed, replacing repeated manual `require` statements.**
  ```php
  spl_autoload_register(function ($class) {
      require base_path("Core/{$class}.php");
  });

  $db = new Database($config['database']); // Loads Core/Database.php on demand.
  ```

- **Extract generic infrastructure into `Core/` and keep application-specific controllers and views in their own directories.**
  ```text
  Core/
    Database.php
    Response.php
    Router.php
    Validator.php
    functions.php
  Http/controllers/
  views/
  public/index.php
  ```

> **Takeaway:** A protected public entry point, centralized paths, reusable view loading, and lazy class loading keep a PHP project safer and easier to organize.

## Episode 31 - Namespacing: What, Why, How?

- **When a shared file moves under `Core/`, resolve related files from the project root so its working directory no longer matters.**
  ```php
  // Core/Router.php
  require base_path('routes.php');

  return require base_path("Http/controllers/{$route['controller']}");
  ```

- **A namespace groups classes and should mirror the directory tree, so `Core/Database.php` defines `Core\Database`.**
  ```php
  // Core/Database.php
  <?php

  namespace Core;

  class Database
  {
      // ...
  }
  ```

- **Use a fully qualified class name or import it once with `use`; the import keeps repeated references readable.**
  ```php
  // Http/controllers/notes/index.php
  use Core\Database;

  // With the import:
  $db = new Database($config['database']);

  // Without the import:
  $db = new \Core\Database($config['database']);
  ```

- **A namespace-aware autoloader converts the namespace separator to the operating system's directory separator before building the file path.**
  ```php
  spl_autoload_register(function ($class) {
      $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

      require base_path("{$class}.php");
  });

  // Core\Database becomes Core/Database.php.
  ```

- **Unqualified class names inside a namespace are resolved inside that namespace, so import global PHP classes such as `PDO` or prefix them with `\`.**
  ```php
  namespace Core;

  use PDO;
  use PDOStatement;

  class Database
  {
      public PDO $connection;
      public ?PDOStatement $statement = null;
  }

  // Alternative: new \PDO(...)
  ```

- **Apply the namespace consistently to Core classes and import those classes in application files; global helper functions can remain global while importing their namespaced dependencies.**
  ```php
  // Http/controllers/notes/store.php
  use Core\App;
  use Core\Database;
  use Core\Validator;

  $db = App::resolve(Database::class);
  Validator::string($_POST['body'], 1, 1000);
  ```

> **Takeaway:** Namespaces give classes names that match their structure; the autoloader translates those names into paths, and `use` statements keep references clear.

## Episode 32 - Handle Multiple Request Methods From a Controller Action?

- **Use a form for destructive actions such as deleting a note; an anchor tag sends a GET request, which should be reserved for safe reads.**
  ```html
  <form method="POST" class="mt-4">
      <input type="hidden" name="id" value="<?= htmlspecialchars($note['id']) ?>">
      <button type="submit" class="text-red-500">Delete</button>
  </form>
  ```

- **A controller can inspect `$_SERVER['REQUEST_METHOD']` to distinguish the initial page request from a submitted form, although combining both behaviors creates extra branching.**
  ```php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Delete the note.
  } else {
      // Display the note.
  }
  ```

- **RESTful routing expresses deletion as a `DELETE` request to the resource's URI instead of inventing an action-specific path such as `/note/delete`.**
  ```text
  GET    /note?id=17  -> show note 17
  DELETE /note?id=17  -> delete note 17
  ```

- **Native HTML forms support only GET and POST, so use POST as a temporary compatibility step until the application adds a way to represent DELETE, PUT, or PATCH submissions.**
  ```text
  Desired request: DELETE /note?id=17
  Native form:    POST /note with the note ID in the form body
  ```

- **Treat the submitted ID as untrusted: reload the note, authorize its owner, and only then execute a parameterized delete query.**
  ```php
  $note = $db->query('SELECT * FROM notes WHERE id = :id', [
      'id' => $_POST['id'],
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  $db->query('DELETE FROM notes WHERE id = :id', [
      'id' => $_POST['id'],
  ]);
  ```

- **Redirect after a successful mutation so refreshing the destination does not submit the delete form again.**
  ```php
  header('Location: /notes');
  exit;
  ```

> **Takeaway:** Request methods describe intent: use GET to read, use a non-idempotent method to mutate, protect destructive actions with authorization, and keep temporary multi-purpose controllers on a path toward separate resource actions.

## Episode 33 - Build a Better Router

- **A route should match both the URI and the HTTP method; URI-only routing forces one controller to handle unrelated actions with extra conditionals.**
  ```php
  // Before: one controller handles both behaviors.
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Delete the note.
  } else {
      // Show the note.
  }
  ```

- **Give each request method its own route so the controller can focus on one action.**
  ```php
  // routes.php
  $router->get('/note', 'notes/show.php');
  $router->delete('/note', 'notes/destroy.php');
  ```

- **A router object provides readable methods for the common request types: `get`, `post`, `delete`, `patch`, and `put`; `PATCH` and `PUT` can both represent updates while the distinction is deferred.**
  ```php
  $router->get('/', 'index.php');
  $router->post('/notes', 'notes/store.php');
  $router->delete('/note', 'notes/destroy.php');
  $router->patch('/note', 'notes/update.php');
  $router->put('/note', 'notes/update.php');
  ```

- **Store route definitions in a protected `$routes` array so callers use the router's methods instead of reaching into its internal state.**
  ```php
  class Router
  {
      protected array $routes = [];
  }
  ```

- **Centralize registration in `add()`; each request-specific method supplies the method name and returns the router instance for future chaining or extensions.**
  ```php
  public function add($method, $uri, $controller)
  {
      $this->routes[] = [
          'method' => $method,
          'uri' => $uri,
          'controller' => $controller
      ];

      return $this;
  }

  public function delete($uri, $controller)
  {
      return $this->add('DELETE', $uri, $controller);
  }
  ```

- **Create the router before requiring `routes.php`; the required file can then use the existing `$router` variable to register every route.**
  ```php
  // public/index.php
  $router = new Router();
  require base_path('routes.php');
  ```

- **When dispatching, require a matching URI and method, normalize the method with `strtoupper()`, and abort with a 404 response when no route matches.**
  ```php
  public function route($uri, $method)
  {
      foreach ($this->routes as $route) {
          if ($route['uri'] === $uri
              && $route['method'] === strtoupper($method)) {
              return require base_path("Http/controllers/{$route['controller']}");
          }
      }

      $this->abort();
  }
  ```

- **HTML forms support only GET and POST, so add a hidden `_method` field when a POST form should represent DELETE, PUT, or PATCH.**
  ```html
  <form method="POST" action="/note">
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit">Delete</button>
  </form>
  ```

- **Prefer the submitted method override and fall back to the server's actual request method with PHP's null-coalescing operator.**
  ```php
  $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

  $router->route($uri, $method);
  ```

- **Keep a global helper such as `abort()` available when authorization or controllers call it; moving routing into a class does not automatically move application-wide helpers.**
  ```php
  // Core/functions.php
  function abort($code = 404): void
  {
      http_response_code($code);
      require base_path("views/{$code}.php");
      die();
  }
  ```

> **Takeaway:** A better router separates request methods from controller actions, keeps route registration readable, and uses method overriding to give HTML forms RESTful behavior.

## Episode 34 - One Request, One Controller

- **Once routing distinguishes request methods, give each method its own controller action instead of branching inside one controller.**
  ```php
  // Before: one controller handles both behaviors.
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Delete the note.
  } else {
      // Show the note.
  }

  // After: each request has a focused action.
  $router->get('/note', 'notes/show.php');
  $router->delete('/note', 'notes/destroy.php');
  ```

- **A dedicated destroy action needs no request-method conditional; it can load the submitted note, authorize its owner, delete it, and redirect.**
  ```php
  $note = $db->query('SELECT * FROM notes WHERE id = :id', [
      'id' => $_POST['id'],
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  $db->query('DELETE FROM notes WHERE id = :id', [
      'id' => $_POST['id'],
  ]);

  header('Location: /notes');
  exit;
  ```

- **Use the correct input source for a method-overridden delete form: the hidden note ID is submitted in `$_POST`, even though the router treats the request as `DELETE`.**
  ```html
  <form method="POST" action="/note">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="17">
      <button type="submit">Delete</button>
  </form>
  ```

- **Follow the common RESTful convention of using `GET /notes/create` to display the form and `POST /notes` to persist the new note; the action names are conventionally `create` and `store`.**
  ```php
  $router->get('/notes/create', 'notes/create.php');
  $router->post('/notes', 'notes/store.php');
  ```

- **Keep validation and persistence in the store action, return the form with errors when validation fails, and put the successful insert-and-redirect path after the error check.**
  ```php
  $errors = [];

  if (!Validator::string($_POST['body'], 1, 1000)) {
      $errors['body'] = 'Body must be between 1 and 1000 characters.';
  }

  if (!empty($errors)) {
      return view('notes/create.view.php', [
          'heading' => 'Create Note',
          'errors' => $errors,
      ]);
  }

  $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => 1, // Temporary until authentication is added.
  ]);

  header('Location: /notes');
  exit;
  ```

- **The create action should only prepare and display the form, so it can be a small view call with an initially empty error collection and no database work.**
  ```php
  // Http/controllers/notes/create.php
  view('notes/create.view.php', [
      'heading' => 'Create Note',
      'errors' => [],
  ]);
  ```

- **A complete notes flow now maps each request to one focused action, making the behavior easy to trace and test.**
  ```text
  GET    /notes/create       -> create.php  -> display form
  POST   /notes              -> store.php   -> insert, redirect to /notes
  GET    /note?id=17         -> show.php    -> display note
  POST   /note (_method=DELETE) -> destroy.php -> delete, redirect to /notes
  ```

> **Takeaway:** One request type per controller action keeps controllers small, reduces indentation, and makes the application's resource conventions easier to understand.

## Episode 35 - Make Your First Service Container

- **Frameworks provide common infrastructure such as routers, validators, database wrappers, and service containers; building a small version helps explain what a framework does for you.**
  ```text
  Application code -> framework services
  Router, validator, database, container, ...
  ```

- **Repeatedly constructing `Database` is noisy because every call must repeat the configuration required by its constructor.**
  ```php
  // Before: every caller repeats the setup.
  $config = require base_path('config.php');
  $db = new Database($config['database']);
  ```

- **A service container stores a service key and a resolver function, so construction logic can be defined once and reused.**
  ```php
  class Container
  {
      protected array $bindings = [];

      public function bind($key, $resolver): void
      {
          $this->bindings[$key] = $resolver;
      }
  }
  ```

- **`resolve()` looks up a binding, calls its resolver when it is callable, and returns the resulting service; an unknown key throws an exception.**
  ```php
  public function resolve($key)
  {
      if (!isset($this->bindings[$key])) {
          throw new Exception("No binding found for $key");
      }

      $resolver = $this->bindings[$key];

      if (is_callable($resolver)) {
          return $resolver();
      }

      return $resolver;
  }
  ```

- **Build the container during bootstrapping, bind the database using `Database::class` as its key, and register the container with `App`.**
  ```php
  use Core\App;
  use Core\Container;
  use Core\Database;

  $container = new Container();

  $container->bind(Database::class, function () {
      $config = require base_path('config.php');

      return new Database($config['database']);
  });

  App::setContainer($container);
  ```

- **The static container stored by `App` provides singleton-style access to the same container throughout the application.**
  ```php
  class App
  {
      protected static $container;

      public static function setContainer($container): void
      {
          static::$container = $container;
      }

      public static function getContainer()
      {
          return static::$container;
      }
  }
  ```

- **Add forwarding methods to `App` when you want a shorter API; these methods delegate to the container instead of duplicating its logic.**
  ```php
  public static function bind($key, $resolver): void
  {
      static::getContainer()->bind($key, $resolver);
  }

  public static function resolve($key)
  {
      return static::getContainer()->resolve($key);
  }
  ```

- **Replace manual database setup in controllers with a lookup from the container.**
  ```php
  // Before
  $config = require base_path('config.php');
  $db = new Database($config['database']);

  // After
  $db = App::resolve(Database::class);
  ```

- **Automatic dependency resolution is a possible extension where the container inspects constructor dependencies and builds the dependency graph recursively; this episode uses explicit bindings.**
  ```text
  Service A -> Service B -> Database
  The container could resolve each dependency in order.
  ```

> **Takeaway:** A service container centralizes object construction so the rest of the application can request ready-to-use services through one consistent API.

## Episode 36 - Updating With PATCH Requests

- **Use separate resource actions for displaying an edit form and processing its update; `edit` shows the form, while `update` changes the stored record.**
  ```php
  $router->get('/note/edit', 'notes/edit.php');
  $router->patch('/note', 'notes/update.php');
  ```

- **Include the note identifier in the edit link so the edit controller can load the specific record instead of showing an empty form.**
  ```php
  <a href="/note/edit?id=<?= htmlspecialchars($note['id']) ?>">
      Edit
  </a>
  ```

- **The edit action should reload the note, return a 404 when it does not exist, authorize its owner, and pass the note to the view.**
  ```php
  $note = $db->query('SELECT * FROM notes WHERE id = :id', [
      'id' => $_GET['id'],
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  view('notes/edit.view.php', [
      'heading' => 'Edit Note',
      'errors' => [],
      'note' => $note,
  ]);
  ```

- **Reuse the create form for editing by pre-filling the textarea with the saved body, including the ID as hidden form data, and offering a cancel link.**
  ```html
  <form method="POST" action="/note">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="id" value="<?= htmlspecialchars($note['id']) ?>">

      <textarea name="body"><?= htmlspecialchars($note['body'] ?? '') ?></textarea>

      <a href="/notes">Cancel</a>
      <button type="submit">Update Note</button>
  </form>
  ```

- **Because native HTML forms support only `GET` and `POST`, use a hidden `_method` field to tell the router that a POST form should be treated as a `PATCH` request.**
  ```php
  $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

  // The router receives PATCH even though the browser submitted POST.
  $router->route('/note', $method);
  ```

- **Process an update in a predictable order: find the note, authorize the user, validate the submitted body, then write to the database only when there are no errors.**
  ```php
  $note = $db->query('SELECT * FROM notes WHERE id = :id', [
      'id' => $_POST['id'],
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  $errors = [];

  if (!Validator::string($_POST['body'], 1, 1000)) {
      $errors['body'] = 'A note must be between 1 and 1000 characters.';
  }

  if (count($errors)) {
      view('notes/edit.view.php', [
          'heading' => 'Edit Note',
          'errors' => $errors,
          'note' => $note,
      ]);
  }
  ```

- **Use bound parameters for the `UPDATE` query and redirect after success so the saved note is loaded through a fresh request.**
  ```php
  $db->query('UPDATE notes SET body = :body WHERE id = :id', [
      'id' => $_POST['id'],
      'body' => $_POST['body'],
  ]);

  header('Location: /notes');
  exit;
  ```

- **When validation fails, show the error beside the form field; the episode's simple implementation passes the original database note back, so the invalid submitted text is replaced by the saved text.**
  ```php
  <?php if (isset($errors['body'])): ?>
      <p><?= htmlspecialchars($errors['body']) ?></p>
  <?php endif; ?>
  ```

- **Resourceful CRUD conventions give each common operation a predictable action and route, making it easier to find and maintain the code.**
  ```text
  index   -> show all notes      -> GET /notes
  show    -> show one note       -> GET /note?id=17
  create  -> show create form    -> GET /notes/create
  store   -> save a new note     -> POST /notes
  edit    -> show edit form      -> GET /note/edit?id=17
  update  -> change a note       -> PATCH /note
  destroy -> delete a note       -> DELETE /note

  CRUD = Create, Read, Update, Delete
  ```

> **Takeaway:** PATCH-based updates complete the notes CRUD flow while resourceful names make each request's purpose predictable.

## Episode 37 - Introducing Session Superglobal

- **`$_SESSION` is a superglobal associative array for storing values that should be available across requests from the same visitor.**
  ```php
  $_SESSION['name'] = 'Jeffrey';
  ```

- **Before reading or writing `$_SESSION`, start the session as early as possible in the request entrypoint.**
  ```php
  // public/index.php
  session_start();
  ```

- **A value written during one request can be read by another controller or view after the session has started.**
  ```php
  // Homepage controller
  $_SESSION['name'] = 'Jeffrey';

  // About view
  echo 'Hello, ' . $_SESSION['name'];
  // Hello, Jeffrey
  ```

- **Session keys may be missing when a visitor starts on another page or begins a new session, so provide a fallback with the null-coalescing operator.**
  ```php
  $name = $_SESSION['name'] ?? 'Guest';

  echo 'Hello, ' . $name;
  ```

- **With PHP's default file-based session handler, the values are stored on the server while the browser keeps a `PHPSESSID` cookie that identifies the session.**
  ```text
  Browser: PHPSESSID=<session-id>
  Server:  session file containing name and other session values
  ```

- **Use `php -i` to inspect `session.save_path` and find the directory where PHP stores session files; an empty setting falls back to PHP's temporary directory.**
  ```bash
  php -i
  # Search the output for:
  session.save_path
  ```

- **Closing the browser or deleting the `PHPSESSID` cookie usually starts a new session on the next request, so the old session data is no longer available to that browser.**
  ```text
  Before: PHPSESSID=abc123
  After cookie reset: PHPSESSID=xyz789
  ```

> **Takeaway:** Start the session before using `$_SESSION`; PHP then uses the browser's session ID to reconnect later requests with temporary data stored on the server.

## Episode 38 - Register a New User

- **Use separate routes for displaying a registration form and processing its submission: `GET /register` renders the form, while `POST /register` handles the submitted data.**
  ```php
  $router->get('/register', 'registration/create.php');
  $router->post('/register', 'registration/store.php');

  // registration/create.php
  view('registration/create.view.php', [
      'heading' => 'Register',
  ]);
  ```

- **Make the form post to the registration endpoint and use field names that match the keys the controller reads from `$_POST`.**
  ```html
  <form action="/register" method="POST">
      <label for="email">Email address</label>
      <input id="email" type="email" name="email" required>

      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>

      <button type="submit">Register</button>
  </form>
  ```

- **Keep validation errors in an associative array keyed by field so the view can display each message beside the input that needs attention.**
  ```php
  <?php if (isset($errors['email'])): ?>
      <p><?= $errors['email'] ?></p>
  <?php endif; ?>

  <?php if (isset($errors['password'])): ?>
      <p><?= $errors['password'] ?></p>
  <?php endif; ?>
  ```

- **Validate every submitted value before querying or changing the database, then return the form with its errors when validation fails.**
  ```php
  $email = $_POST['email'];
  $password = $_POST['password'];

  $errors = [];

  if (!Validator::email($email)) {
      $errors['email'] = 'Please provide a valid email address.';
  }

  if (!Validator::string($password, 7, 255)) {
      $errors['password'] = 'Password must be at least 7 characters.';
  }

  if (!empty($errors)) {
      view('registration/create.view.php', [
          'errors' => $errors,
      ]);
      exit;
  }
  ```

- **Check whether the submitted email already belongs to a user by using a bound parameter; `find()` returns the matching row or a false value when no row exists.**
  ```php
  $db = App::resolve(Database::class);

  $user = $db->query('select * from users where email = :email', [
      'email' => $email,
  ])->find();

  if ($user) {
      view('registration/create.view.php', [
          'errors' => ['email' => 'Email is already taken.'],
      ]);
      exit;
  }
  ```

- **When the email is available, insert the new account, record a simple user marker in the session, and redirect to the home page; stop execution after sending the redirect.**
  ```php
  $db->query('insert into users (email, password) values (:email, :password)', [
      'email' => $email,
      'password' => $password, // Temporary episode example; never store passwords this way in production.
  ]);

  $_SESSION['user'] = [
      'email' => $email,
  ];

  header('Location: /');
  exit;
  ```

- **Use the session marker defensively in shared navigation so guests see registration/login links while signed-in users see authenticated controls.**
  ```php
  <?php if ($_SESSION['user'] ?? false): ?>
      <span>Signed in</span>
  <?php else: ?>
      <a href="/register">Register</a>
      <a href="/login">Login</a>
  <?php endif; ?>
  ```

> **Takeaway:** Registration is a repeatable request flow: display a form, validate its input, check the database, create the account, mark the session, and redirect.

## Episode 39 - Introduction to Middleware

- **Middleware is a checkpoint between the incoming request and the controller; it can inspect the request and stop or redirect it before the controller runs.**
  ```text
  request -> route match -> middleware -> controller
  ```

- **Put guest-only and authenticated-user rules on routes instead of repeating session checks in every controller.**
  ```php
  $router->get('/register', 'registration/create.php')->only('guest');
  $router->get('/notes', 'notes/index.php')->only('auth');
  ```

- **Fluent route configuration works only when router methods return the router instance; otherwise `get()` returns `null` and `->only()` fails.**
  ```php
  public function add($method, $uri, $controller)
  {
      $this->routes[] = [
          'method' => $method,
          'uri' => $uri,
          'controller' => $controller,
      ];

      return $this;
  }

  public function get($uri, $controller)
  {
      return $this->add('GET', $uri, $controller);
  }
  ```

- **Have `only()` attach a middleware key to the most recently registered route, then return the router so more methods can be chained.**
  ```php
  public function only($key)
  {
      $lastRoute = array_key_last($this->routes);
      $this->routes[$lastRoute]['middleware'] = $key;

      return $this;
  }
  ```

- **After a route matches, run its middleware before requiring the controller; routes without middleware should continue normally.**
  ```php
  if (isset($route['middleware'])) {
      Middleware::resolve($route['middleware']);
  }

  return require base_path("http/controllers/{$route['controller']}");
  ```

- **Middleware classes can share a simple `handle()` contract: guest middleware redirects signed-in users, while auth middleware redirects guests.**
  ```php
  class Guest
  {
      public function handle(): void
      {
          if ($_SESSION['user'] ?? false) {
              header('Location: /');
              exit;
          }
      }
  }

  class Auth
  {
      public function handle(): void
      {
          if (!($_SESSION['user'] ?? false)) {
              header('Location: /');
              exit;
          }
      }
  }
  ```

- **Map short route keys to middleware classes so adding a new middleware does not require another conditional inside the router.**
  ```php
  public const MAP = [
      'guest' => Guest::class,
      'auth' => Auth::class,
  ];
  ```

- **A resolver should return when no middleware key exists and throw a clear exception when a route references an unknown key.**
  ```php
  public static function resolve($key): void
  {
      if (!$key) {
          return;
      }

      $middleware = static::MAP[$key] ?? null;

      if (!$middleware) {
          throw new Exception("No matching middleware found for key: $key.");
      }

      (new $middleware)->handle();
  }
  ```

> **Takeaway:** Middleware centralizes request checks so routes declare access rules while dedicated classes decide whether the request may continue.

## Episode 40 - Manage Passwords Like This For The Remainder of Your Career

- **Read the signed-in user's email from `$_SESSION`, and fall back to `Guest` when no user is signed in.**
  ```php
  <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>.</p>
  ```

- **Never store a password in plain text because a database breach would expose credentials that attackers may reuse elsewhere.**
  ```php
  // Unsafe: the original password is stored directly.
  'password' => $password,

  // Correct: store a password hash instead.
  'password' => password_hash($password, PASSWORD_BCRYPT),
  ```

- **Use PHP's `password_hash()` function before inserting a new user's password; it returns a hash suitable for later password verification.**
  ```php
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  $db->query('insert into users (email, password) values (:email, :password)', [
      'email' => $email,
      'password' => $hashedPassword,
  ]);
  ```

- **Use `PASSWORD_BCRYPT` when you want to force bcrypt, or `PASSWORD_DEFAULT` when you want PHP to choose its recommended algorithm; the default may change in a future PHP version.**
  ```php
  $bcryptHash = password_hash($password, PASSWORD_BCRYPT);
  $defaultHash = password_hash($password, PASSWORD_DEFAULT);
  ```

> **Takeaway:** Hash passwords before storing them so a stolen users table does not reveal the original passwords.

## Episode 41 - Log In and Log Out

- **Show guests Register and Login links, but show authenticated controls when `$_SESSION['user']` exists.**
  ```php
  <?php if ($_SESSION['user'] ?? false): ?>
      <img src="/avatar.jpg" alt="Profile">
  <?php else: ?>
      <a href="/register">Register</a>
      <a href="/login">Login</a>
  <?php endif; ?>
  ```

- **Use separate routes for displaying the login form, processing its submission, and logging out; protect login with guest middleware and logout with auth middleware.**
  ```php
  $router->get('/login', 'sessions/create.php')->only('guest');
  $router->post('/login', 'sessions/store.php');
  $router->delete('/logout', 'sessions/destroy.php')->only('auth');
  ```

- **Make the login form submit a `POST` request with field names that match the values read from `$_POST`.**
  ```html
  <form action="/login" method="POST">
      <label for="email">Email address</label>
      <input id="email" type="email" name="email" required>

      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>

      <button type="submit">Login</button>
  </form>
  ```

- **Validate the email and require a password before querying the database; when validation fails, reload the form with field-specific errors.**
  ```php
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $errors = [];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email is not valid';
  }

  if (empty($password)) {
      $errors['password'] = 'Password is required';
  }

  if (!empty($errors)) {
      view('sessions/create.view.php', ['errors' => $errors]);
      exit();
  }
  ```

- **Find the account with a bound email parameter, then compare the submitted password with the stored hash using `password_verify()`.**
  ```php
  $user = $db->query('select * from users where email = :email', [
      'email' => $email,
  ])->find();

  if ($user && password_verify($password, $user['password'])) {
      login($user);
      redirect('/');
  }
  ```

- **Use the same generic error for an unknown email and an incorrect password so the login form does not reveal which accounts exist.**
  ```php
  view('sessions/create.view.php', [
      'errors' => [
          'email' => 'Email or password is incorrect',
      ],
  ]);
  exit();
  ```

- **When logging a user in, store only the data the application needs and regenerate the session ID to reduce session-fixation risk.**
  ```php
  function login(array $user): void
  {
      $_SESSION['user'] = [
          'email' => $user['email'],
      ];

      session_regenerate_id(true);
  }
  ```

- **Use a form with a hidden `_method` field for logout because changing session state should not be triggered by a `GET` link; the router can treat the browser's `POST` as `DELETE`.**
  ```html
  <form method="POST" action="/logout">
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit">Logout</button>
  </form>
  ```

- **Log a user out by clearing the session values, destroying the server-side session, and expiring the session cookie with its configured path and domain.**
  ```php
  function logout(): void
  {
      $_SESSION = [];
      session_destroy();

      $params = session_get_cookie_params();
      setcookie(
          'PHPSESSID',
          '',
          time() - 3600,
          $params['path'],
          $params['domain'],
          $params['secure'],
          $params['httponly']
      );
  }
  ```

- **Hide authenticated-only navigation links from guests for a cleaner interface, but keep middleware because hiding a link is not access control.**
  ```php
  <?php if ($_SESSION['user'] ?? false): ?>
      <a href="/notes">Notes</a>
  <?php endif; ?>
  ```

> **Takeaway:** Login verifies a submitted password against its stored hash and records a minimal session marker; logout removes that marker and invalidates the session safely.

## Episode 42 - Extract a Form Validation Object

- **Refactor code when its intention is difficult to see; a controller should make the login flow clear instead of containing every validation detail.**
  ```php
  // Before: the controller builds and checks validation errors itself.
  $errors = [];

  if (!Validator::email($email)) {
      $errors['email'] = 'Email is not valid';
  }

  if (!Validator::string($password)) {
      $errors['password'] = 'Password is required';
  }

  // After: the controller describes the intent.
  $form = new LoginForm();

  if (!$form->validate($email, $password)) {
      return view('sessions/create.view.php', [
          'errors' => $form->errors(),
      ]);
  }
  ```

- **Keep reusable infrastructure in `Core`, but place classes that are specific to this application’s HTTP layer under `Http`.**
  ```text
  Core/                 # reusable application infrastructure
  Http/
    controllers/        # application controllers
    Forms/              # application-specific form objects
      LoginForm.php
  ```

- **When every route controller lives in one directory, make the router add that directory automatically so route definitions stay focused on the route itself.**
  ```php
  // routes.php
  $router->get('/about', 'about.php');
  $router->post('/login', 'sessions/store.php');

  // Router.php
  return require base_path("http/controllers/{$route['controller']}");
  ```

- **A form object groups the validation rules for one form, giving the class a clear responsibility and a meaningful name.**
  ```php
  <?php

  namespace Http\Forms;

  use Core\Validator;

  class LoginForm
  {
      protected array $errors = [];

      public function validate($email, $password): bool
      {
          if (!Validator::email($email)) {
              $this->errors['email'] = 'Email is not valid';
          }

          if (!Validator::string($password)) {
              $this->errors['password'] = 'Password is required';
          }

          return empty($this->errors);
      }
  }
  ```

- **Let `validate()` return a Boolean: `true` means there are no errors, while `false` means the caller should stop and display the form again.**
  ```php
  $form = new LoginForm();

  if ($form->validate($email, $password)) {
      // Continue with authentication.
  } else {
      // Show the form with validation errors.
  }
  ```

- **Keep the errors property protected and expose it through a getter; this allows callers to read errors without directly changing the object’s internal state.**
  ```php
  class LoginForm
  {
      protected array $errors = [];

      public function errors(): array
      {
          return $this->errors;
      }
  }

  $errors = $form->errors();
  ```

> **Takeaway:** A focused form object hides validation details while allowing the controller to clearly express the login flow.

## Episode 43 - Extract an Authenticator Class

- **Give authentication its own class when a controller is responsible for finding a user, checking a password, and starting a session.** The `Authenticator` hides the database lookup and password verification behind a meaningful method.
  ```php
  // Before: the controller knows the authentication details.
  $user = $db->query('select * from users where email = :email', [
      'email' => $email,
  ])->find();

  if ($user && password_verify($password, $user['password'])) {
      login($user);
  }

  // After: the controller asks a focused object to attempt authentication.
  $auth = new Authenticator();
  $auth->attempt($email, $password);
  ```

- **Put the lookup and password check inside `attempt()`, then return a Boolean so the controller can decide what the page should do next.** `true` means the user was authenticated; `false` means the controller should show the login form again.
  ```php
  public function attempt(string $email, string $password): bool
  {
      $db = App::resolve(Database::class);

      $user = $db->query('select * from users where email = :email', [
          'email' => $email,
      ])->find();

      if ($user && password_verify($password, $user['password'])) {
          $this->login($user);

          return true;
      }

      return false;
  }

  $auth = new Authenticator();

  if ($auth->attempt($email, $password)) {
      redirect('/');
  }
  ```

- **Keep session behavior with the authenticator because logging in and logging out are authentication responsibilities.** The class stores only the needed user data, regenerates the session ID after login, and clears the session during logout.
  ```php
  public function login(array $user): void
  {
      $_SESSION['user'] = [
          'email' => $user['email'],
      ];

      session_regenerate_id(true);
  }

  public function logout(): void
  {
      $_SESSION = [];
      session_destroy();

      $params = session_get_cookie_params();
      setcookie(
          'PHPSESSID',
          '',
          time() - 3600,
          $params['path'],
          $params['domain'],
          $params['secure'],
          $params['httponly']
      );
  }
  ```

- **Wrap repeated redirect behavior in a helper so its intention is readable and the security-related `exit()` is not forgotten.**
  ```php
  function redirect($path): void
  {
      header("Location: {$path}");
      exit();
  }

  redirect('/');
  ```

- **When two failure paths should render the same form, make their errors use the same source before merging the paths.** `LoginForm::error()` lets an authentication failure append an error to the form’s existing validation errors.
  ```php
  class LoginForm
  {
      protected array $errors = [];

      public function error(string $field, string $message): void
      {
          $this->errors[$field] = $message;
      }
  }
  ```

- **Keep the controller focused on the request flow: validate, attempt authentication, add an error when authentication fails, and render the form once.**
  ```php
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $form = new LoginForm();

  if ($form->validate($email, $password)) {
      $auth = new Authenticator();

      if ($auth->attempt($email, $password)) {
          redirect('/');
      }

      $form->error('email', 'No user found with that email and password combination');
  }

  view('sessions/create.view.php', [
      'errors' => $form->errors(),
  ]);
  ```

> **Takeaway:** Extract authentication knowledge into a focused class, return a simple result to the controller, and reuse one form-error path for every login failure.

## Episode 44 - The PRG Pattern (and Session Flashing)

- **Use the POST-Redirect-GET (PRG) pattern after a form submission: redirect after handling the POST so the browser loads a fresh GET request.** This avoids leaving the form on a POST response, which can cause a document-expired warning or resubmit the form on refresh.
  ```php
  use Core\Session;

  // Before: return the form directly from the POST request.
  view('sessions/create.view.php', ['errors' => $errors]);

  // After: redirect to the login page after storing the errors.
  Session::flash('errors', $errors);
  redirect('/login');
  ```

- **Use flash data for values that must survive a redirect but should be removed after the next page request.** Regular session data, such as the logged-in user, remains available across requests.
  ```php
  use Core\Session;

  // The POST request stores errors for the redirected GET request.
  Session::flash('errors', $form->errors());

  // The GET controller reads the errors while rendering the form.
  view('sessions/create.view.php', [
      'errors' => Session::get('errors', []),
  ]);
  ```

- **Encapsulate session access in a `Core\Session` helper so controllers do not need to know the special flash key.** The helper provides `put`, `get`, `has`, `flash`, `unflash`, `flush`, and `destroySession` methods.
  ```php
  namespace Core;

  class Session
  {
      public static function flash($key, $value): void
      {
          $_SESSION['_flash'][$key] = $value;
      }
  }
  ```

- **Have `get()` check flashed data first, then regular session data, and finally return the supplied default.** This keeps `_flash` private to the helper while giving callers one simple way to read either kind of value.
  ```php
  namespace Core;

  class Session
  {
      public static function get($key, $default = null)
      {
          if (isset($_SESSION['_flash'][$key])) {
              return $_SESSION['_flash'][$key];
          }

          return $_SESSION[$key] ?? $default;
      }
  }
  ```

- **Call `unflash()` after routing and rendering the response so flashed values disappear after one page request.** A redirect exits the POST request, leaving the flash data available to the following GET.
  ```php
  use Core\Session;

  $router->route($uri, $method);
  Session::unflash();
  ```

- **Use `flush()` to clear session values and `destroySession()` to end the session and expire its cookie during logout.** Keeping these operations on `Session` centralizes session cleanup.
  ```php
  use Core\Session;

  // Clear values while keeping the session active.
  Session::flush();

  // In logout, use this instead to destroy the session and expire its cookie.
  Session::destroySession();
  ```

> **Takeaway:** PRG gives form submissions a fresh GET response, while flash data carries errors across the redirect for just long enough to display them once.
