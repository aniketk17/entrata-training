<?php


namespace App\Models;

use App\Core\Database;

class Url
{
    private \PDO $pdo;

    private array $data = [];

    private const URL_PATTERN = '/^(https?:\/\/)?([\w\-])+\.{1}([a-zA-Z]{2,63})([\\/\\w\\.-]*)*\\/?$/';
    
    public function __construct(?\PDO $pdo = null)
    {
        $this->pdo = $pdo ?? Database::getInstance()->getConnection();
    }

    public function __get(string $name): mixed
    {
        return $this->data[$name] ?? null;
    }


    public function __set(string $name, mixed $value): void
    {
        $this->data[$name] = $value;
    }


    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }


    public function isValidUrl(string $url): bool
    {
        return (bool) preg_match(self::URL_PATTERN, $url);
    }

    public function generateCode(int $length = 6): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        do {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $chars[random_int(0, strlen($chars) - 1)];
            }
        } while ($this->findByCode($code) !== null); 

        return $code;
    }


    public function create(string $originalUrl): array
    {
        $code = $this->generateCode();

        $stmt = $this->pdo->prepare(
            'INSERT INTO urls (original_url, short_code) VALUES (:url, :code)'
        );
        $stmt->execute([':url' => $originalUrl, ':code' => $code]);

        return [
            'id'           => (int) $this->pdo->lastInsertId(),
            'original_url' => $originalUrl,
            'short_code'   => $code,
            'clicks'       => 0,
            'created_at'   => date('Y-m-d H:i:s'),
        ];
    }

    public function findByCode(string $code): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM urls WHERE short_code = :code LIMIT 1');
        $stmt->execute([':code' => $code]);
        $row = $stmt->fetch();
        return $row ?: null;
    }


    public function incrementClicks(string $code): void
    {
        $this->pdo->prepare('UPDATE urls SET clicks = clicks + 1 WHERE short_code = :code')
                  ->execute([':code' => $code]);
    }


    public function all(): array
    {
        return $this->pdo->query('SELECT * FROM urls ORDER BY created_at DESC')->fetchAll();
    }
}
