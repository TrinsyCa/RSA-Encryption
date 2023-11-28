<?php

require 'vendor/autoload.php';

use phpseclib3\Crypt\RSA;

// Yeni bir RSA anahtar çifti oluşturun
$privateKey = RSA::createKey(2048);
$publicKey = $privateKey->getPublicKey();

// Private ve Public anahtarları string olarak alın
$privateKeyString = $privateKey->toString('PKCS8');
$publicKeyString = $publicKey->toString('PKCS8');

$privateKeyString = preg_replace('/-----BEGIN PRIVATE KEY-----/', '', $privateKeyString);
$privateKeyString = preg_replace('/-----END PRIVATE KEY-----/', '', $privateKeyString);
$privateKeyString = trim($privateKeyString);

$publicKeyString = preg_replace('/-----BEGIN PUBLIC KEY-----/', '', $publicKeyString);
$publicKeyString = preg_replace('/-----END PUBLIC KEY-----/', '', $publicKeyString);
$publicKeyString = trim($publicKeyString);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Generator</title>

    <link rel="shortcut icon" href="https://www.freepnglogos.com/uploads/key-png/key-icon-housing-and-residential-life-28.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital@0;1&display=swap" rel="stylesheet">

    <style>
        *:not(.key textarea)
        {
            font-family: 'Raleway', sans-serif;
        }
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: white;
        }
        ::selection
        {
            background-color: white;
            color: black;
        }
        body
        {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 98vh;
            gap: 25px;
            background-color: rgba(35,35,35);
        }
        .keys
        {
            display:flex;
            align-items:center;
            justify-content:center;
            gap: 25px;
        }
        .key
        {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        .key p
        {
            font-size: 24px;
        }
        .key textarea
        {
            padding: 10px 15px;
            border-radius: 15px;
            background-color: rgba(0,0,0,0.15);
            outline: 2px solid rgba(0,0,0,0.05);
            font-size: 18px;
            height: 0;
            width: 666px;
            resize: none;
            text-align: center;
            transition: 0.3s;
            animation: textareaanim 1s ease-in-out forwards;
            box-shadow: 0 0 10px black;
        }
        @keyframes textareaanim {
            0%
            {
                height: 0;
            }
            100%
            {
                height: 571px;
            }
        }
        @keyframes textareaanim-refresh {
            0%
            {
                height: 571px;
            }
            50%
            {
                height: 0;
            }
            100%
            {
                height: 571px;
            }
        }
        .key textarea:hover,
        .key textarea:active
        {
            background-color: rgba(255,255,255,0.1);
            outline: 2px solid rgba(255,255,255,0.4) !important;
        }
        .refresh
        {
            text-decoration: none;
            color: white;
            background-color: black;
            padding: 10px 15px;
            border-radius: 15px;
            transition: 0.6s;
            font-size: 20px;
        }
        .refresh:hover
        {
            scale: 1.2;
            border-radius: 50px;
        }
        .refresh:active
        {
            scale: 0.9;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="keys">
        <div class="key">
            <p>Private Key</p>
            <textarea class="key_box" name="privateKey" readonly><?php echo $privateKeyString; ?></textarea>
        </div>
        <div class="key">
            <p>Public Key</p>
            <textarea class="key_box" name="publicKey" readonly><?php echo $publicKeyString; ?></textarea>
        </div>
    </div>
    <button onclick="refresh();" class="refresh">Anahtarları Yenile</button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function refresh()
        {
            $.post("generate_key.php", function(response) {
                $('.key_box').each(function() {
                var el = $(this);
                el.css('animation', 'none');
                setTimeout(function() {
                        el.css('animation', 'textareaanim-refresh 1s ease-in-out forwards');
                    }, 10); // Bu, animasyonun sıfırlanmasını ve yeniden başlamasını sağlar
                }); 
                var keys = JSON.parse(response);
                $('textarea[name="privateKey"]').val(keys.privateKey);
                $('textarea[name="publicKey"]').val(keys.publicKey);
            })
            .fail(function() {
                console.log("Anahtar oluşturulurken bir hata oluştu");
            });
        }
    </script>
</body>
</html>