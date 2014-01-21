<!--
//Way better soundboard:
//http://kyrospawn.deviantart.com/art/MLP-FIM-Soundboard-V8-4-244757196
//So.. what are you doing here xD ?
//-->
<?php

function startsWith($haystack, $needle) {
//http://stackoverflow.com/questions/834303/php-startswith-and-endswith-functions
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function endsWith($haystack, $needle) {
//http://stackoverflow.com/questions/834303/php-startswith-and-endswith-functions
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

//http://stackoverflow.com/questions/4366730/how-to-check-if-a-string-contains-specific-words
function contains($haystack, $needle) {
    return (strpos($haystack, $needle) !== false);
}

$pony = $_GET['pony'];
if (strpos($pony, '..') !== false) {
//possible security breach
    exit;
}
$originalString = file_get_contents("assets/$pony/pony.ini");
$originalLines = explode("\n", $originalString);
$sounds = array();
$csvString = "";
foreach ($originalLines as $line) {
    if (startsWith($line, "Speak") && contains($line, "mp3")) {
//get file from {"file.mp3"}   
        $temp = str_getcsv($line);
        $name = $temp[2];
        $mp3 = substr($temp[3], 2, -1);
        if (!contains($mp3, "mp3")){
            echo "<!-- error parsing line: $line //-->\n";
        } else {
            $sounds[$name] = $mp3;
        }
    }
}
?>
<html>
    <head>
        <title>Brony Quotes</title>
        <script type="text/javascript">
            function doSound(filename){
                div_audio = document.getElementById("div_audio");
                div_audio.innerHTML = "<audio controls autoplay><source src=\"assets/<?php echo $pony;?>/"+filename+"\" type=\"audio/mpeg\"></audio>";
            }
        </script>
    </head>
    <body>
        <h2><?php echo $pony; ?></h2>
        <div id="div_list">
            <?php
            foreach ($sounds as $key => $value) {
                echo "<div class=\"div_button\">\n";
                echo "<button onClick=\"doSound('$value')\">$key</button>\n";
                echo "</div>\n";
            }
            ?>
        </div>
        <div id="div_audio">
            
        </div>
    </body>
</html>
