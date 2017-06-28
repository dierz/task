<?php
$text= $_POST["text"];
$p = preg_split ('/[^A-Za-z0-9Р-пр-џ]/', $text);
$array = array_filter($p, function($element) {
    return !empty($element);
});
$i=0;$mas;
foreach($array as $value){
    $mas[$i]=$value;
    $i++;
}
$db;
$gc=0;
for($i=0;$i<count($mas);$i++){
    $arr=str_split($mas[$i]);
    for($k=0;$k<count($arr);$k++){
        $h=0;if($h==$k){$h++;};$fg=0;
        while($h<count($arr)){
            if(strcmp($arr[$k],$arr[$h])===0){
                $fg++;
            }
            $h++;if($h==$k){$h++;};
        }
        if($fg===0){$db[$gc]=$arr[$k];$gc++;break;}
    }
}
if(!empty($db)) {
    for ($k = 0; $k < count($db); $k++) {
        $h = 0;
        if ($h == $k) {
            $h++;
        };
        $fg = 0;
        while ($h < count($db)) {
            if (strcmp($db[$k], $db[$h]) === 0) {
                $fg++;
            }
            $h++;
            if ($h == $k) {
                $h++;
            };
        }
        if ($fg === 0) {
            $result = $db[$k];
            break;
        }
    }
    ?><br><br><b><?php
    print("Result is \"$result\""); ?></b><?php
} else{print("No one symbol found");}