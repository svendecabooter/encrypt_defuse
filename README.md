# Encrypt Defuse module

This module provides an EncryptionMethod plugin for the Encrypt module.
It offers authenticated encryption based on AES-128 CBC with HMAC-SHA256 
authentication. It uses the Defuse PHP Encryption library 
(https://github.com/defuse/php-encryption) to do so.

## INSTALLATION

1. Make sure you have the composer_manager module installed according to its 
   README.txt, so you will be able to run the "composer drupal-update" command.
   Alternatively, you should make sure the composer dependencies for this module
   are met in another way.
2. Download and install encrypt_defuse module.
   See https://www.drupal.org/documentation/install/modules-themes/modules-8
3. Run "composer drupal-update" to install the Defuse PHP Encryption library.
4. Go to /admin/config/system/encryption and select the Encrypt Defuse OpenSSL 
   encryption method when creating a new encryption profile. 
