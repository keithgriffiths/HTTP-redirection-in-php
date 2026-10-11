# HTTP Redirection in PHP

Simple, self-contained examples of HTTP redirects in PHP 8+, using `header()` and `exit`.

> **Important:** Replace all `https://example.com/` URLs with your intended absolute HTTPS destination before deploying. The root `index.php` demonstrates a **302 temporary redirect**, not a 301 permanent migration.

## Quick start

```php
<?php
declare(strict_types=1);

header('Location: https://example.com/', true, 302);
exit;
```

1. Upload `index.php` to a PHP-enabled server.
2. Replace the example destination with a trusted absolute HTTPS URL.
3. Ensure no HTML, whitespace, or BOM is emitted before `header()`.
4. Request the endpoint with `curl -I https://your-domain.example/redirect.php` to inspect `Location` and the status code.

## Which redirect code?

| Code | Meaning | Notes |
| --- | --- | --- |
| 301 | Moved Permanently | Typical for permanent website/page migrations; clients may cache it. |
| 302 | Found / temporary | Suitable for a temporary page redirect; method handling can vary. |
| 307 | Temporary Redirect | Preserves the request method and body. |
| 308 | Permanent Redirect | Preserves the request method and body; may be cached. |

Examples live under [`examples/`](examples/). Choose one appropriate to your use case; do **not** deploy all of them as routes without planning.

## Security and operational notes

- Do **not** form a `Location` value directly from untrusted query parameters, unless you strictly validate destinations against an explicit allowlist. Otherwise, you risk creating an open redirect.
- Prefer full `https://` destinations rather than dynamically accepting arbitrary URL strings.
- Call `exit;` after setting `Location` to ensure the original script does not continue executing.
- `header()` must run before response output, and the response must not already be committed.
- Use **301/308** only when you intend a permanent move; caches and search engines can remember these redirects.
- For high-volume static redirects, a web-server or CDN rule is often more efficient than PHP.
- `header('Location: ...')` usually defaults to 302, but making the HTTP status explicit is clearer.

## Test

PHP CLI installed? Check syntax on each script:

```bash
php -l index.php
php -l examples/301-permanent.php
php -l examples/302-temporary.php
php -l examples/307-temporary-preserve-method.php
php -l examples/308-permanent-preserve-method.php
```

For a functional check, run `php -S 127.0.0.1:8000` from the project directory and in another terminal run:

```bash
curl -I http://127.0.0.1:8000/
```

Expected output includes `HTTP/1.1 302 Found` and `Location: https://example.com/`.

## Licence

The code examples are provided under the MIT licence, unless you prefer to retain a different existing licence from your repository. Check your original repository licence before replacing it.
