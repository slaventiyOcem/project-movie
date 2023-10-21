<div class="title_button">
    <h1>Фільми</h1>

    <?php if ($user): ?>
        <th><a class="btn btn-secondary" href="/movie/form">Додати до списку</a></th>
    <?php endif ?>
</div>
<div class="card" style="width: 60%; margin: 20px auto;">
    
    <?php foreach ($movies as $movie): ?>
    <img src="<?= $movie['img']?>"
         class="card-img-top" alt="img">
    <div class="card-body">
        <h5 class="card-title"><?= $movie['name'] ?></h5>
        <p class="card-text"><?= $movie['desс'] ?></p>
        <p class="card-text">
            <?php if ($user): ?>
        <div class="text-center"><i class="bi bi-brush">
                <a class="btn btn-secondary" href="/movie/form?id=<?= $movie['id'] ?>">Редагувати</a>
                <a class="btn btn-secondary" href="/movie/delete?id=<?= $movie['id'] ?>">Видалити</a>
        </div>
        <?php endif ?>
        <hr>
        <?php endforeach; ?>
    </div>

</div>



