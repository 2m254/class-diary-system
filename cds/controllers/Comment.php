<?php 
	include_once './database/DB.php';
	class Comment
	{
		private $db;
		private $name;
		private $comment;
		private $table = "class_diary_tbl";

		public function __construct()
		{
			$this->db = new DB();
		}

		public function setData($name, $comment)
		{
			$this->name    = $name;
			$this->comment = $comment;
		}

		public function create()
		{
			$query = "INSERT INTO $this->table(name, comment, comment_time) VALUES('$this->name', '$this->comment', now())";
			$insert_comment = $this->db->insert($query);
			return $insert_comment;
		}

		public function index()
		{
			$query = "SELECT distinct class_diary_tbl.cd_id,class_diary_tbl.week,class_diary_tbl.day,
			class_diary_tbl.dat,class_diary_tbl.dat,class_diary_tbl.activity,class_diary_tbl.toc,
			class_diary_tbl.commdesc,level_tbl.le_title,level_tbl.le_class,class_diary_tbl.start_time,class_diary_tbl.end_time,modules_tbl.mo_title,
			lecture_tbl.lect_name,department_tbl.de_short from class_diary_tbl join modules_tbl 
			on class_diary_tbl.cd_id=modules_tbl.mo_id join lecture_tbl on lecture_tbl.lect_id=class_diary_tbl.cd_id 
			join department_tbl on class_diary_tbl.cd_id=department_tbl.de_id join level_tbl on class_diary_tbl.cd_id=level_tbl.le_id";
			$result = $this->db->select($query);
			return $result;
		}

		public function dateFormat($data)
		{
			date_default_timezone_set('Asia/Dhaka');
			$date = date('M j, h:i:s a', time());
			return $date;
		}
	}
 ?>