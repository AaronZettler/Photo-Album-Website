<?php
$mysqli = new mysqli('localhost', 'root', '', '5ahel_zettler') or die($mysqli->connect_error);

function add_Year($year, $mysqli) {
  $sql = "INSERT IGNORE INTO year (yearID,date) VALUES(NULL, '$year-01-01')";
  $mysqli->query($sql) or die($mysqli->error);
}
function exists_Year($year, $mysqli)
{
  $sql = "SELECT yearID FROM year WHERE date = '$year-01-01'";
  $result_years = $mysqli->query($sql) or die($mysqli->error);
  return $result_years->num_rows > 0;
}
function get_YearID($year, $mysqli)
{
  $sql = "SELECT yearID FROM year WHERE date = '$year-01-01'";
  $result_years = $mysqli->query($sql) or die($mysqli->error);
  $year_id = $result_years->fetch_assoc();
  
  return $year_id['yearID'];
}
function get_Years($mysqli)
{
  $sql = "SELECT date FROM year";
  $result_years = $mysqli->query($sql) or die($mysqli->error);
  return $result_years;
}

function add_Subject($year_ref, $subject, $mysqli) {
  $sql = "INSERT IGNORE INTO collection (collectionID,yearREF,title) VALUES(NULL, '$year_ref', '$subject')";
  $mysqli->query($sql) or die($mysqli->error);
}
function exists_Subject($year_ref, $subject, $mysqli)
{
  $sql = "SELECT collectionID FROM collection WHERE yearREF = '$year_ref' AND title = '$subject'";
  $result_subjects = $mysqli->query($sql) or die($mysqli->error);
  return $result_subjects->num_rows > 0;
}
function get_Subjects($year_ref, $mysqli)
{
  $sql = "SELECT title FROM collection WHERE yearREF = '$year_ref'";
  $result_subjects = $mysqli->query($sql) or die($mysqli->error);
  return $result_subjects;
}
function get_SubjectID($subject, $mysqli)
{
  $sql = "SELECT collectionID FROM collection WHERE title = '$subject'";
  $result_subject_id = $mysqli->query($sql) or die($mysqli->error);
  $subject_id = $result_subject_id->fetch_assoc();
  
  return $subject_id['collectionID'];
}

function add_picture($collection_ref, $year_ref, $name, $path, $mysqli) {
  $file_ext = explode('.', $name);
  $title = $file_ext[0];
  //$path = 'upload/'.$name;
  $sql = "INSERT IGNORE INTO picture (pictureID,collectionREF,yearREF,title,path) VALUES(NULL, '$collection_ref','$year_ref','$title', '$path')";
  $mysqli->query($sql) or die($mysqli->error);
}
function get_Picture_Pats($collection_ref, $year_ref, $mysqli)
{
  $sql = "SELECT path FROM picture WHERE collectionREF = '$collection_ref' AND yearREF = '$year_ref'";
  $result_picture_path = $mysqli->query($sql) or die($mysqli->error);
  return $result_picture_path;
}
