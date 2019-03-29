--TEST--
phydro_kdf_*() functions
--SKIPIF--
<?php extension_loaded('phydro') || print 'skip';
--FILE--
<?php

$key = phydro_kdf_keygen();
$key2 = phydro_kdf_keygen();
$context = str_repeat('a', PHYDRO_KDF_CONTEXTBYTES);
$context2 = str_repeat('b', PHYDRO_KDF_CONTEXTBYTES);
$len = PHYDRO_KDF_BYTES_MIN;

// Same len/id/context generates same key.
$subkey = phydro_kdf_derive_from_key($key, $context, 1, $len);
var_dump($subkey === phydro_kdf_derive_from_key($key, $context, 1, $len));

// Differing any one value generates different key.
var_dump($subkey !== phydro_kdf_derive_from_key($key, $context, 2, $len));
var_dump($subkey !== phydro_kdf_derive_from_key($key, $context, 1, $len+1));
var_dump($subkey !== phydro_kdf_derive_from_key($key, $context2, 1, $len));
var_dump($subkey !== phydro_kdf_derive_from_key($key2, $context, 1, $len));
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
