<?php

class SuperModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'sinTablita:3';
	}

	public function getSuper($matricula){

		try{
			
			$query = $this->DB->MYSQLconnect()->prepare("call getUser(:matri);");
			$data = [
				':matri' => $matricula
			];
			$query->execute($data);
				
			return $query->fetch();

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return null;
		}
	}
}
?>