<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-gray-500 text-sm mb-4">
                <a href="/notes" class="text-blue-500 hover:text-blue-700">Back to notes</a>
            </p>

            <p><?= htmlspecialchars($note['body']) ?></p>

            <footer class="mt-4">
                <a href="/note/edit?id=<?= htmlspecialchars($note['id']) ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
            </footer>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>