<?php require_once "includes/header.php"?>
 <body>
<?php

if(isset($_POST["register"])){

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $name= htmlspecialchars($_POST['name']);
        $email=htmlspecialchars($_POST['email']);
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $query=("SELECT * FROM user WHERE name='".$name."'");
        $numrows=($query);
        if($numrows==0)
        {
            $sql="INSERT INTO user(name, email, username,password)VALUES('$name','$email', '$username', '$password')";
            $result=($sql);
            if($result){
                $message = "Ваш акаунт успешно создан";
            } else {
                $message =" «Не удалось вставить данные!";
            }
        } else {
            $message = "Это имя пользователя уже существует! Попробуйте еще один!";
        }
    } else {
        $message = "Все поля обязательны для заполнения!";
    }
}
?>

<?php if (!empty($message)) {
    echo "MESSAGE: ". $message ;
}
    ?>
<body>
<div class="container mregister">
    <div id="login">
        <h1>Регистрация</h1>
        <form action="register.php" id="registerform" method="post"name="registerform">
            <p><label for="user_login">Имя<br>
                    <input class="input" id="name" name="name"size="32"  type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
            <p><label for="user_pass">Фамилия<br>
                    <input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
            <p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
        </form>
    </div>
</div>
<?php require_once "includes/footer.php"?>
</body>
