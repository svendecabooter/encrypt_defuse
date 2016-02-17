<?php

/**
 * @file
 * Contains \Drupal\encrypt_defuse\Plugin\EncryptionMethod\DefuseAESEncryptionMethod.
 */

namespace Drupal\encrypt_defuse\Plugin\EncryptionMethod;

use Drupal\encrypt\EncryptionMethodInterface;
use Drupal\encrypt\Plugin\EncryptionMethod\EncryptionMethodBase;
use Crypto;

/**
 * Class DefuseAESEncryptionMethod.
 *
 * @EncryptionMethod(
 *   id = "defuse_aes",
 *   title = @Translation("Defuse OpenSSL AES"),
 *   description = "OpenSSL authenticated encryption based on AES-128 CBC with HMAC-SHA256",
 *   key_type = {"aes_encryption"}
 * )
 */
class DefuseAESEncryptionMethod extends EncryptionMethodBase implements EncryptionMethodInterface {

  /**
   * {@inheritdoc}
   */
  public function checkDependencies($text = NULL, $key = NULL) {
    $errors = array();

    if (!class_exists('Crypto')) {
      $errors[] = t('Defuse PHP Encryption library is not correctly installed.');
    }

    // Version 1.2.* of the Defuse library requires a 128bit key.
    // @TODO: check if used library is 2.x instead. Then key size should be
    // 256 bits.
    if (strlen($key) != 16) {
      $errors[] = t('This encryption method requires a 128 bit key.');
    }

    return $errors;
  }

  /**
   * {@inheritdoc}
   */
  public function encrypt($text, $key, $options = array()) {
    return Crypto::Encrypt($text, $key);
  }

  /**
   * {@inheritdoc}
   */
  public function decrypt($text, $key, $options = array()) {
    return Crypto::Decrypt($text, $key);
  }

}
