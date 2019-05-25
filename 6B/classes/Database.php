<?php

class Database{
//connect to database
private static $INSTANCE = null;
private $mysqli,
        $host = 'localhost',
        $user = 'root',
        $pass = '123456',
        $dbname = 'bootcamp';

public function __construct()
{
    $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (mysqli_connect_error()) {
            echo "gagal terhubung!";
        }
}

public static function getInstance()
{
    if (!isset(self::$INSTANCE)) {
        self::$INSTANCE = new Database;
    }

    return self::$INSTANCE;
}

public function insert($table, $fields = array())
{
    $kolom = implode(", ", array_keys($fields));
    
    $valuesArrays = array();
    $i = 0;
    foreach ($fields as $key =>$value) {
        if (is_int($value)) {
            $valuesArrays[$i] = $value;
        }else{
            $valuesArrays[$i] = "'".$value."'";
        }
        $i++;
    }   
    
    $nilai = implode(", ", $valuesArrays);

    $query = "INSERT INTO $table ($kolom) VALUES ($nilai)";
    if ($this->mysqli->query($query)) {
        header('Location: index.php');
    }else{
        die("Gagal tambah!");
    }
}

public function showUser()
{
    $query = "SELECT * FROM users";
    $result = $this->mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    return $results;
}

public function showSkill($id)
{
    $query = "SELECT * FROM skills WHERE user_id = $id";
    $result = $this->mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    return $results;
}

public function getJsonData()
{
    $query = "SELECT users.*, skills.nama_skill FROM users LEFT JOIN skills ON users.id = skills.user_id";
    $result = $this->mysqli->query($query);
    $response = [];
    $response['data']  = [];
    while($row = $result->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['nama'] = $row['nama'];
        $data['nama_skill'] = $row['nama_skill'];
        array_push($response['data'], $data);
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
}

}
?>