<meta charset="UTF-8">
<?php
require_once 'library/simple_html_dom.php';
//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные
$html = file_get_html('http://ki.tneu.edu.ua/');
//находим все ссылки на странице и...
if($html->innertext!='' and count($html->find('a'))) {
foreach($html->find('div[caption]') as $a){
    echo $a;
//... что то с ними делаем
}
}
//освобождаем ресурсы
$html->clear();
unset($html);
?>