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
