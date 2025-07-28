<?php require 'views/partials/head.php' ?>
<?php require 'views/partials/nav.php' ?>
<?php require 'views/partials/banner.php' ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-gray-500 text-sm mb-4">
                <a href="/notes" class="text-blue-500 hover:text-blue-700">Back to notes</a>
            </p>
            <p><?= $note['body'] ?></p>
        </div>
    </main>

<?php require 'views/partials/footer.php' ?>