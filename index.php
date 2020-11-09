<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@531&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">

		<title>Coding Infinity</title>
	</head>
	<body>
	<div class="header">
		<div class="inner_header">
		<div class="logo_container">
			<h1>Teachers Portal</h1>
		</div>
		<div class="navigation">
			<button id="1" onclick="disp(this.id)">Home</button>
			<button id="2" onclick="disp(this.id)">Upload Files</button>
			<button id="3" onclick="disp(this.id)">View Files</button>
			<button id="4" onclick="disp(this.id)">Delete Files</button>
		</div>
		</div>
	</div>	
	<div id="home">
		<h3>MIT Academy of Engineering</h3>
		<br>
		<div id="content">
		<h4>MIT Academy of Engineering (MIT AOE) is an Autonomous Engineering college Affiliated with the Savitribai Phule Pune University, India and Accredited by NAAC[1] with "A" Grade in 2014 & NBA Accredited. It was Established in the year 1999 and is approved and accredited by AICTE. The college provides both Undergraduate and Postgraduate programs.

		</h4>
		</div>
	</div>
	
	<div id="registeration">
		<h2>Upload Here</h2>
		 <form action="index.php" method="post" enctype="multipart/form-data">

		
			<input type="text" placeholder="Faculty Name.." id="fname" name="fname">
			<input type="text" placeholder="Subject Name.." id="sname"  name="sname">
			<input type="text" placeholder="Course Code.." id="coursecode" name="coursecode">
			<input type="text" placeholder="Department.." id="dept" name="dept">
			<input type="text" placeholder="Year.." id="year" name="year">
			<input type="text" placeholder="Name of Document.." id="docname" name="docname">
			<input type="File" placeholder="Select File.." id="filename" name="filename">
			<input type="submit" name="submit" value="Submit" id="submit">

			</form>
	</div>
			
			
	<br><br>
	<div id="details" >
	<h1>Registration Details</h1>
	<br>	
	<br><br>
	
	<button style="background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;" onclick="loadData()" >Load</button>
	<br>	
	<br><br>
		<table id="display">
			<tr>
				<th>Time</th>
				<th>Faculty</th>
				<th>Subject</th>
				<th>Course_Code</th>
				<th>Department</th>
				<th>Year</th>
				<th>File Name</th>
				<th>File Size</th>
				<th>Download Link</th>
				
				
			</tr>
		</table>
	</div>  

	<div id="delete">


	<select id="dname" required>
				<option>Preferred Language</option>
			</select>
			
	</div> 

	<script src="javascript/jquery-3.5.1.min.js"></script>
	
	<script defer="true" src="javascript/index.js"></script>
	
	
	</body>

</html>

<pre>
<?php
$filename='1604554794492_Assignment3.pdf';
$prefix = "Upload";
echo "<a href='$prefix/$filename'>Download CV </a>";
if(isset($_POST['submit'],$_FILES['filename']))
{
	require 'config.php';
	require 'core/filehandler.php';
	require 'core/Database.php';
	require 'core/Faculty.php';
	
	
	$fileHandler=new FileHandler($_FILES['filename']);
	if($fileHandler->save())
	{
		$timestamp=time();
	$faculty=new Faculty((new Database())->connect());
	$faculty->time=$timestamp;
	$faculty->fname=$_POST['fname'];
	$faculty->sname=$_POST['sname'];
	$faculty->coursecode=$_POST['coursecode'];
	$faculty->dept=$_POST['dept'];
	$faculty->year=$_POST['year'];
	$faculty->docname=$_POST['docname'];
	$faculty->file_name=$fileHandler->name;
	$faculty->file_size=$fileHandler->size;
	



	if($faculty->add() > 0)
	{

		echo "File Registered in Database";
	}
	else
	{	
		$fileHandler->remove();
		echo "Error:Not Saved";
	}
	}
	else{

		echo "Error:Not Saved"; 
	}

}
?>
</pre>