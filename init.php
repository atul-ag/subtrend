<?php
echo time()."<br>";
$contestName = "LOCJUL17";
$contestQuestions = array("CAVECOIN");
//var_dump($contestQuestions);

if(!is_dir($contestName)) {
    mkdir($contestName);
    echo "Making Dir $contestName <br>";
}

foreach ($contestQuestions as $subDir) {
    $path=$contestName."/".$subDir;
    if(!is_dir($path)) {
        mkdir($path);
        $raw = new sData();
        $raw->setContest($contestName);
        $raw->setQuestion($subDir);
        $raw->setMaxPage(0);
        file_put_contents($path."/detail.json",json_encode($raw));
    }
}


?>