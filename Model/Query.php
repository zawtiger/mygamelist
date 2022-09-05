<?php

final class Query extends DatabaseConfig
{

  function connect(){

    try {
      $dsn = 'mysql:host=' . DatabaseConfig::DB_HOST . '; dbname=' . DatabaseConfig::DB_NAME;
      $pdo = new PDO($dsn,DatabaseConfig::DB_USER, DatabaseConfig::DB_PASS);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    return $pdo;
  }


  public function getQuery($sql,$prep){
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($prep);
    return $stmt->fetchAll();
      }

  public function getOneQuery($sql,$prep){
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($prep);
    return $stmt->fetch();
  }

  public function getQueryError($sql,$prep){
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($prep);
    return $stmt->errorInfo();
                //$stmt->errorCode(); // 1062 Duplicate error
    }

}
