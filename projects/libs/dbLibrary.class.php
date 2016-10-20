<?php
class dbLibrary {
	//connect db
	public $con = false;
	function __construct($host,$username,$password,$dbname){
		//$con = @mysql_connect($host,$username,$password);
		//mysql_select_db($dbname,$con) or die("con error");
		//$this->query("set names utf8");
		$this->con = mysqli_connect("localhost","root","root","test"); 
		if (mysqli_connect_errno($this->con)) 
		{ 
			echo "���� MySQL ʧ��: " . mysqli_connect_error(); 
		} 
			$this->con->query("set names utf8");
		}

	 /**
     * ���뷽��
     * @param string $table ��������ݱ���
     * @param $data �ֶ�-ֵ��һά����
     * @return int ��Ӱ�������
     */
    public function insert($table, $data = array())
    {
        //sql���
        $sql = "insert into " . $table . " (" . implode(',', array_keys($data)) . ") value('" . implode("','", array_values($data)) . "')";
        //$query = $this->query($sql);
		$query = $this->query($sql);
        return $sql;
    }

	 /**
     * ɾ��
     * @param string $tbName ��������ݱ���
     * @return int ��Ӱ�������
     */
    public function deletes($table, $condition)
    {
        $where = '';
        if (!empty($condition)) {
            foreach ($condition as $k => $v) {
                $where .= $k . "='" . $v . "' and ";
            }
            $where = 'where ' . $where . '1=1';
        }
        $sql = "delete from {$table} {$where}";
        //$query = $this->query($sql);
		$query = $this->query($sql);
        return $query;
    }

	//ɾ�����
          public function delete($table,$where){
            $sql="delete from $table where $where";
            //$this->query($sql);
			$this->query($sql);
            //������Ӱ�������
             return mysqli_affected_rows($this->con);
         }

	/**
     * �޸ĺ���
     * @param string $tbName ��������ݱ���
     * @param array $data ��������
     * @return int ��Ӱ�������
     */
    // public function update($table,$data,$where=array()){

    // }
    public function update($table, $data, $condition = array())
    {
        $where = '';
        if (!empty($condition)) {
            foreach ($condition as $k => $v) {
                $where .= $k . "='" . $v . "' and ";
            }
            $where = 'where ' . $where . '1=1';
        }
        $updatastr = '';
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $updatastr .= $k . "='" . $v . "',";
            }
            $updatastr = 'set ' . rtrim($updatastr, ',');
        }
        $sql = "update {$table} {$updatastr} {$where}";
        //$query = $this->query($sql);
		$query = $this->query($sql);
        return $query;
    }

	 /**
     * ��ѯ
     * $fieldstr ��ѯ���ֶ�
     * $where   ��ѯ������
     */
    public function select($table, $condition = array(), $field = array())
    {
        $where = '';
        if (!empty($condition)) {
            foreach ($condition as $k => $v) {
                $where .= $k . "='" . $v . "' and ";
            }
            $where = 'where ' . $where . '1=1';
        }
        $fieldstr = '';
        if (!empty($field)) {

            foreach ($field as $k => $v) {
                $fieldstr .= $v . ',';
            }
            $fieldstr = rtrim($fieldstr, ',');
        } else {
            $fieldstr = '*';
        }
        $sql = "select {$fieldstr} from {$table} {$where}";
        $result = $this->query($sql);
        $resuleRow = array();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $k => $v) {
                $resuleRow[$i][$k] = $v;
            }
            $i++;
        }
        return $resuleRow;
    }

	//exec sql
	public function query($sql){
		//$query = mysql_query($sql);
		$query = mysqli_query($this->con,$sql);
		return $query;
	}

	//get one
	public function getOne($sql){
		$query = $this->query($sql);
		$row = mysqli_fetch_array($query);
		return $row[0];
	}

	//get row
	public function getRow($sql){
		$query = $this->query($sql);
		//return mysql_fetch_array($query);
		return mysqli_fetch_array($query);
	}

	//get List 
	public function getAll($sql){
		//$query = mysql_query($sql);
		$query = mysqli_query($this->con,$sql);
		$list = array();
		if($query){
			while($r = mysqli_fetch_array($query)){
				$list[] = $r;
			}
			return $list;
		}else{
			die("data is empty");
		}
	}

	//getLastInsertId
	public function getLastInsertId(){
		return mysqli_insert_id($this->con);
	}

    //用户密码加解密
    function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
        // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
        $ckey_length = 4;

        // 密匙
        $key = md5($key ? $key : $GLOBALS['discuz_auth_key']);

        // 密匙a会参与加解密
        $keya = md5(substr($key, 0, 16));
        // 密匙b会用来做数据完整性验证
        $keyb = md5(substr($key, 16, 16));
        // 密匙c用于变化生成的密文
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length):
            substr(md5(microtime()), -$ckey_length)) : '';
        // 参与运算的密匙
        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);
        // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，
        //解密时会通过这个密匙验证数据完整性
        // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) :
            sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);
        $result = '';
        $box = range(0, 255);
        $rndkey = array();
        // 产生密匙簿
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }
        // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度
        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        // 核心加解密部分
        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            // 从密匙簿得出密匙进行异或，再转成字符
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }
        if($operation == 'DECODE') {
            // 验证数据有效性，请看未加密明文的格式
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) &&
                substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
            // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
            return $keyc.str_replace('=', '', base64_encode($result));
        }
    }
}