<?php
class Database {
	private $host = "localhost";
	private $username = "u630071588_shackathon";
	private $password = "Shackathon@68928";
	private $dbname = "u630071588_shackathon";
	private $conn;

	public function connect() {
		$this->conn = new mysqli(
			$this->host,
			$this->username,
			$this->password,
			$this->dbname
		);

		if ($this->conn->connect_error) {
			die("Connection failed:".$this->conn->connect_error);
		}
		return $this->conn;
	}
}
?>
