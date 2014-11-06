<!DOCTYPE html>
<html>
    <head>
        <title>Kontakt | Novosti</title>
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
            <img src="../logo/right.jpg" alt="Logo" class="slika"/>
            <br>
            <br>
            <br>
            <br>
            <br>
<?php
    if(isset($_POST['email'])) {
        $email_to = "anelmemija@gmail.com";
        $email_subject = "Novosti";
        function died($error) {
            echo "Žao nam je ali nismo u mogućnosti da proslijedimo Vašu poruku. ";
            echo "Postoje greške u Vašem zahtjevu.<br /><br /><br />";
            echo $error."<br />";
            echo "Molimo Vas da ispraviti uočene greške i probate ponovo.<br /><br /><br />";
            echo "Natrag na.<br /><br />";
            echo "<a href=contactform.html>Kontakt</a>";
            die();
        }
        if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
            died('Žao nam je ali izgleda da postoje greške u Vašem zahtjevu.');
        }
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email_from = $_POST['email'];
            $telephone = $_POST['telephone'];
            $comments = $_POST['comments'];
                $error_message = "";
                    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                        if(!preg_match($email_exp,$email_from)) {
                            $error_message .= 'Izgleda da e-mail adresa koju ste unijeli nije važeća.<br />';
                        }
                            if(strlen($comments) < 2) {
                                $error_message .= 'Vaš komentar je prekratak.<br />';
                                
                            }
                                if(strlen($error_message) > 0) {
                                    died($error_message);
                                }
        $email_message = "Detalji\n";
            function clean_string($string) {
                $bad = array("content-type","bcc:","to:","cc:","href");
                return str_replace($bad,"",$string);
            }
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
    
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>
        </div>
        <div class="jumbotron">
            <p>Hvala na poruci. Odgovorti cemo Vam sto prije.</p>
            <br>
            <br>
            <p>Natrag na</p>
            <br>
            <br>
            <br>
            <a href="../index.html">Početna</a>
        </div>
    </body>
</html>
<?php
    }
?>