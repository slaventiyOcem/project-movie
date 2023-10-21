<h1>Топ-6 найкращих режисерів світу</h1>
<div class="container_row">
    <form action="#" method="/task/">≈
        <select class="form-select" aria-label="Default select example">
            <?php foreach ($directors as $director): ?>
                <option selected><?= $director ?></option>
            <?php endforeach ?>
        </select>
        <a href="/task/create">Новый режисер</a>
        <a href="/task/update/{id}">Відредагувати</a>
        <a href="#">Видалити</a>
</div>
</form>


