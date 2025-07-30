<?php require 'views/partials/head.php' ?>
<?php require 'views/partials/nav.php' ?>
<?php require 'views/partials/banner.php' ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-4">Create a New Note</h1>

            <form method="POST">
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                    <textarea id="body" name="body" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Create Note
                </button>
            </form>
        </div>
    </main>

<?php require 'views/partials/footer.php' ?>