<?php
    $title = "What is RSA Encryption ?";

    $about = "RSA encryption is a widely used method to secure sensitive information over the internet. Named after its inventors, Ron Rivest, Adi Shamir, and Leonard Adleman, RSA relies on the mathematical properties of prime numbers.

    In simple terms, RSA encryption serves two main purposes: confidentiality and authentication. It encrypts data to ensure that only authorized parties can access and understand it. Additionally, RSA enables the verification of the sender's identity, ensuring that the information has not been tampered with during transmission.

    The core concept involves the use of public and private keys. The public key is shared openly and used to encrypt data, while the private key, known only to the recipient, decrypts the information. The mathematical complexity of factoring large prime numbers makes it computationally infeasible for unauthorized parties to decipher the encrypted data without the private key.

    In summary, RSA encryption provides a secure and reliable method for transmitting sensitive information across the internet, safeguarding confidentiality and ensuring the authenticity of the communicating parties.";

    $by = "ChatGPT";
?>

<h1 class="alertTitle"><?php echo nl2br($title); ?> <button class="closeBtn" onclick="closeQuest();"><i class="fa-solid fa-x"></i></button></h1>
<p class="alertText">
    <?php echo nl2br($about); ?>
</p>
<div class="alertBottom">
    <span></span>
    <p><?php echo nl2br($by); ?></p>
</div>