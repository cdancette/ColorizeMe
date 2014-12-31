<?php



function DOMinnerHTML(DOMNode $element) 
{ 
    $innerHTML = ""; 
    $children  = $element->childNodes;

    foreach ($children as $child) 
    { 
        $innerHTML .= $element->ownerDocument->saveHTML($child);
    }

    return $innerHTML; 
} 


$ch = curl_init("https://wall.deblan.org/x1c8b/python/0/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$page= curl_exec($ch);
$dom = new DOMDocument;
$dom -> loadHTML($page);

$node= $dom->getElementById('wall'); 

$result = DOMinnerHTML($node);
echo $result;
echo '<textarea>'. $result. '</textarea>';

?>
