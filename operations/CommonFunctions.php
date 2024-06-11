<?php

// Define the salts
define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

/**
 * Hashes the given password using SHA1 and MD5 algorithms with optional salts.
 *
 * @param string $pPassword The password to be hashed.
 * @param string $pSalt1 The first optional salt parameter. Default is '2345#$%@3e'.
 * @param string $pSalt2 The second optional salt parameter. Default is 'taesa%#@2%^#'.
 * @return string The hashed password.
 */
function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
    // Concatenate the salts and the password
    $combined = $pSalt2 . $pPassword . $pSalt1;
    
    // Apply MD5 hashing
    $md5Hash = md5($combined);
    
    // Apply SHA1 hashing
    $hashedPassword = sha1($md5Hash);
    
    return $hashedPassword;
}
