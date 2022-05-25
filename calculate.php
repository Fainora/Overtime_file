<?php
if(!empty($_POST['calc'])) {
    $calc = $_POST['calc'];

    $sum = 0;
    $calc_str = explode('+',$calc);
    foreach($calc_str as $key=>$value)
    {
      $sum += (int)$value;
    }
    echo "Итоговое время: $sum мин";
} else {
    echo 'Заполните поле';
}
?>