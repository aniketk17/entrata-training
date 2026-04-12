<?php
/**
 * app/Controllers/UrlController.php
 *
 * Handles all URL-related HTTP actions.
 * All public methods emit JSON (except redirect()).
 */

namespace App\Controllers;

use App\Models\Url;

class UrlController
{
    private Url $model;

    public function __construct()
    {
        $this->model = new Url();
    }

    // ── Helper: send a JSON response and stop ─────────────────────────────────
    private function json(array $payload, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    // ── Helper: read raw JSON request body ────────────────────────────────────
    private function inputJson(): array
    {
        $raw = file_get_contents('php://input');
        return json_decode($raw, true) ?? [];
    }

    // ── POST /api/shorten ─────────────────────────────────────────────────────
    public function shorten(): void
    {
        $body = $this->inputJson();
        $url  = trim($body['url'] ?? '');

        if (!$url) {
            $this->json(['status' => 'error', 'message' => 'The "url" field is required.'], 422);
        }

        // ── Regex validation ──────────────────────────────────────────────────
        if (!$this->model->isValidUrl($url)) {
            $this->json(['status' => 'error', 'message' => 'Invalid URL format.'], 422);
        }

        try {
            $row      = $this->model->create($url);
            $base     = rtrim($_ENV['APP_BASE_URL'] ?? 'http://localhost', '/');
            $shortUrl = $base . '/' . $row['short_code'];

            $this->json([
                'status' => 'success',
                'data'   => [
                    'id'           => $row['id'],
                    'original_url' => $row['original_url'],
                    'short_url'    => $shortUrl,
                    'short_code'   => $row['short_code'],
                    'clicks'       => $row['clicks'],
                    'created_at'   => $row['created_at'],
                ],
            ], 201);

        } catch (\Throwable $e) {
            $this->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    // ── GET /api/urls ─────────────────────────────────────────────────────────
    public function index(): void
    {
        try {
            $urls = $this->model->all();
            $base = rtrim($_ENV['APP_BASE_URL'] ?? 'http://localhost', '/');

            // Attach short_url to each row
            $urls = array_map(fn($row) => array_merge($row, [
                'short_url' => $base . '/' . $row['short_code'],
            ]), $urls);

            $this->json(['status' => 'success', 'data' => $urls]);

        } catch (\Throwable $e) {
            $this->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    // ── GET /{code} — redirect ────────────────────────────────────────────────
    public function redirect(array $params): void
    {
        $code = $params['code'] ?? '';
        $row  = $this->model->findByCode($code);

        if (!$row) {
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => "Short code '{$code}' not found."]);
            exit;
        }

        // Track the click
        $this->model->incrementClicks($code);

        // Redirect to the original URL
        header('Location: ' . $row['original_url'], true, 302);
        exit;
    }
}
