<?php
// Create a password class to handle management of this:
class Password
{
    const SALT = 'MyVoiceIsMyPassport';

    /**
     * @param string $password
     */
    public static function hash($password)
    {
        return hash('sha512', self::SALT.$password);
    }

    /**
     * @param string $password
     * @param string $hash
     */
    public static function verify($password, $hash)
    {
        return hash_equals($hash, self::hash($password));
    }
}

// Hash the password:
$hash = Password::hash('correct horse battery staple');

// Check against an entered password (This example will fail to verify)
if (Password::verify('correct horse battery staple', $hash)) {
    echo 'Correct Password!'.PHP_EOL;
} else {
    echo 'Incorrect login attempt!'.PHP_EOL;
}
