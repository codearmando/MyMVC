<?php


class Orm
{
    // paramteros protegidos
    // protected $id;#almacenar el identificador de la tabla
    protected $table; #almacenar el nombre de tabla
    protected $db; #almacenar el nombre de la base de datos 


    public function __construct($table, $connection)
    {
        // $this->id= $id;
        $this->table = $table;
        $this->db = $connection;
    }

    public function getAll($params = null, $colCondition = null, $valor = null)
    {

        if ($params != null && $colCondition != null  && $valor != null) {
            $sql = "SELECT $params FROM {$this->table} WHERE $colCondition =  :id";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(":id", $valor);
            $stm->execute();
            return $stm->fetch();
        } else if ($params != null) {
            $sql = "SELECT $params FROM {$this->table}";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }
    }

    // public function getById($params, $condicion)
    // {
    //     $sql = "SELECT $params FROM {$this->table} WHERE id =  :id";
    //     $stm = $this->db->prepare($sql);
    //     $stm->bindValue(":id", $condicion);
    //     $stm->execute();
    //     return $stm->fetch();
    // }

    public function DeleteById($param,$data)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$param} = :id";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(":id", $data);
        $stm->execute();
    }

    public function Update($params, $condition, $data)
    {

        $sql = "UPDATE {$this->table} SET ";
        foreach ($params as $key => $value) { #foreach indicar las columnas de la tablas 
            $sql .= "{$key} = :{$key},"; #coma al final para separar las cantidad de columnas a modificar
        }
        $sql = trim($sql, ','); #eliminar la ultima coma que sobra al final
        $sql .= " WHERE $condition = :data";

        $stm = $this->db->prepare($sql);
        #pasar los valores
        foreach ($params as $key => $value) { #foreach indicar los parametros
            $stm->bindValue(":{$key}", $value);
        }

        $stm->bindValue(":data", $data);
        $stm->execute();

        // $sql = "UPDATE {$this->table} SET nombre = :nombre , apellido = :apellido WHERE ID = 1";
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table} (";
        foreach ($data as $key => $value) {
            $sql .= "{$key},";
        }
        $sql = trim($sql, ',');
        $sql .= ") VALUES (";

        foreach ($data as $key => $value) {
            $sql .= ":{$key},";
        }
        $sql = trim($sql, ',');
        $sql .= ")";

        $stm = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }

        $stm->execute();
    }
}
