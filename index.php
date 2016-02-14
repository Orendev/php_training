<?php
/**
 * Created by PhpStorm.
 * User: Adelshin Abai
 * Site: www.orendev.ru
 * Date: 13.02.16
 * xls git log-> xls_1
 * Time: 21:32
 */
//phpinfo();
/**
 * pack() - упоковывает данные в бинарную строку
 * 0х809 - код ID
 * 0х8 - рамер
 * 0х0 - версия
 * 0х10 - тип (worksheet)
 * 0х0 - ИД создания
 * 0х0 год создания
 */
function xlsBOF() {
    echo pack(«ssssss», 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
}

function xlsEOF() {
    echo pack(«ss», 0x0A, 0x00);
    return;
}

/**
 * @param $Row -
 * @param $Col
 * @param $Value
 * 0x0203 - ID
 * 0х0 - индекс записи XF
 * 14 - размер
 */
function xlsWriteNumber($Row, $Col, $Value) {
    echo pack(«sssss», 0x203, 14, $Row, $Col, 0x0);
    echo pack(«d», $Value);
    return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
    $L = strlen($Value);
    echo pack(«ssssss», 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
}
$tab = '
<table border="1">
<tr><td colspan=2 rowspan=2>1</td><td>2</td></tr>
<tr><td>3</td><td>4</td></tr>
</table>
';

$html = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<HTML>
<HEAD>
<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
<STYLE>
BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Arial"; font-size:9pt }
</STYLE>
</HEAD>
<BODY TEXT="#000000">'.
    $tab.'
</BODY>
</HTML>
';
$file = date('d.m.Y-H-i-s', time()).".xls";
header ("Content-Type: text/html;charset=UTF-8");
header ("Content-Disposition: attachment; filename=".$file);

print($html);
/*header('Content-Type: text/html; charset=windows-1251');
header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Content-transfer-encoding: binary');
header('Content-Disposition: attachment; filename=list.xls');
header('Content-Type: application/x-unknown');*/

//header ("Content-Type: text/html;charset=UTF-8");
//header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
//header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
//header ( "Cache-Control: no-cache, must-revalidate" );
//header ( "Pragma: no-cache" );
//header ( "Content-type: application/x-msexcel" );
//header ( "Content-Disposition: attachment; filename=list.xls" );
//header ( "Content-Description: PHP Generated XLS Data" );

//header('Content-Type: application/force-download');
//header('Content-Type: application/octet-stream');
//header('Content-Type: application/download');
//header('Content-Disposition: attachment;filename=list.xls');
//header('Content-Transfer-Encoding: binary ');

//xlsBOF(); //начинаем собирать файл
/*первая строка*/
//xlsWriteLabel(1,0,'Name');
/*вторая строка*/
//xlsWriteLabel(2,0,'№п/п');
//xlsWriteLabel(2,1,'Имя');
//xlsWriteLabel(2,2,'Фамилия');
/*третья строка*/
//xlsWriteNumber(3,0,'1');
//xlsWriteLabel(3,1,'Петр');
//xlsWriteLabel(3,2,'Иванов');
/*...*/
//xlsWriteNumber(32,0,'30');
//xlsWriteLabel(32,1,'Иван');
//xlsWriteLabel(32,2,'Петров');

//xlsEOF(); //заканчиваем собирать

