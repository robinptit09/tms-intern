<?php

/*
  |--------------------------------------------------------------------------
  | Application constants
  |--------------------------------------------------------------------------
  |
 */
// check if DEFINE_CONSTANT is defined.
// usually this file is not loaded twice or more,
// but this file is loaded during every unit test is called.

if (!defined('DEFINE_CONSTANT')) {
    define('DEFINE_CONSTANT', 1);
    // Common
    define('ACTIVE', 1);
    define('PAGE_SIZE', 10);
}

