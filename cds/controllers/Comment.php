<?php 
	include_once './database/DB.php';
	class Comment
	{
		private $db;
		private $name;
		private $comment;
		private $table = "class_diary_tbl";

		

		public function index()
		{
			$query = "SELECT distinct class_diary_tbl.cd_id,class_diary_tbl.week,department_tbl.de_short,class_diary_tbl.day,class_diary_tbl.dat,
			class_diary_tbl.activity,class_diary_tbl.toc,class_diary_tbl.commdesc,class_diary_tbl.start_time,class_diary_tbl.end_time,modules_tbl.mo_title,
			lecture_tbl.lect_name,level_tbl.le_title,level_tbl.le_class from class_diary_tbl join modules_tbl on class_diary_tbl.cd_id=modules_tbl.mo_id 
			join lecture_tbl on lecture_tbl.lect_id=class_diary_tbl.cd_id join department_tbl on 
			department_tbl.de_id=class_diary_tbl.cd_id join level_tbl on level_tbl.le_id=class_diary_tbl.cd_id";
			$result = $this->db->select($query);
			return $result;
		}

	}
 ?>