
<?php 
include '/home/gpcorser/public_html/database/header.php';
include '/home/gpcorser/public_html/database/database.php';
class QmComments { 	
	function listTable() { 
	
		// beginning body section 
		echo '<body> <div class="container">';
		
		// title of page
		echo '<div class="row"><h3>Comments</h3></div>';
		
		// create button
		echo '<div class="row"><p><a href="qm_comments.php?oper=1&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '" class="btn btn-primary">Add Comment</a></p>';
		
		// beginning of table
		echo '<table class="table table-striped table-bordered" style="background-color: lightgrey !important"><thead>';
		echo '<tr><th>Comment ID</th><th>Person ID</th><th>Question ID</th><th>Comment</th><th>Rating</th><th>Actions</th></tr></thead><tbody>';
		
		// populate table rows
		$pdo = Database::connect();
		$sql = 'SELECT * FROM qm_comments';
		//$sql = 'SELECT * FROM qm_comments WHERE per_id=' . $_GET['per'] . ' AND ques_id=' . $_GET['ques'];
		
		foreach ($pdo->query($sql) as $row) {
			
			echo '<tr>';
			
			echo '<td>'. trim($row['id']) . '</td>'; 
			echo '<td>'. trim($row['per_id']) . '</td>'; 
			echo '<td>'. trim($row['ques_id']) . '</td>'; 
			echo '<td>'. trim($row['comment']) . '</td>';
			echo '<td>'. trim($row['rating']) . '</td>';
			
			// actions for each row
			echo '<td>';
			echo '<a class="btn btn-secondary" href="qm_comments.php?oper=2&per=' . $row['per_id'] . '&ques=' . $row['ques_id'] .'&com=' . $row['id'] .'">Read</a>';
			echo ' ';
			echo '<a class="btn btn-success" href="qm_comments.php?oper=3&per=' . $row['per_id'] . '&ques=' . $row['ques_id'] . '&com=' . $row['id'] . '">Update</a>';
			echo ' ';
			echo '<a class="btn btn-danger" href="qm_comments.php?oper=4&per=' . $row['per_id'] . '&ques=' . $row['ques_id'] . '&com=' . $row['id'] . '">Delete</a>';
			echo ' ';
			echo '</td>';
			
			echo '</tr>';
		}
		Database::disconnect();
		
		// end body section of person list
		echo '</tbody></table></div></div></body>';	
		
	}
	
	function createRow(){
		//do{
		if ( !empty($_POST)) { // if not first time through

	// initialize user input validation variables
	//$ques_comm_idError = null;
	$commentError = null;

	// initialize $_POST variables
	$per_id = $_POST['per_id'];
	$ques_id = $_POST['ques_id'];
	$comment = $_POST['comment'];
	$rating = $_POST['rating'];

	// validate user input

	$valid = true;
	/*
	if (empty($ques_id)) {
		$ques_comm_idError = 'Please enter Question ID';
		$valid = false;
	}
	*/
	if (empty($per_id)) {
		$per_Error = 'Please enter a person id';
		$valid = false;
	}
	
	if (empty($ques_id)) {
		$ques_comm_idError = 'Please enter a question id';
		$valid = false;
	}
	
	if (empty($comment)) {
		$com_Error = 'Please enter a comment';
		$valid = false;
	}
	
	if (empty($rating)) {
		$rat_error = 'Please enter a rating';
		$valid = false;
	}

}

	echo '<body style="background-color: lightblue">';
	echo '<div class="container">';
	echo '<div class="span10 offset1"><br>';
	echo '<div class="row"><h3>Add New Comment</h3></div>';
	echo '<form class="form-horizontal" action="qm_comments.php?" method="post">';
	echo'<div class="control-group ';empty($ques_comm_idError)?'error':'';'">';
	echo'<label class="control-label">Question</label>';
	echo'<div class="controls">';
	echo'<select name="ques_id" type="text">';
	
		$pdo = Database::connect();
		$sql = 'SELECT DISTINCT ques_id FROM qm_comments';
		foreach ($pdo->query($sql) as $row) {
			echo '<option value="' . $row['ques_id'] . '">' . $row['ques_id'] . '</option>';
		}
		Database::disconnect();
	
	echo '</select></div></div>';
		
	echo '<div class="control-group ';empty($per_Error)?'error':'';'"><br>';
	echo '<label class="control-label">Person ID</label>';
	echo '<div class="controls">';
	
	echo '<input name="per_id" type="text" placeholder="Person ID" value = "';
	echo !empty($per_id)?$per_id:"";
	echo '">';
	
	if (!empty($per_id)):
	$valid = false;
	echo '<span class="help-inline">"Please enter a Person ID"';
	echo '</span>';
	endif;
	
	echo '</div></div>';	
	
	echo '<div class="control-group ';empty($com_Error)?'error':'';'"><br>';
	echo '<label class="control-label">Comment</label>';
	echo '<div class="controls">';
	//echo '<input name="comment" type="text" placeholder="Comment Text" value= ';empty($com_Error)?'error':'';'">"';
	//echo '<input name="comment" type="text" placeholder="Comment Text" value= '; empty($comment)?'error':''; echo '">"';
	echo '<input name="comment" type="text" placeholder="Comment" value = "';
	echo !empty($comment)?$comment:"";
	echo '">';
	
	if (!empty($comment)):
	$valid = false;
	echo '<span class="help-inline">';$com_Error;echo '</span>';
	endif;
	
	echo '</div></div>';
	
	//
	
	echo '<div class="control-group ';empty($rat_Error)?'error':'';'"><br>';
	echo '<label class="control-label">Rating</label>';
	echo '<div class="controls">';
	//echo '<input name="comment" type="text" placeholder="Comment Text" value= ';empty($com_Error)?'error':'';'">"';
	//echo '<input name="comment" type="text" placeholder="Comment Text" value= '; empty($comment)?'error':''; echo '">"';
	echo '<input name="rating" type="text" placeholder="Rating" value = "';
	echo !empty($rating)?$rating:"";
	echo '">';
	
	if (!empty($rating)):
	$valid = false;
	echo '<span class="help-inline">';$rat_Error;echo '</span>';
	endif;
	
	echo '</div></div>';

		if ($valid == true) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO qm_comments (per_id, ques_id, comment, rating) values(?, ?, ?, ?)"; 
		$q = $pdo->prepare($sql);
		$q->execute(array($per_id, $ques_id, $comment, $rating));
		Database::disconnect();

		header("Location: qm_comments.php");
		

	}
	
