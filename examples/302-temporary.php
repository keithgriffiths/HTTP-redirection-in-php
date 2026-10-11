<?php
/** Temporary redirect (302): good for short-term changes. */
declare(strict_types=1);

header('Location: https://example.com/', true, 302);
exit;
