<!DOCTYPE html>
<html>
    <head>
        <title>Dodavanje novosti | Novosti</title>
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
<?php
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $extension = end(explode(".", $_FILES["file"]["name"]));
        if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 50000)
                    && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {
                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
                
                if (file_exists("C:/xampp/htdocs/Novosti/admin/slike/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " already exists. ";
                }
                    else
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                        "C:/xampp/htdocs/Novosti/admin/slike/" . $_FILES["file"]["name"]);
                        $tmp = "C:/xampp/htdocs/Novosti/admin/slike/" . $_FILES["file"]["name"];
                        echo $tmp;
                    }
            }
        }
        else
        {
            echo "Invalid file";
        }
?>
        <div class="jumbotron">
        Natrag na
        <br>
        <br>
        <a href="content.php">Listu novosti</a>
        <br>
        <br>
        <br>
        <img src="../logo/right.jpg" alt="Logo"/>
        </div>
    </body>
</html>



