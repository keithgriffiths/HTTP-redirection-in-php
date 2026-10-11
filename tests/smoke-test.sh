#!/usr/bin/env bash
# Optional: run after starting `php -S 127.0.0.1:8000` in the repository root.
set -euo pipefail
headers=$(curl --silent --show-error --head http://127.0.0.1:8000/)
printf '%s\n' "$headers"
printf '%s\n' "$headers" | grep -qE '^HTTP/[^ ]+ 302 '
printf '%s\n' "$headers" | grep -qi '^Location: https://example.com/'
printf 'Smoke test passed\n'
