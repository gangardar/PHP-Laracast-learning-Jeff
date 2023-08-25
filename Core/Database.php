<?php

namespace Core;

use PDO;
class Database
{
    public $connection;

    public $statement;

    public function __construct($config,$user='gan-gar-dar',$password='ubuntu')
    {

        $dsn = 'mysql:'.http_build_query($config, '',';');

        $this->connection = new PDO($dsn, $user, $password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;

    }

    public function getAll(){
        return $this->statement->fetchAll();
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
      $result = $this->find();

      if(!$result){
          abort(404);
      }

      return $result;

    }
}