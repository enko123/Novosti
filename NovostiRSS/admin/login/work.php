<html>
    <head>
        <title>Login | Novosti</title>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta name='keywords' content='novost, novosti, najnovije'/>
            <meta name='description' content='Novosti za Vas'/>
            <meta name='robots' content='index,follow'>
            <meta name='author' content='Anel Memic, anelmemija@gmail.com'/>
            
            
            <link href='/icon/novosti.png' rel='shortcut icon'/>
            
            <link href='http://fonts.googleapis.com/css?family=Patrick+Hand&subset=latin-ext' rel='stylesheet' type='text/css'>
            
            <link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
            <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <script src="/js/bootstrap.min.js" type="text/javascript"></script>
            
            <script src="/js/jquery-1.11.0.min.js" type="text/javascript"></script>
            
            <link href="/css/main.css" rel="stylesheet" type="text/css"/>
            <script src="/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="jumbotron">
<?php
    session_start();
    
    $user = @$_POST['user'];
    $password =  @$_POST['password'];
    
    if ($user == 'admin' and $password == 'admin' or $user == 'profesor' and $password == 'profesor' or $user == 'student' and $password == 'student')
        {
            $_SESSION['logged'] = true;
                die(header('Location: ../../index.php'));
        }
    else
?>
                    <img src="../../logo/right.jpg" alt="Logo" class="slika"/>
                    <br>
                    <br>
                    <br>    
<?php
                    echo "Niste ovlašteni da pristupite kao administrator ove stranice.<br><br><br>";
                    echo "Povratak na";
?>
            <br>
            <br>
            <a href="../../index.php">Početna</a>
        </div>
    </body>
</html>