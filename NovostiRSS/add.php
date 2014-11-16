<?php
    $doc = new DOMDocument();
    $doc->load('http://www.klix.ba/rss/vijesti/bih');
    $arrFeeds = array();
    
    foreach ($doc->getElementsByTagName('item') as $node) {
        $itemRSS = array ( 
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'uvod' => $node->getElementsByTagName('uvod')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
        );
  array_push($arrFeeds, $itemRSS);
    }
    
    $mysqli = new mysqli('localhost', 'root', 'A.M.root00001', 'novostirss');
    
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $stmt = $mysqli->prepare("INSERT INTO `rssitems` (`title`, `uvod`, `link`, `pubDate`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $title, $uvod, $link, $pubDate);
            foreach( $arrFeeds as $RssItem){
                $title = $RssItem["title"];
                $uvod = $RssItem["uvod"];
                $link = $RssItem["link"];
                $pubDate = $RssItem["pubDate"];
                
                $stmt->execute();
            }
        $stmt->close();
    $mysqli->close();
?>