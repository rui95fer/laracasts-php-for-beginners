# Course Notes Rules

Use this file as the standard for taking notes from any programming course.

The goal is not to write a transcript. The goal is to create useful notes that help you remember the main ideas from each episode and apply them later.

---

## The Structure

For each episode, alternate between lessons and their matching examples or evidence:

- Lesson (one bullet)
- Example directly under that lesson (code, command, configuration, query, or output)
- Lesson (one bullet)
- Example directly under that lesson (code, command, configuration, query, or output)

**Do not** separate all lessons first and all examples later.

**Template:**

````md
## Episode 01 — Episode Title

- **Short, single lesson.**
  ```php
  // Small example that demonstrates this lesson
  ```

- **Another short, single lesson.**
  ```php
  // Small example that demonstrates this lesson
  ```

> **Takeaway:** (Optional) One-sentence summary of the episode's central thesis, if it has one. See Closing Takeaway.
````

Use the language and example type that match the course; `php` is shown here only as an example.

---

## Rules for Lessons

### 1. Keep lessons concise and meaningful

Use one bullet per idea.

- Default: one sentence.
- Optional: add one short explanation sentence (`why` or `when`).
- If it needs more than two short lines, split into multiple bullets.

Good:

```md
- Controllers should stay small because mixing validation, authorization, database logic, and response formatting makes methods harder to read and maintain.
```

Avoid:

```md
- A single bullet that combines multiple rules or multiple decisions.
```

---

### 2. Use simple words

Write notes in your own words.

Good:

```md
- A migration is a version-controlled change to the database.
```

Avoid copying long explanations from the course.

---

### 3. Focus on what matters

Do not write every detail from the episode.

Write only:

- The main idea
- The rule or pattern being taught
- The part you are likely to forget
- The thing you can use in a real project

---

### 4. Include context when it helps

Help yourself remember *where* to apply the lesson.

Add a brief "when/why" clue when it helps you decide if the lesson applies later. Omit it when the lesson is already clear without extra explanation.

Good:

```md
- Use small controllers to keep each method testable and easy to change.
- Use migrations to track database schema changes in version control.
```

Avoid:

```md
- Controllers are small.
- Migrations exist.
```

---

### 5. Write lessons as retrievable answers

When you write a lesson, imagine someone asking you the inverse question.

This builds active recall — you can later cover the example and test yourself.

Good (retrievable):

```md
- Use small controllers to keep each method testable and easy to change.
(Answer to: "Why should controllers be small?")
```

Works but less retrievable:

```md
- Controllers should be small.
(Question is vague)
```

---

## Rules for Examples

### 1. Keep examples minimal

Show only the code, command, configuration, query, or output that demonstrates the lesson. Strip everything else.

Good:

```php
Route::get('/posts', PostController::class);
```

Avoid:

```php
// 20 lines of boilerplate that don't relate to the lesson
```

---

### 2. Use real-world examples, not toy examples

Prefer examples you would actually use in a project. Abstract examples like `foo()` and `bar()` are harder to recall later.

Good:

```php
Post::where('published', true)->latest()->paginate(10);
```

Avoid:

```php
Model::doSomething()->doAnotherThing();
```

---

### 3. Show before/after when teaching refactoring

If the lesson is about improving existing code, show both states. This builds pattern recognition.

```php
// Before
public function index()
{
    $posts = Post::all();
    return view('posts.index', compact('posts'));
}

// After — using a resource
public function index()
{
    return PostResource::collection(Post::paginate(10));
}
```

---

### 4. Add a comment only when the key point is not obvious

Use a short comment to highlight what the lesson is about. Do not comment every line.

Good:

```php
// With a {post} route parameter, implicit binding resolves a Post instance.
public function show(Post $post) { }
```

Avoid:

```php
// This is a controller method
// It takes a Post
// It returns a view
public function show(Post $post) { }
```

---

### 5. Prefer reusable snippets without adding boilerplate

When possible, use code that works if pasted into a real project. Snippets may be partial when full setup would distract, but preserve the assumptions needed to understand or adapt them.

---

### 6. Use inline code for short references

When mentioning a method, class, or function in a lesson bullet, wrap it in backticks so it stands out:

```md
- Use `PostResource::collection()` to transform a collection of models into a JSON-compatible format.
```

### 7. Record version-sensitive details

When syntax or behavior depends on a PHP, framework, library, or tool version, record the relevant version in the episode heading or lesson. This keeps snippets useful as dependencies change.

## Formatting Rules

These ensure your notes support recall and recognition:

### 1. Use pair-style bullets (lesson + matching example)

This structure is enforced by "The Structure" section above:

````md
- **Lesson text here.**
  ```php
  // Example code
  ```
````

### 2. Write short, not long

Avoid paragraphs and multi-line explanation. Use bullets. This supports scannability and recall.

### 3. Use language tags for fenced blocks

Always specify a useful language tag for fenced blocks, such as `php`, `bash`, `js`, `env`, `sql`, `json`, or `text`. Syntax highlighting helps recognition.

### 4. Make notes readable in under one minute

A solid episode should be scannable and reviewable in 60 seconds. Remove secondary details or split the notes when they cannot be reviewed that quickly. This supports spaced repetition and active recall.

---

## Closing Takeaway

When an episode has a central thesis — a "moral" or unifying message — capture it as a single blockquote line *after* the last lesson+example pair.

This lives outside the lesson list, so the strict pair-style rule stays intact.

**Format:**

```md
> **Takeaway:** [One sentence in your own words that states the episode's central thesis.]
```

**Good:**

```md
> **Takeaway:** Modern PHP is a different language than 2005 PHP — Laravel exists because PHP evolved enough to support it.
```

**When to use:**
- The episode ends with a thesis, framework, or "moral of the story" line.
- You can state the takeaway in one sentence.
- The lesson bullets alone would leave the reader without a unifying message.

**When to skip:**
- The episode is purely tactical (e.g., "how to use Form Requests") — no thesis to capture.
- The lessons themselves already form a clear narrative without a summary.

**Placement:** Immediately after the last lesson+example pair, with one blank line separating the example block from the blockquote.

---

## Golden Rule

**Write the lesson, show the matching example immediately, and move on.**

Stop here. You have all the essentials.
