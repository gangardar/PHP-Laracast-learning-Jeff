<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php');?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="post" action="/note" method="post">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="hidden" name="_method" value="PATCH">
                <div class="space-y-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit your note</h2>

                    <div class="col-span-full ">
                        <label for="note" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                        <div class="mt-2">
                            <textarea id="note" name="body" rows="3"
                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body']?></textarea>
                            <?php if (isset($error['body'])): ?>
                                <p><?= $error['body'] ?></p>
                            <?php endif ?>
                        </div>
                        <button type="reset" class="mt-4 rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <a href="/notes">Cancel</a>
                        </button>
                        <button type="submit"
                                class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                        
                    </div>

            </form>
        </div>
    </main>

<?php require basePath('views/partials/footer.php') ?>