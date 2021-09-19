<style>
table, td{
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
<?php

$min = 2;
$max = 5;

$min_100 = -100;
$max_100 = 100;

$m= rand($min,$max);
$n= rand($min,$max);

echo "Ma trận ".$m."x".$n."<br>";
$m_array =[];
for($i=0;$i<$m;$i++)
{
    for($j=0;$j<$n;$j++)
    {
        $random = rand($min_100,$max_100);
        $m_array[$i][$j] = $random;   
    }
}
echo "<br><button onclick='reload()'>Tải lại trang</button>";
?>
<script>
    function reload(){
        window.location ='baitap4.php';
    }
</script>
<div style='width:25%'>
    <table>
    <?php
        for($i=0;$i<$m;$i++)
        {
            echo "<tr>";
            for($j=0;$j<$n;$j++)
            {
                echo "<td>".$m_array[$i][$j]."</td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
<div>
