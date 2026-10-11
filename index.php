<?php
/**
 * Basic temporary redirect (HTTP 302).
 *
 * Replace the destination with an absolute HTTPS URL that you control.
 * This file must send headers before any HTML or whitespace output.
 */

declare(strict_types=1);

$destination = 'https://example.com/';

header('Location: ' . $destination, true, 302);
exit;
