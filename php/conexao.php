<?php
    define("SERVER", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DB", "loja_senac");
    define("PORT", 3306);

    function getConnection()
    {
        $link = mysqli_connect(SERVER, USER, PASS, DB, PORT);
        mysqli_set_charset($link, "utf8");

        return $link;
    }    
