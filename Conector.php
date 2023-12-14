<?php
class Conector {
  private $pdo;

  public function __construct()
  {
    $this->pdo = new \PDO(
      "pgsql:host=localhost;port=5432;dbname=dbusers;",
      "postgres",
      "111",
      [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION]
    );

    $tableScripts = $this->execute(
      "SELECT EXISTS (SELECT 1 FROM PG_TABLES WHERE TABLENAME = 'adusers' and schemaname = 'public') AS TABLEEXISTENCE"
    )[0];

    if(!$tableScripts["tableexistence"]) {
      $this->execute(
        "CREATE TABLE ADUSERS (
          CDUSER SERIAL PRIMARY KEY,
          NMUSER VARCHAR(100) NOT NULL,
          IDLOGIN VARCHAR(50) NOT NULL,
          PSLOGIN VARCHAR(255) NOT NULL
        )"
      );

      $this->execute(
        "INSERT INTO ADUSERS(NMUSER,IDLOGIN,PSLOGIN)
        VALUES(:nmuser,:idlogin,:pslogin)",
        ["nmuser"=>"admin","idlogin"=>"admin","pslogin"=>password_hash('111',PASSWORD_BCRYPT)]
      );
    }
  }

  public function execute($sql, $params = null, $isInsert = false){
    $statement=$this->pdo->prepare($sql);
    $statement->execute($params);

    if ($isInsert) {
       return $this->pdo->lastInsertId();
    }

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}

$conector=new Conector();