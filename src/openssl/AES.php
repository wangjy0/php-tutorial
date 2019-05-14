<?php
/**
 *
 */

class AES
{
    public static function PKCS5_Encrypt($text, $key, $iv = '1234567812345678')
    {
        $blockSize = 16;
        $text = self::pkcs5_pad($text, $blockSize);
        $enc = openssl_encrypt($text, 'aes-128-cbc' , $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv);
        return bin2hex($enc);
    }

    public static function PKCS5_Decrypt($text, $key, $iv = '1234567812345678')
    {
        $text = hex2bin($text);
        $decrypted = openssl_decrypt($text, 'aes-128-cbc', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv);
        $decrypted = self::pkcs5_unpad($decrypted);
        return $decrypted;
    }

    private static function pkcs5_pad($text, $blockSize)
    {
        $pad = $blockSize - (strlen($text) % $blockSize);
        return $text . str_repeat(chr($pad), $pad);
    }

    private static function pkcs5_unpad($text)
    {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text)) {
            return false;
        }
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }
}