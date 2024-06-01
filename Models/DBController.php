<?php
class DBController
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "nile";
    private $connection;

    private static $instance = null;

    public function __construct()
    {
        $this->openConnection();
    }
    public function openConnection()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            echo "Error in Connection: " . $this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }

    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
        } else {
            echo "Connection is not opened";
        }
    }

    public function select($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function insert($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        } else {
            return $this->connection->insert_id;
        }
    }

    public function update($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        } else {
            return $this->connection->affected_rows;
        }
    }
}
?>
