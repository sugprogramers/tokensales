<?php
require_once 'application/third_party/CryptoCurrencyPHP/PointMathGMP.class.php';
require_once 'application/third_party/CryptoCurrencyPHP/SECp256k1.class.php';
require_once 'application/third_party/CryptoCurrencyPHP/Signature.class.php';
require_once 'application/third_party/php-keccak/Keccak.php';
use kornrunner\Keccak;

class ECSignatureUtils
{
    /**
    *
    * Recover address from message and ec signature
    *
    * @param    string  $msg the message in string format
    * @param    string  $signed the ec signature in string hex format with 0x prefix ex. "0x2341". Must be 132 chars long
    * @return   string  $address the address that signed the message in string hex format with 0x prefix.
    *
    */
    static function personal_ecRecover($msg, $signed) {
        $personal_prefix_msg = "\x19Ethereum Signed Message:\n". strlen($msg). $msg;
        $hex = ECSignatureUtils::keccak256($personal_prefix_msg);
        return ECSignatureUtils::ecRecover($hex, $signed);
    }
    
    /**
    *
    * Recover address from message and ec signature parts
    *
    * @param    string  $msg the message in string format
    * @param    integer  $v the v part of the signature in base 10 integer format.
    * @param    string  $r the r part of the signature in string hex format without 0x prefix.
    * @param    string  $s the s part of the signature in string hex format without 0x prefix.
    * @return   string  $address the address that signed the message in string format with 0x prefix.
    *
    */
    static function personal_ecRecover_vrs($msg, $v, $r, $s) {
        $personal_prefix_msg = "\x19Ethereum Signed Message:\n". strlen($msg). $msg;
        $hex = ECSignatureUtils::keccak256($personal_prefix_msg);
        return ECSignatureUtils::ecRecover_vrs($hex, $v, $r, $s);
    }
    
    static function ecRecover($hex, $signed) {
        $rHex   = substr($signed, 2, 64);
        $sHex   = substr($signed, 66, 64);
        $vValue = hexdec(substr($signed, 130, 2));
        $messageHex       = substr($hex, 2);
        $messageByteArray = unpack('C*', hex2bin($messageHex));
        $messageGmp       = gmp_init("0x" . $messageHex);
        $r = $rHex;		//hex string without 0x
        $s = $sHex; 	//hex string without 0x
        $v = $vValue; 	//27 or 28
        //with hex2bin it gives the same byte array as the javascript
        $rByteArray = unpack('C*', hex2bin($r));
        $sByteArray = unpack('C*', hex2bin($s));
        $rGmp = gmp_init("0x" . $r);
        $sGmp = gmp_init("0x" . $s);
        $recovery = $v - 27;
        if ($recovery !== 0 && $recovery !== 1) {
            throw new Exception('Invalid signature v value');
        }
        $publicKey = Signature::recoverPublicKey($rGmp, $sGmp, $messageGmp, $recovery);
        $publicKeyString = $publicKey["x"] . $publicKey["y"];
        return '0x'. substr(ECSignatureUtils::keccak256(hex2bin($publicKeyString)), -40);
    }
    
    static function ecRecover_vrs($hex, $v, $r, $s) {
        $rHex   = $r;
        $sHex   = $s;
        $vValue = $v;
        $messageHex       = substr($hex, 2);
        $messageByteArray = unpack('C*', hex2bin($messageHex));
        $messageGmp       = gmp_init("0x" . $messageHex);
        $r = $rHex;		//hex string without 0x
        $s = $sHex; 	//hex string without 0x
        $v = $vValue; 	//27 or 28
        //with hex2bin it gives the same byte array as the javascript
        $rByteArray = unpack('C*', hex2bin($r));
        $sByteArray = unpack('C*', hex2bin($s));
        $rGmp = gmp_init("0x" . $r);
        $sGmp = gmp_init("0x" . $s);
        $recovery = $v - 27;
        if ($recovery !== 0 && $recovery !== 1) {
            throw new Exception('Invalid signature v value');
        }
        $publicKey = Signature::recoverPublicKey($rGmp, $sGmp, $messageGmp, $recovery);
        $publicKeyString = $publicKey["x"] . $publicKey["y"];
        return '0x'. substr(ECSignatureUtils::keccak256(hex2bin($publicKeyString)), -40);
    }
    
    static function strToHex($string)
    {
        $hex = unpack('H*', $string);
        return '0x' . array_shift($hex);
    }
    
    static function keccak256($str) {
        return '0x'. Keccak::hash($str, 256);
    }
}