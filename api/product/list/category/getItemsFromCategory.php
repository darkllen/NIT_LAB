<?php

$num = explode("/",$_SERVER['REQUEST_URI'])[4];

		$link = mysqli_connect("193.111.0.203:3306", "darklen", "qwerty", "lendro");
		$query ="Select items.id, name, description, image_url, price, special_price from (itemstocategories innER JOIN items on items.id=itemstocategories.item_id ) where itemstocategories.category_id = $num";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

$rows_num = mysqli_num_rows($result);
$arr;
header('Content-Type: application/json');
for ($i = 0; $i < $rows_num; $i++) {
    $row = mysqli_fetch_row($result);
    $categories = array('id'=>$row[0], 'name'=>$row[1], 'description'=>$row[2], 'image_url'=>$row[3], 'price'=>$row[4], 'special_price'=>$row[5]);
  

    $arr[$i] = $categories;
  
}
echo json_encode($arr);
?>