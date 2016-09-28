<?php
$con = mysqli_connect("localhost","root","","test");
 
function get_cat_selectlist($current_cat_id, $count) {
	$con = mysqli_connect("localhost","root","","test");
static $option_results;
// if there is no current category id set, start off at the top level (zero)
if (!isset($current_cat_id)) {
$current_cat_id =0;
}
// increment the counter by 1
$count = $count+1;
 
// query the database for the sub-categories of whatever the parent category is
$sql =  'SELECT id, cname from categories where pid =  '.$current_cat_id;
$sql .=  ' order by cname asc ';

 
$get_options = mysqli_query($con, $sql);
$num_options = mysqli_num_rows($get_options);
 
// our category is apparently valid, so go ahead €¦
if ($num_options > 0) {
while (list($cat_id, $cat_name) = mysqli_fetch_row($get_options)) {
 
// if its not a top-level category, indent it to
//show that its a child category
 
if ($current_cat_id!=0) {
$indent_flag =  '|-';
for ($x = 1; $x<= $count; $x++) {
	//if( $x==$count){
		$indent_flag .=  '-';

	//}
	
}
}
else
{
$indent_flag = '|-';

}
$cat_name = $indent_flag.$cat_name;
$option_results[$cat_id] = $cat_name;
// now call the function again, to recurse through the child categories
get_cat_selectlist($cat_id, $count );
}
}
return $option_results;
}

echo '<select name="cat_id">';
echo '<option value="">-- Select -- </option>';
 
$get_options = get_cat_selectlist(0, 0);
if (count($get_options) > 0){
 if(isset($_POST['cat_id']) && !empty($_POST['cat_id']))
 {
	$categories = $_POST['cat_id'];
 
}
$options = "";
foreach ($get_options as $key => $value) {
 
$options .="<option value=\"$key\"";
 
// show the selected items as selected in the listbox
if(isset($_POST['cat_id']) && !empty($_POST['cat_id']))
{
if ($_POST['cat_id'] == $key) {
$options .=" selected=\"selected\"";
}
}
$options .=">$value</option>\n";
}
}
echo $options;
 echo '</select>'; 
?>