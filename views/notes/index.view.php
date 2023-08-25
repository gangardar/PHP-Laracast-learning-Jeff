<?php
require basePath('views/partials/head.php');
require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php');?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note): ?>
                    <li class="text-blue-500 hover:underline m-3" >
                        <a href="/note?id=<?= $note['id']?>">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class='mt-6 text-bold '>
                <a href="/note/create">Add a new note</a>
            </p>
        </div>
    </main>

<?php require basePath('views/partials/footer.php') ?>