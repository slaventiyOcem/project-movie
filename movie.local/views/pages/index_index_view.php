<h1>Афіша</h1>
<div class="container-block">
    <div class="container-advertising">
        <img src="https://img.freepik.com/free-psd/black-friday-super-sale-instagram-and-facebook-story-banner-template_106176-1597.jpg?w=360" alt="1">
    </div>
   
    <div class="movie-card">
        <?php foreach ($data as $item) : ?>
            <?php $item?>
            <img class="card-img-top" src="<?= $item['img']?>" alt="img">
            <h2 class="movie-title"><?= $item['name'] ?></h2>
            <p class="movie-description"><?= $item['desс'] ?></p>
            <p class="movie-date"><?= $item['date'] ?></p>
            <a href="/"></a>
        <?php endforeach ?>
        <div class="pagination-button">
            <?php if ($currentPage > 1) : ?>
                <a class="btn btn-secondary" href="?page=<?= $currentPage - 1 ?>">Попередня</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>

                <a class="number_pag" style="color: white;" href="?page=<?= $i ?>" <?= $i == $currentPage ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages) : ?>
                <a class="btn btn-secondary" href="?page=<?= $currentPage + 1 ?>">Наступна</a>

            <?php endif; ?>
        </div>
    </div>
    <div class="container-advertising">
        <img src="https://img.freepik.com/free-psd/black-friday-super-sale-instagram-and-facebook-story-banner-template_106176-1597.jpg?w=360" alt="1">
    </div>
</div>