	echo '<div class="form-actions"><br><br>';
	echo '<button type="submit" class="btn btn-success">Create</button>';
	echo '<a class="btn btn-secondary" href="qm_comments.php">Back</a>';
	
	echo '</div></form></div></div></body>';
	
		// insert data

		//}while ($valid == false);

	}
	
	function readRow(){
 $id = $_GET['com'];
 $pdo = Database::connect();
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = 'SELECT * FROM qm_comments WHERE id = ?';
 $q = $pdo->prepare($sql);
 $q->execute(array($id));
 $data = $q->fetch(PDO::FETCH_ASSOC);
 Database::disconnect();
 
	echo '<body style="background-color: lightblue !important";>';
	echo '<div class="container"><div class="span10 offset1">';
	echo '<div class="row"><h3>View Comment Details</h3></div>';
	echo '<div class="form-horizontal" >';
	echo '<div class="control-group col-md-6">';
	echo '<label class="control-label">Comment ID</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['id'];
	echo '</label></div>';
	
	echo '<label class="control-label">Person ID</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['per_id'];
	echo '</label></div>';
	
	echo '<label class="control-label">Question ID</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['ques_id'];
	echo '</label></div>';
	
	echo '<label class="control-label">Comment</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['comment'];
	echo '</label></div>';
	
	echo '<label class="control-label">Rating</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['rating'];
	echo '</label></div><br>';		
	
	echo '<div class="form-actions"><a class="btn btn-secondary" href="qm_comments.php">Back</a></div>';	
			
	echo '</div></div></body>';				
			
	}
	
	function updateRow(){
	$id = $_GET['com'];
	$per_id = $_GET['per'];
	$ques_id = $_GET['ques'];
	
	if ( !empty($_POST)) { // if $_POST filled then process the form
	
	# same as create
	// initialize user input validation variables
	$comm_idError = null;
	$comm_perIDError = null;
	$comm_questIDError = null;
	$comm_textError = null;
	
	// initialize $_POST variables
	$id = $_POST['id'];    // same as HTML name= attribute in put box
	$per_id = $_POST['per_id'];
	$ques_id = $_POST['ques_id'];
	$comm_text = $_POST['comm_text'];
	//$opt_isCorrect = $_POST['opt_isCorrect'];
	
	
	 // initialize $_FILES variables
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	$content = file_get_contents($tmpName); 
	
	// validate user input
	$valid = true;
	if (empty($id)) {
		$comm_idError = 'Please choose a comment ID';
		$valid = false;
	}
	if (empty($per_id)) {
		$comm_perIDError = 'Please choose an per_id';
		$valid = false;
	} 
	if (empty($comm_text)) {
		$comm_questIDError = 'Please choose an comm_text';
		$valid = false;
	} 
	if (empty($ques_id)) {
		$comm_textError = 'Please choose an ques_id';
		$valid = false;
	} 
		
	if ($valid) { // if valid user input update the database
	
		if($fileSize > 0) { // if file was updated, update all fields
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE qm_comments  set ques_id = ?, comm_text = ?, ques_id = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($per_id, $comm_text, $ques_id, $id));
			Database::disconnect();
			header("Location: qm_comments.php");
		}
		else { // otherwise, update all fields EXCEPT file fields
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE qm_comments  set per_id = ?, comm_text = ?, ques_id = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($per_id, $comm_text, $ques_id, $id));
			Database::disconnect();
			header("Location: qm_comments.php");
		}
		
	}
} else { // if $_POST NOT filled then pre-populate the form
	
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM qm_comments where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	$per_id = $data['per_id'];
	$comm_text = $data['comm_text'];
	$ques_id = $data['ques_id'];
	Database::disconnect();
}

		echo '<body><div class="container"><div class="span10 offset1">';
		echo '<div class="row"><h3>Update Comment</h3></div>';
		echo '<form class="form-horizontal" action="qm_comments.php?id= "'; echo $id; echo '"method="post" enctype="multipart/form-data">';
		
