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

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="alertBox" id="alertBox">
        <div class="alertContainer">
            <h1 id="alertTitle"></h1>
            <p id="alertText"></p>
        </div>
    </div>
    <div class="alertBox questBox privacyBox" id="privacyBox">
        <div class="alertContainer">
            <?php include("privacy-policy.php"); ?>
        </div>
    </div>
    <div class="alertBox questBox" id="questBox">
        <div class="alertContainer">
            <?php include("about-rsa.php"); ?>
        </div>
    </div>
    <br>
    <h1 class="header"><button class="privacy-btn" onclick="privacy();"><i class="fa-solid fa-user-lock" aria-hidden="true"></i></button> RSA Encryption <button class="quest-btn" onclick="quest();"><i class="fa-solid fa-question"></i></button></h1>
    <br><br>
    <?php 
        $privateKeyString = "";
        $publicKeyString = "";
    ?>
    <div class="keys">
        <div class="key">
            <p>Private Key</p>
            <div class="txtArea" onclick="copyKey(this);">
                <textarea class="key_box" name="privateKey" readonly><?php echo $privateKeyString; ?></textarea>
            </div>
        </div>
        <div class="key">
            <p>Public Key</p>
            <div class="txtArea" onclick="copyKey(this);">
                <textarea class="key_box" name="publicKey" readonly><?php echo $publicKeyString; ?></textarea>
            </div>
        </div>
    </div>
    <br>
    <button onclick="refresh();" class="refresh">New Keys</button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>