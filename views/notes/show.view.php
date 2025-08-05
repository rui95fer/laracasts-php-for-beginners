<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-gray-500 text-sm mb-4">
                <a href="/notes" class="text-blue-500 hover:text-blue-700">Back to notes</a>
            </p>

            <p><?= $note['body'] ?></p>

            <form class="mt-4" method="POST">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
            </form>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>