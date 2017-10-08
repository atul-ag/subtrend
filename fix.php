<?php
echo "Fixing";
echo "<br>";
include("init.php");

$raw = new sData();
$raw->setContest($contestName);
foreach ($contestQuestions as $question) {
	$raw->setQuestion($question);
	$path=$contestName."/".$question;

	echo $path."<br>";

    $starArray = json_decode(file_get_contents($path . "/starData.json"),true);
    $langArray = json_decode(file_get_contents($path . "/langData.json"),true);

    $fsa=array("contestName"=>$contestName,"contestQuestion"=>$question,"time"=>array("$id"=>array_fill(0, 8, 0)),"pointer"=>array("$id"=>array("page"=>0,"line"=>0)));

    $fla=array("contestName"=>$contestName,"contestQuestion"=>$question,"time"=>array("$id"=>array()),"pointer"=>array("$id"=>array("page"=>0,"line"=>0)));
    //var_dump($starArray["pointer"]);
    //echo "<br><br>";
    //var_dump($langArray["pointer"]);
    //echo "<br><br>";
    $currStarArray = end($fsa["time"]);
    $currLangArray = end($fla["time"]);

    $ni=0;
    $nj=1;
    //print_r($currStarArray);
    foreach ($starArray["pointer"] as $id=>$iter) {
    	$i=$ni;
    	$j=$nj;
    	$ni=$iter["page"];
    	$nj=$iter["line"];
    	echo $id." ".$ni." ".$nj."<br>";
    	for(;$i<=$ni;$i++) {
    		$raw->setPage($i);
    		echo $raw->getUrl();
    		//$htmlData = httpGet($raw->getUrl());
    	//---------------Filter-----------------//
		    $dom = new DOMDocument();
		    $dom->loadHTML($html);
		    $rows = $dom->getElementsByTagName(tr);
		    //var_dump($rows->item(1)->childNodes);
		    //$oloop=$rows->length -1;
		    if($i==$ni) {
		    	$j=1;
		    	$oloop=$nj;
		    }
		    else {
		    	$j=1;
		    	$oloop=12;
		    }
		    for(;$j<=$oloop;$j++) {
		    	echo " ".$j;
		    //foreach ($rows as $row) {
		        $cols  = $rows[$j]->childNodes;
		        $name=$cols[0]->nodeValue;
		        $star=$name[0];
		        $lang=$cols[3]->nodeValue;
		        if(is_numeric($star)) {
		            //star based
		            //echo $star." ".$cols[3]->nodeValue;
		            $currStarArray[$star]++;
		            $currLangArray["$lang"]++;

		        }
		        else {
		            //0 star or newbie
		            $currStarArray[0]++;
		            $currLangArray["$lang"]++;

		            //echo $star." () ".$cols[3]->nodeValue;
		        }
		       // echo "<br>";
		    }
		    echo "<br>";
    	//---------------Filter-----------------//
		}
		$j=nj;
        $fsa["time"]["$id"]=$currStarArray;
        $fla["time"]["$id"]=$currLangArray;
    }
    //var_dump($fsa);
    echo "<br><br>";
}


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

?>