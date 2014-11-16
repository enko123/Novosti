<!DOCTYPE html>
<html>
    <head>
        <title>Novosti</title>
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
            <img src="logo/right.jpg" alt="Logo" class="slika"/>
            <div class="row">
<?php
    $DB = mysql_connect('localhost', 'root', 'A.M.root00001');
        if (!$DB) die('Dogodio se problem sa povezivanjem na bazu podataka.');
            if (!mysql_select_db('novostirss')) die('Dogodio se problem sa povezivanjem na bazu podataka.');
    $Upit = 'select * from rssitems order by pubDate desc';
        $Rezultat = mysql_query($Upit, $DB);
            if (mysql_error($DB)) die(mysql_error($DB));  
        $Novosti = array();
            while ($Novost = mysql_fetch_object($Rezultat)) $Novosti[] = $Novost;
                foreach ($Novosti as $Novost)
                    {
                        echo " <div class='col-md-12'>\n";
                            echo " <div class='title'>{$Novost->title}</div>\n";
                            echo " <div class='uvod'>{$Novost->uvod}</div>\n<br>";
                            echo " <div class='link'>{$Novost->link}</div>\n<br>";
                            echo " <div class='pubDate'>{$Novost->pubDate}</div>\n";
                        echo "</div>\n";   
                    }
?>
            </div>
        </div>
    </body>
</html>