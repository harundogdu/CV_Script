<?php
ob_start();
@session_start();

class Database extends PDO
{
	function __construct()
	{
		parent::__construct("mysql:host=localhost;dbname=cv_script;charset=utf8;", "root", "");
	}

	/* Veri Getir */
	public function getData($tableName, $default = 0, $condition = "")
	{
		$sqlQuery = "SELECT * FROM " . $tableName;

		if ($condition != "") :
			$sqlQuery .= " " . $condition;
		endif;

		$sqlGetData = $this->prepare($sqlQuery);
		$sqlGetData->execute();

		if ($default == 0) :
			$last = $sqlGetData->fetch(PDO::FETCH_ASSOC);
		else :
			$last = $sqlGetData->fetchAll(PDO::FETCH_ASSOC);
		endif;

		return $last;
	}

	/* Filtreleme Fonksiyonu */
	public function filterSyntax($value, $tf = true)
	{
		$one = trim($value);
		if ($tf) :
			$two = strip_tags($one);
			$last = htmlspecialchars($two);
		else :
			$last = $one;
		endif;
		return $last;
	}
	/* Sorgu Çalıştır */
	public function setQuery($query, $data, $arr)
	{
		$sqlQuery = $query . " " . $data;

		$lastQuery = $this->prepare($sqlQuery);
		$lastQuery->execute($arr);
	}

	/* login Control */
	public function loginControl($username, $password)
	{
		$password = md5($password);
		$sqlQuery = "SELECT * FROM admin WHERE admin_user = ? AND admin_psw = ? ";
		$lastLogin = $this->prepare($sqlQuery);
		$last = $lastLogin->execute(array($username, $password));

		if ($lastLogin->rowCount() > 0) :
			$_SESSION['oturum'] = true;
			echo '<div class="alert alert-success">Başarıyla Giriş Yapılıyor</div>';
			header("Refresh:2, url=control.php");
		else :
			header("Location:index.php");
		endif;
	}

	/* RowCount */
	public function rowCountTable($tableName)
	{
		$last = $this->prepare("SELECT * FROM " . $tableName);
		$last->execute();

		$total = $last->rowCount();

		return $total;
	}
}
