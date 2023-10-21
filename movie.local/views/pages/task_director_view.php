<h1>Режисери</h1>
<div class="container">
    <h1>Список Режисерів</h1>
    <table class="director-table">
        <thead>
        <tr>
            <th>Ім'я Режисера</th>
            <?php if ($user): ?>
                <th>Дії</th>
            <?php endif ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($directors as $director): ?>
            <tr>
                <td><?= $director['name'] ?></td>
                <?php if ($user): ?>
                    <td>
                        <a class="button-movie btn btn-secondary"
                           href="/director/form?id=<?= $director['directorId'] ?>">Редагувати</a>
                        <a class="button-movie btn btn-secondary"
                           href="/director/delete?id=<?= $director['directorId'] ?>">Видалити</a>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
        <tr>
            <td></td>
            <td>
                <?php if ($user): ?>
                    <a class="button-movie btn btn-secondary" href="/director/form">Додати</a>
                <?php endif ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>




