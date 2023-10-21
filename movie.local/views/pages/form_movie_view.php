<div class="container-movie-form">
    <form class="row g-3" action="/movie/<?= isset($movie) ? 'update' : 'store' ?>" method="post">
        <div class="col-md-4">
            <label for="directorSelect" class="form-label">Виберіть режисера</label>
            <select class="form-select" id="directorSelect" name="directorId" required>
                <option value="">Оберіть режисера</option>
                <?php foreach ($directors as $director): ?>
                    <option value="<?= $director['directorId'] ?>" <?= isset($movie) && $movie['directorId'] == $director['directorId'] ? 'selected' : '' ?>>
                        <?= $director['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Назва фільму</label>
            <input type="text" class="form-control" id="validationDefault02" name="nameMovie"
                   value="<?= $movie['name'] ?? 'Otto' ?>" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Опис фільму</label>
            <input type="text" class="form-control" id="validationDefault02" name="desc"
                   value="<?= $movie['description'] ?? 'Otto' ?>" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername">Дата випуск фільму</label>
            <input type="date" class="form-control" id="validationDefault02" name="date"
                   value="<?= $movie['releaseDate'] ?? '' ?>" aria-describedby="inputGroupPrepend2" required>
        </div>
        <?php if (isset($movie)): ?>
            <input type="hidden" name="movieId" value="<?= $movie['movieId'] ?>">
        <?php endif ?>

        <div class="col-12">
            <button class="btn btn-secondary" type="submit">Запысаты новий фільму</button>
    </form>
</div>