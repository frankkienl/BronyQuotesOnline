<!DOCTYPE html>
<!--
//https://lh5.googleusercontent.com/VPc3DP52jbYCAeglXi-_3eHtfZJu68Z_CIbZdwzcLKDTJUWraYfKUiowquiWmfNDcx3R9QgVGE1I9IU3L21nn9RbLzFsbIwGr0WPO-7jeMedj2YdLoU
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="0">
        <?php
        // read assets-folder
        $assetsDir = opendir("assets/");
        while (($ponyDirName = readdir($assetsDir)) !== false) {
            if ($ponyDirName == "." || $ponyDirName == ".."){
                continue;
            }
            //echo "<div>";
            echo "<tr><td>";
            echo "<img src=\"assets/$ponyDirName/pony.png\" alt=\"pony image $ponyDirName\" />\n";
            echo "<td>";
            echo "<a href=\"pony.php?pony=$ponyDirName\">$ponyDirName</a>\n";            
            echo "</div>\n";
        }
        closedir($assetsDir);
        ?>
        </table>
    </body>
</html>
