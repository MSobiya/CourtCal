<?php
$case_id = $_POST['case_id'];
#$case_id = '4/PW/2019';
$python = `python3 TextSimilarity.py $case_id`;
//$result = json_decode($python);
//echo json_encode($result);
echo $python;
?>
