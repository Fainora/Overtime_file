<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="overtime" id="form">
            <div action="#" method="POST">
                Дата: <input type="date" id="date" min="2022-01-01" /></br>
                RCLSRV-<input type="text" id="rclsrv" /></br>
                Выехал: <input type="time" id="left" /></br>
                Начал: <input type="time" id="start" /></br>
                Закончил: <input type="time" id="finished" /></br>
                До дома: <input type="number" id="home" min="0" /> мин</br>
                <button type="submit" id="submit">Добавить</button>
            </div>
        </div>

        <div class="full" id="form">
            <div action="#" method="POST">
                <button type="submit" id="reload" class="reload">&#x21bb;</button>
            </div>
            <div id="conclusion"></div>
        </div>

        <div class="calculate" id="form">
            Введите время переработок в строку </br>
            Пример: 10+15+20+10 </br>
            <span class="gray">p.s. можно только складывать числа</span>
            <div action="#" method="POST">
                <input type="text" id="calculate">
                <button type="submit" id="equal">=</button>
            </div>
            <div id="conclusion1"></div>
        </div>
    </div>

    <script>
        var date = $('#date').val();
        var rclsrv = $('#rclsrv').val();
        var left = $('#left').val();
        var start = $('#start').val();
        var finished = $('#finished').val();
        var home = $('#home').val();
        $('#submit').on('click', function () {
            $("#conclusion").load("submit.php", {
                date: date,
                rclsrv: rclsrv,
                left: left,
                start: start,
                finished: finished,
                home: home,
            });
        });

        $('#equal').on('click', function () {
            var calc = $('#calculate').val();
            $("#conclusion1").load("calculate.php", {
                calc: calc,
            })
        });

        $('#reload').on('click', function() {
            $("#conclusion").load("reload.php");
        });
    </script>
</body>

</html>