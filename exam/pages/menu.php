<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <form action="index.php?page=1" class="navbar-form navbar-left" method="post">
                    <?php
                    include_once('pages/logon.php');
                    if (!isset($_SESSION["ruser"])) {
                    ?>
                        <div class="form-group">
                            <input type="text" name="login" class="input-sm" placeholder="login" required>
                            <input type="pass" name="pass" class="input-sm" placeholder="password" required>
                        </div>
                        <input type="submit" name="logon" class="btn btn-sm btn-default" value="Войти" />
                    <?php
                    } else {
                        echo '<label style="color:blue; font-size: 16pt;">Привет ' . $_SESSION['ruser'] . '</label>';
                        echo '<button type="submit" name="logout" class="btn btn-sm btn-default">Выйти</button>';
                    }
                    ?>
                </form>
                <?php
                ?>
            </ul>
            <ul class="nav navbar-nav">
                <li <?php echo ($page == 1) ? "class='active'" : "" ?>>
                    <a href="index.php?page=1">Стадионы</a>
                </li>
                <li <?php echo ($page == 2) ? "class='active'" : "" ?>>
                    <a href="index.php?page=2">Тренеры</a>
                </li>
                <li <?php echo ($page == 5) ? "class='active'" : "" ?>>
                    <a href="index.php?page=5">Команды</a>
                </li>

                <?php
                if (!isset($_SESSION["ruser"])) {
                ?>
                    <li <?php echo ($page == 3) ? "class='active'" : "" ?>>
                        <a href="index.php?page=3">Registration</a>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION["radmin"])) {
                ?>
                    <li <?php echo ($page == 4) ? "class='active'" : "" ?>>
                        <a href="index.php?page=4">Admin Forms</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>