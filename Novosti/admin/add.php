<?php
    $DB = mysql_connect('localhost', 'root', 'A.M.root00001');
        if (!$DB) die('Dogodio se problem prilikom povezivanja na server.');
            if (!mysql_select_db('novosti')) die('Dogodio se problem prilikom povezivanja sa bazom podataka.');
    $Naslov = mysql_real_escape_string($_REQUEST['Naslov']);
    $Opis = mysql_real_escape_string($_REQUEST['Opis']);
    $Sadrzaj = mysql_real_escape_string($_REQUEST['Sadrzaj']);
    $Autor = mysql_real_escape_string($_REQUEST['Autor']);
        $Upit = "insert into Novosti (Naslov, Opis, Sadrzaj, Autor, Vrijeme) values ('$Naslov', '$Opis', '$Sadrzaj', '$Autor', now());";
            $Rezultat = mysql_query($Upit, $DB);
                if (mysql_error($DB)) die(mysql_error($DB));
                    header('Location: content.php');
?>