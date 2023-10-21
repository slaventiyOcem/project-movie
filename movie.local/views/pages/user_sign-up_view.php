<div class="login-box">
    <h2>Login</h2>
    <form class="container-sing-in-form" action="/user/create" method="post">
        <div class="user-box">
            <input type="text" name="login" required>
            <label>Логин</label>
        </div>
        <div class="user-box">
            <input type="text" name="email" required>
            <label>Пошта</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required>
            <label>Пароль</label>
        </div>
        <div class="user-box">
            <input type="password" name="password_conf" required>
            <label>Повторіть пароль</label>
        </div>
        <button class="btn btn-secondary">Увійти</button>
    </form>

</div>