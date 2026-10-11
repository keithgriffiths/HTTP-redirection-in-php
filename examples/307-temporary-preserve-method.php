<?php
/** Temporary redirect preserving the HTTP method and request body (307). */
declare(strict_types=1);

header('Location: https://example.com/temporary-endpoint/', true, 307);
exit;
