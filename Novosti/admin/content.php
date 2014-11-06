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
            <div class="row">
<?php
    $DB = mysql_connect('localhost', 'root', 'A.M.root00001');
        if (!$DB) die('Dogodio se problem sa povezivanjem na bazu podataka.');
            if (!mysql_select_db('novosti')) die('Dogodio se problem sa povezivanjem na bazu podataka.');
    $Upit = 'select * from Novosti order by Vrijeme desc';
        $Rezultat = mysql_query($Upit, $DB);
            if (mysql_error($DB)) die(mysql_error($DB));  
        $Novosti = array();
            while ($Novost = mysql_fetch_object($Rezultat)) $Novosti[] = $Novost;
                foreach ($Novosti as $Novost)
                    {
                        echo " <div class='col-md-8'>\n";
                            echo " <div class='Naslov'>{$Novost->Naslov}</div>\n";
                            echo " <div class='Opis'>{$Novost->Opis}</div>\n<br>";
                            echo " <div class='Sadrzaj'>{$Novost->Sadrzaj}</div>\n<br>";
                            echo " <div class='Autor'>{$Novost->Autor}</div>\n";
                            echo " <div class='Vrijeme'>".date( $Novost->Vrijeme)."</div>\n";
                        echo "</div>\n";   
                    }
?>
                <div class="stream">
<?php
    date_default_timezone_set("Europe/Copenhagen");
    
    $folder = 'slike/';
    $filetype = '*.*';
    $files = glob($folder.$filetype);
    $count = count($files);
    
    $sortedArray = array();
        for ($i = 0; $i < $count; $i++) {
            $sortedArray[date ('YmdHis', filemtime($files[$i])) . $i] = $files[$i];
    }
    
    ksort($sortedArray);
    
    echo '<table>';
        foreach ($sortedArray as &$filename) {
            echo '<tr><td>';
                echo '<a name="'.$filename.'" href="#'.$filename.'"><img src="'.$filename.'" /></a><br>';
                echo substr($filename,strlen($folder),strpos($filename, '.')-strlen($folder));
            echo '</td></tr>';
    }
    echo '</table>';
?>
                </div>
            </div>
        </div>
    </body>
</html>