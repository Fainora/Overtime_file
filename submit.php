<?php /* УЗНАЙ КАК СЧИТАЕТСЯ РАЗНИЦА ВРЕМЕНИ */
if(empty($_POST['date']) && empty($_POST['rclsrv']) && empty($_POST['left']) && 
    empty($_POST['start']) && empty($_POST['finished'])) {
    die("Заполните форму");
}

$filename = date("M") . ".txt";

$date = date("d.m.Y", strtotime($_POST['date']));
$rclsrv = $_POST['rclsrv'];
$left = $_POST['left'];
$start = $_POST['start'];
$finished = $_POST['finished'];
$home = $_POST['home'];

$text = $date . "\n" . 'RCLSRV-' . $rclsrv . "\n" . 'Выехал: ' . $left . 
"\n" . 'Начал: ' . $start . "\n" . 'Закончил: ' . $finished . "\n";

$left_min = new DateTime($left);
$start_min = new DateTime($start);
$finished_min = new DateTime($finished);
$minDiff = ($finished_min->getTimestamp() - $start_min->getTimestamp()) / 60;
//$time = ($start - $left) + ($finished - $start);
if (!empty($home)) {
    $minDiff += (int)$home;
    $txt = $text . 'До дома: ' . $home . ' мин' . "\n" . 'Времени заняло: ' . $minDiff . ' мин' . "\n\n";
} else {
    $txt = $text . 'Времени заняло: ' . $minDiff . ' мин' . "\n\n";
}
file_put_contents($filename, $txt, FILE_APPEND);
echo nl2br(file_get_contents($filename));
?>