<?php
/** Permanent redirect preserving the HTTP method and request body (308). */
declare(strict_types=1);

header('Location: https://example.com/permanent-endpoint/', true, 308);
exit;
