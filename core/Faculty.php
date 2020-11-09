<?php


class Faculty{
	public $time=null;
	public $fname=null;
	public $sname=null;
	public $coursecode=null;
	public $dept=null;
	public $year=null;
	public $docname=null;
	public $file_name=null;
	public $file_size=null;
	
	private	$table_name="upload";
	private $conn=null;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function add()
	{
	$sql="INSERT INTO {$this->table_name}
			VALUES(:time,:fname,:sname,:coursecode,:dept,:year,:docname,:file_name,:file_size)";
			
	$stmt=$this->conn->prepare($sql);


	$stmt->bindParam(':time',$this->time);
	$stmt->bindParam(':fname',$this->fname);
	$stmt->bindParam(':sname',$this->sname);
	$stmt->bindParam(':coursecode',$this->coursecode);
	$stmt->bindParam(':dept',$this->dept);
	$stmt->bindParam(':year',$this->year);
	$stmt->bindParam(':docname',$this->docname);	
	$stmt->bindParam(':file_name',$this->file_name);
	$stmt->bindParam(':file_size',$this->file_size);
	
	$stmt->execute();

	return $stmt->rowCount();
	}


	public function getRecords()
	{
		$sql="SELECT * FROM {$this->table_name} ORDER BY time";

		$stmt=$this->conn->prepare($sql);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
            $student_arr = array();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $student_arr[] = $row;
            }

            return json_encode($student_arr);

         
        }
		
	}
public function get_docnames(){
	$sql="SELECT docname FROM {$this->table_name} ORDER BY time";

	$stmt=$this->conn->prepare($sql);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		$student_arr = array();

		while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			$student_arr[] = $row;
		}

		return json_encode($student_arr);

	 
	}



}
	
public function deletenotes($name)
{
	$sql="DELETE FROM {$this->table_name}
	WHERE docname=:name";
	
$stmt=$this->conn->prepare($sql);


$stmt->bindParam(':name',$name);

$stmt->execute();

return $stmt->rowCount();	
}


}
?>