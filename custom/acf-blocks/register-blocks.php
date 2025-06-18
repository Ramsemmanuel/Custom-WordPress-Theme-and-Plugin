<?php
add_action('acf/init', function () {
  if (function_exists('acf_register_block_type')) {
    acf_register_block_type(__DIR__ . '/acf-blocks/hero/block.json');
    acf_register_block_type(__DIR__ . '/acf-blocks/latest-posts/block.json');
  }
});