//comm_id div
		echo '<div class="control-group ';empty($comm_idError)?'error':'';'"><br>';
		echo '<label class="control-label">Comment ID</label><div class="controls">';		
		echo '<input name="id" type="text" placeholder="Comment ID" value = "';
		echo !empty($id)?$id:"";
		echo '">';		
		if (!empty($quest_idError)):
		echo '<span class="help-inline">' . $comm_idError . '</span>';
		endif;		
		echo '</div></div>';
		
//comm_perID div		
		echo '<div class="control-group ';empty($comm_perIDError)?'error':'';'"><br>';
		echo '<label class="control-label">Person ID</label><div class="controls">';		
		echo '<input name="per_id" type="text" placeholder="Person ID" value = "';
		echo !empty($per_id)?$per_id:"";
		echo '">';		
		if (!empty($comm_perIDError)):
		echo '<span class="help-inline">' . $comm_perIDError . '</span>';
		endif;		
		echo '</div></div>';
		
//comm_questID div		
		echo '<div class="control-group ';empty($comm_questIDError)?'error':'';'"><br>';
		echo '<label class="control-label">Question ID</label><div class="controls">';		
		echo '<input name="ques_id" type="text" placeholder="Question ID" value = "';
		echo !empty($ques_id)?$ques_id:"";
		echo '">';		
		if (!empty($comm_questIDError)):
		echo '<span class="help-inline">' . $comm_questIDError . '</span>';
		endif;		
		echo '</div></div>';

//comm_text div		
		echo '<div class="control-group ';empty($comm_textError)?'error':'';'"><br>';
		echo '<label class="control-label">Comment Text</label><div class="controls">';		
		echo '<input name="comm_text" type="text" placeholder="Comment Text" value = "';
		echo !empty($comm_text)?$comm_text:"";
		echo '">';		
		if (!empty($comm_textError)):
		echo '<span class="help-inline">' . $comm_textError . '</span>';
		endif;		
		echo '</div></div>';		
		
		
		echo '<div class="form-actions"><button type="submit" class="btn btn-success">Update</button><a class="btn btn-secondary" href="qm_comments.php">Back</a></div>';
		
//end body		
		echo '</form></div></div></body>';

	}

	function deleteRow(){
		$id = $_GET['com'];
if ( !empty($_POST)) { // if user clicks "yes" (sure to delete), delete record
	$id = $_POST['id'];
	
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM qm_comments  WHERE id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	Database::disconnect();
	header("Location: qm_comments.php");
	
} 
else { // otherwise, pre-populate fields to show data to be deleted
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM qm_comments where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
}

	echo '<body style="background-color: lightblue !important";>';
	echo '<div class="container"><div class="span10 offset1">';
	echo '<div class="row"><h3>Delete Comment</h3></div>';
	echo '<div class="form-horizontal" >';
	echo '<div class="control-group col-md-6">';
	echo '<label class="control-label">Comment ID</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['id'];
	echo '</label></div>';
	
	echo '<label class="control-label">Person ID</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['per_id'];
	echo '</label></div>';
	
	echo '<label class="control-label">Question ID</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['ques_id'];
	echo '</label></div>';
	
	echo '<label class="control-label">Comment</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['comment'];
	echo '</label></div>';
	
	echo '<label class="control-label">Rating</label>';
	echo '<div class="controls "><label class="checkbox">';
	echo $data['rating'];
	echo '</label></div><br>';	
	
	echo '<p class="alert alert-error">Are you sure you want to delete?</p><div class="form-actions"><button type="submit" class="btn btn-success">Yes</button><a class="btn btn-danger" href="qm_comments.php">No</a></div>';
	
	echo '</div></div></body>';

	}
	
	
}

if($_GET['oper']==0) {QmComments::listTable();}
elseif($_GET['oper']==1) {QmComments::createRow();}
elseif($_GET['oper']==2) {QmComments::readRow();}
elseif($_GET['oper']==3) {QmComments::updateRow();}
elseif($_GET['oper']==4) {QmComments::deleteRow();}
else {echo "error";}
?> 