<?php
class database{
	public $conn;
	public static $sql;
	public static $instance = null;
	private function __construct(){
		require_once('db.config.php');
		$this -> conn = mysqli_connect($db['host'],$db['user'],$db['password']);
		if(mysqli_connect_errno($this -> conn)){
			echo "Fail to connect to MySQL: ".mysqli_connect_error();
		}
		if(!mysqli_select_db($this -> conn,$db['database'])){
			echo "<script>alert('error')</script>";
		}
		mysqli_query($this->conn,'set names utf8');
	}
	public static function getinstance(){
		if(is_null(self::$instance)){
			self::$instance = new database();
		}
		return self::$instance;
	}
	public function select($sql){
        self::$sql = $sql;
        $result = mysqli_query($this -> conn,self::$sql);
        $res = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $res[]=$row;
        }
        return $res;
    }

    public function select1($sql){
        self::$sql = $sql;
        $result = mysqli_query($this -> conn,self::$sql);
        return $result;
    }
    public function insert($table,$data){
        $values = '';
        $datas = '';
        foreach($data as $k=>$v){
            $values.=$k.',';
            $datas.="'$v'".',';
        }
        $values = rtrim($values,',');
        $datas   = rtrim($datas,',');
        self::$sql = "INSERT INTO  {$table} ({$values}) VALUES ({$datas})";
        if(mysqli_query($this->conn,self::$sql)){
            return mysqli_insert_id($this -> conn);
        }else{
            return 0;
        }
    }

    public function update($table,$data,$condition=array()){
        $where='';
        if(!empty($condition)){

            foreach($condition as $k=>$v){
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }
        $updatastr = '';
        if(!empty($data)){
            foreach($data as $k=>$v){
                $updatastr.= $k."='".$v."',";
            }
            $updatastr = 'set '.rtrim($updatastr,',');
        }
        self::$sql = "update {$table} {$updatastr} {$where}";
        // echo self::$sql,"<br/>";
        return mysqli_query($this -> conn,self::$sql);
    }

    public function update1($sql){
        self::$sql = $sql;
        return mysqli_query($this -> conn,self::$sql);
    }
    public function delete($table,$condition){
        $where='';
        if(!empty($condition)){

            foreach($condition as $k=>$v){
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }
        self::$sql = "delete from {$table} {$where}";
        return mysqli_query($this->conn,self::$sql);

    }

    public static function getLastSql(){
        echo self::$sql;
    }
}
?>