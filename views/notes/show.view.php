<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php');?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/notes" class="text-blue-500 underline">Go Back</a>
            </p>
            <p><?= htmlspecialchars($note['body']); ?></p>
            <form class="mt-5" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?php echo $note['id']?>">
                <button class="text-red-500 text-sm" type="submit" >Delete</button>
            </form>

            <button class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <a href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
            </button>

            <!-- <?php dd($note['id']) ?> -->
        </div>
    </main>

<?php require basePath('views/partials/footer.php') ?>