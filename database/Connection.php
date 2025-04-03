<?php

class Connection
{
  private ?mysqli $conn = null;

  public function __construct(
    private readonly string $host,
    private readonly string $user,
    private readonly string $password,
    private readonly string $database,
    private readonly int $port = 3306
  ) {
  }

  public function connect()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function close()
  {
    $this->conn->close();
  }

  public function query($sql)
  {
    $result = $this->conn->query($sql);
    if ($result === false) {
      die("Query failed: " . $this->conn->error);
    }
    return $result;
  }

  public function fetchAll($result)
  {
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  
  public function fetch($result)
  {
    return $result->fetch_assoc();
  }
  
  public function escape($string)
  {
    return $this->conn->real_escape_string($string);
  }

  public static function getInstance(): self
  {
    $username = 'sql8770984';
    $password = '';
    $host = 'sql8.freesqldatabase.com';
    $database = 'sql8770984';
    $port = 3306;
    $password = 'cYw9J6l4lQ';

    return new self($host, $username, $password, $database, $port);
  }
}