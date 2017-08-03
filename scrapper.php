<?php
/**
 * Created by IntelliJ IDEA.
 * User: atulag
 * Date: 26/7/17
 * Time: 4:11 PM
 */


echo time()."<br>";
include("init.php");

//Initialize
$raw = new sData();
$raw->setContest($contestName);
foreach ($contestQuestions as $question) {
    $path=$contestName."/".$question;
    $detail=json_decode(file_get_contents($path."/detail.json"));
    $raw->setQuestion($question);
    $raw->setCurrLine($detail->currLine);
    $raw->setMaxPage($detail->maxPage);
    $raw->setPage($raw->pageContinue()); //var_dump($raw);
    //$raw->manUrl("http://localhost/subtrend/url/page.txt");
    //$htmlData = file_get_contents($raw->getUrl());
    $htmlData = httpGet($raw->getUrl());
    $jsonData = json_decode($htmlData);
    $raw->setMaxPage($jsonData->max_page);
    if($detail->currLine > 1)
        $raw->setPrevMaxPage($detail->prevMaxPage-1);
    else
        $raw->setPrevMaxPage($detail->prevMaxPage);
    //var_dump($jsonData->content);
    //echo $raw->getUrl() ." : ".$raw->pageContinue()." TO ".$raw->getMaxPage()."<br>";
    //filter($jsonData->content);
    $cnt=0;
    while ($raw->remaining()) {
        echo '<br>';
        $cnt++;
        $raw->setPage($raw->pageContinue());
        //$raw->manUrl("url/page.txt");
        //echo $raw->getUrl()."<br>";
        //$htmlData = file_get_contents($raw->getUrl());
        $htmlData = httpGet($raw->getUrl());
        //var_dump($htmlData);
        $jsonData = json_decode($htmlData);
        //$raw->setMaxPage($jsonData->max_page);
        //var_dump($jsonData->content);
        //echo $raw->getUrl() ." : ".$raw->pageContinue()." TO ".$raw->getMaxPage().":$cnt<br>";
        $raw->setCurrLine(filter($htmlData,$raw->getCurrLine()));
        $raw->incrPrevMaxPage();
        file_put_contents($path."/detail.json",json_encode($raw));
    }
}
// Utility Functions

function filter($html,$line) {
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $rows = $dom->getElementsByTagName(tr);
    //var_dump($rows->item(1)->childNodes);
    $oloop=$rows->length -1;
    for($i=$line;$i< $oloop;$i++) {
    //foreach ($rows as $row) {
        $cols  = $rows[$i]->childNodes;
        $name=$cols[0]->nodeValue;
        $star=$name[0];
        if(is_numeric($star)) {
            //star based
            echo $star." ".$cols[3]->nodeValue;
        }
        else {
            //0 star or newbie

            echo $star." () ".$cols[3]->nodeValue;
        }
        echo "<br>";
    }
    return (($oloop-1)%12)+1;
}


function save($raw) {
    $jsonSave = json_encode($raw);
    file_put_contents("url/data.txt", $jsonSave);
}

function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

function httpGet($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: graph.facebook.com'));
    $output = curl_exec($ch);
    if($output === false) {
        echo "Error Number:".curl_errno($ch)."<br>";
        echo "Error String:".curl_error($ch)."<br>";
    }
    curl_close($ch);
    return $output;
}

// Classes
class sData {
    var $surl;
    var $contestCode;
    var $questionCode;
    var $prevMaxPage=0;
    var $currLine=1;
    var $maxPage=0;
    function __construct($url) {
        $this->surl=$url;
        $this->maxPage=0;
        $this->prevMaxPage=0;
    }
    function manUrl($url) {
        $this->surl=$url;
    }
    function setContest($cCode) {
        $this->contestCode = $cCode;
    }

    function setQuestion($qCode) {
        $this->questionCode = $qCode;
    }
    function setPage($page) {
        if(isset($this->contestCode) && isset($this->questionCode)) {
            $this->surl = "https://www.codechef.com/ssubmission/prob?page=" . $page . "&pcode=" . $this->questionCode . "&ccode=" . $this->contestCode;
            return true;
        }
        return false;
    }
    function setMaxPage($pageCount) {
        $this->maxPage = $pageCount;
    }
    function setPrevMaxPage($pageCount) {
        $this->prevMaxPage = $pageCount;
    }
    function setCurrLine($val) {
        $this->currLine = $val;
    }
    function incrPrevMaxPage() {
        if($this->prevMaxPage < $this->maxPage) {
            $this->prevMaxPage = $this->prevMaxPage + 1;
        }
    }
    function remaining() {
        return ($this->prevMaxPage < $this->maxPage);
    }
    function pageContinue() {
        return $this->prevMaxPage;
    }
    function getUrl() {
            return $this->surl;
    }
    function getCurrLine() {
        return $this->currLine;
    }
}



//curl 'https://www.codechef.com/ssubmission/prob?page=3&pcode=ZCO14003&ccode=ZCOPRAC' -H 'accept-encoding: gzip, deflate, br' -H 'x-requested-with: XMLHttpRequest' -H 'accept-language: en-GB,en-US;q=0.8,en;q=0.6' -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36' -H 'accept: application/json, text/javascript, */*; q=0.01' -H 'referer: https://www.codechef.com/ZCOPRAC/problems/ZCO14003' -H 'authority: www.codechef.com' -H 'cookie: __utmt=1; __utma=100380940.876135527.1497387992.1497387992.1501067144.2; __utmb=100380940.4.10.1501067144; __utmc=100380940; __utmz=100380940.1497387992.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __asc=fc773be115d7e931215d24030e2; __auc=fc773be115d7e931215d24030e2; poll_time=1501067591662; AWSALB=DAx8JmW3Tk53ZpuEFb+/c0wjDaq+cQMHCD/D0SrD4tHnSuW2LNfDGCAOltW2uKP/sApF6mYAmLgh5dkj6eomRrjGRqxWJZ3v8VBhu+fMdCJlyEsw024ryJL1PFTp; notification=0' -H 'if-modified-since: Wed, 26 Jul 2017 11:11:48 +0000' --compressed

?>