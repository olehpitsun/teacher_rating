<meta charset="UTF-8">

<?php
echo $_GET["hm"];
$to = "pichyn7@gmail.com";
$from = "From: pichyn7@ukr.net \r\n";
$subject = $_GET["hm"];
$body = $_GET["st"];
$href =" http://ki.tneu.edu.ua/?c=showArticle&f=show&p=".$_GET["hr"]."";

if (mail($to, $subject, $body . $href,$from)) {
    echo "messege acepted for delivery ";
} else {
    echo "some error happen";
}
?>