<?php

class Connection
{
  private ?PDO $conn = null;

  public function __construct(
    private readonly string $host,
    private readonly string $user,
    private readonly string $password,
    private readonly string $database,
    private readonly int $port = 3306
  ) {
  }

  public function connect(): PDO
  {
    $dsn = "mysql:host={$this->host};dbname={$this->database}";

    try {
        $this->conn = new PDO($dsn, $this->user, $this->password);
        $this->conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->conn;
    } catch(PDOException $e) {
        throw new ErrorException("connection failed: " . $e->getMessage());
    }
  }

  public static function getInstance(): self
  {
    $username = 'root';
    $password = '';
    $host = 'localhost';
    $database = 'myfirstwebsite';
    $port = 3306;

    return new self($host, $username, $password, $database, $port);
  }
}