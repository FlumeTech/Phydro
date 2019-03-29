--TEST--
phydro_secretbox_*() functions
--SKIPIF--
<?php extension_loaded('phydro') || print 'skip';
--FILE--
<?php

$data = 'Lorem ipsum dolor';
$id = 1;
$context = str_repeat('a', PHYDRO_SECRETBOX_CONTEXTBYTES);
$key = phydro_secretbox_keygen();

$cipher = phydro_secretbox_encrypt($data, $key, $context, $id);
var_dump($cipher !== $data);

// Decrypts to original.
var_dump($data === phydro_secretbox_decrypt($cipher, $key, $context, $id));

// Probe verifies.
$probe = phydro_secretbox_probe_create($cipher, $key, $context);
var_dump(phydro_secretbox_probe_verify($probe, $cipher, $key, $context));

--EXPECT--
bool(true)
bool(true)
bool(true)
