<?php

$heading = 'New Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd('Creating a new note with body: ' . $_POST['body']);
}

require 'views/note-create.view.php';