<?php

require 'vendor/autoload.php';

use phpseclib3\Crypt\RSA;

// İsteğin POST olduğunu kontrol et (opsiyonel)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $privateKey = RSA::createKey(2048);
    $publicKey = $privateKey->getPublicKey();

    $privateKeyString = $privateKey->toString('PKCS8');
    $publicKeyString = $publicKey->toString('PKCS8');

    $privateKeyString = preg_replace('/-----BEGIN PRIVATE KEY-----/', '', $privateKeyString);
    $privateKeyString = preg_replace('/-----END PRIVATE KEY-----/', '', $privateKeyString);
    $privateKeyString = trim($privateKeyString);

    $publicKeyString = preg_replace('/-----BEGIN PUBLIC KEY-----/', '', $publicKeyString);
    $publicKeyString = preg_replace('/-----END PUBLIC KEY-----/', '', $publicKeyString);
    $publicKeyString = trim($publicKeyString);

    echo json_encode([
        'privateKey' => $privateKeyString,
        'publicKey' => $publicKeyString
    ]);
}