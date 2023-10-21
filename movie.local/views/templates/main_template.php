<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ТВОЄ КІНО</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index/serchIndex">ТВОЄ КІНО</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/movie/index">Фільми</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/director/index">Режисери</a>
                    </li>
                    </li>
                </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                    </li>
                    <?php if (!$user) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/index">Вхід</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/registration">Реєстрація</a>
                        </li>
                </ul>
            <?php else : ?>
                    <div class="header_user_exit">
                        <span class="btn"><b>Привіт, </b>
                            <?= $user['email']?>
                           </span>
                    <a href="/user/exit" class="btn">exit</a>
                    </div>
            </div>
        </div>
    <?php endif ?>
    </nav>
    <div class="main">
        <?php include_once '../views/pages/' . $page . '_view.php' ?>
    </div>
    <footer class="footer">
        <div class="wrapper">
            <a class="navbar-brand" href="/">ТВОЄ КІНО</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>