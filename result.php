<form action="" method="GET">
    Введите дату в формате день.меяц.число(12.02.1997)
    <input name="value"><br>
    Введите дату вторую дату
    <input name="value2">
    <input type="submit">
</form>
<?php
    if(!empty($_GET))
    {  
        if(preg_match('#\d{2}\.\d{2}\.\d{4}#', $_GET['value']) and preg_match('#\d{2}\.\d{2}\.\d{4}#', $_GET['value2']))
        {
            $val1 = strtotime($_GET['value']);
            $val2 = strtotime($_GET['value2']);
            if($val2 > $val1)
            {
                $result = $val2 - $val1;
                result_callback($result);
            }
            else if($val2 === $val1)
            {
                echo '0' . ' 0 ' . ' 0 ';
            }
            else
            {
                $result = $val1 - $val2;
                result_callback($result);
            }
        }
        else
        {
            echo "не верный формат, введите в формате день.меяц.число(12.02.1997)";
        }
    }
    function result_callback($val)
        {
            echo $val / 60 / 60 / 24 . ' дней ' . ' или ' . round($val / 31536000) . ' года ' . ' или ' .  $val / 2629746 . ' месяцев';
        }
?>