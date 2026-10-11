<?php
/** Permanent redirect (301): use for a URL moved permanently. */
declare(strict_types=1);

header('Location: https://example.com/new-page/', true, 301);
exit;
