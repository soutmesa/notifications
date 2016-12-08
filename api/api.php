<?php
$db_host="localhost";
$db_name="notification";
$db_user="root";
$db_pass="extract";
$db_connect = new PDO('mysql:host='. $db_host .';dbname='. $db_name .';charset=utf8', $db_user, $db_pass);
$db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db_connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db_connect->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
switch ($_REQUEST['act']) {
	case 'get_notes':
		try {
			$stmt = $db_connect->prepare("SELECT count(*) as leng FROM tbnotifications WHERE is_read = '0'");
			$stmt->execute();
			// return all datas queried object
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($results);
			// echo "string";
		} catch(PDOException $ex) {
		    //Something went wrong rollback!
		    echo $ex->getMessage();
		}
		break;
	case 'get_course':
		try {
			$id = $_GET['id'];
			$stmt = $db_connect->prepare("SELECT * FROM courses WHERE course_id = ".$id);
			$stmt->execute();
			// return all datas queried object
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			echo json_encode($results);
		} catch(PDOException $ex) {
		    //Something went wrong rollback!
		    echo $ex->getMessage();
		}
		break;
	case 'get_categories':
		try {
			$stmt = $db_connect->prepare("SELECT * FROM categories");
			$stmt->execute();
			// return all datas queried object
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($results);
		} catch(PDOException $ex) {
		    //Something went wrong rollback!
		    echo $ex->getMessage();
		}
		break;
	case 'search':
		try {
			$query = "SELECT * FROM courses INNER JOIN course_cate ON ";
			$query .= "courses.course_id = course_cate.course_id INNER JOIN categories ";
			$query .= "on course_cate.cate_id = categories.cate_id WHERE ";
			$query .= "CONCAT_WS(course_title, subject, author, level, description, tag, cate_name) ";
			if (!empty($_GET['key'])){
				$query .= "LIKE '%" . $_GET['key'] . "%' ";
			}
			if (!empty($_GET['id'])){
				$query .= "OR categories.cate_id = '" . $_GET['id'] . "' ";
			}
			$query .= "ORDER BY course_title DESC ";
			if (isset($limit) && isset($offset)){
				$query .= "limit $offset, $limit";
			}
			$stmt = $db_connect->prepare($query);
			$stmt->execute();
			// return all datas queried object
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// echo $limit;
			echo json_encode($results);
		} catch(PDOException $ex) {
		    //Something went wrong rollback!
		    echo $ex->getMessage();
		}
		break;
	case 'search_length':
		try {
			$query = "SELECT count(*) as leng FROM courses INNER JOIN course_cate ON ";
			$query .= "courses.course_id = course_cate.course_id INNER JOIN categories ";
			$query .= "on course_cate.cate_id = categories.cate_id WHERE ";
			$query .= "CONCAT_WS(course_title, subject, author, level, description, tag, cate_name) ";
			if (!empty($_GET['key'])){
				$query .= "LIKE '%" . $_GET['key'] . "%' ";
			}
			if (!empty($_GET['id'])){
				$query .= "OR categories.cate_id = '" . $_GET['id'] . "' ";
			}
			$stmt = $db_connect->prepare($query);
			$stmt->execute();
			// return all datas queried object
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// echo $results;
			echo json_encode($results);
		} catch(PDOException $ex) {
		    //Something went wrong rollback!
		    echo $ex->getMessage();
		}
		break;
	default:
		# code...
		break;
}
