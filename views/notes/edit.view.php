<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= htmlspecialchars($note['id']) ?>">
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                    <textarea
                            id="body"
                            name="body"
                            rows="6"
                            class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                            required
                    ><?= $note['body'] ?? '' ?></textarea>

                    <?php if (isset($errors['body'])): ?>
                        <p class="mt-2 text-sm text-red-600"><?= htmlspecialchars($errors['body']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex justify-end space-x-2">
                    <!-- DELETE -->
                    <button type="button"
                            class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            onclick="if(confirm('Are you sure you want to delete this note?')) { document.getElementById('delete-form').submit(); }">
                        Delete Note
                    </button>

                    <a
                            href="/notes"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mr-2"
                    >
                        Cancel
                    </a>
                    <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Update Note
                    </button>
                </div>
            </form>

            <form id="delete-form" method="POST" action="/note">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= htmlspecialchars($note['id']) ?>">
            </form>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>