<table border=1>
    <tr>
    	<td>1</td>
    	<td>2</td>
    	<td>3</td>
    </tr>
    <tr>
    	<td>4</td>
    	<td>5</td>
    	<td>6</td>
    </tr>
    <tr>
    	<td>7</td>
    	<td>8</td>
    	<td>9</td>
    </tr>
</table>

<?php
$columns=4;
$rows=5;


echo "<table border=1>";
    for($a=0;$a<=$rows;$a++)
    {
        echo "<tr>";
        for($b=0;$b<=$columns;$b++)
        {
            if($a==0)
            {
                echo "<td>";
                echo $b;
                echo "</td>";
            }
            elseif($b==0)
            {
                echo "<td>";
                echo $a;
                echo "</td>";
            }
            else 
            {
                echo "<td>";
                echo $a*$b;
                echo "</td>";
            }            
        }        
        echo "</tr>";
    }    
echo "</table>";



