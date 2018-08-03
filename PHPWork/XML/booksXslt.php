<?php
$processor = new XsltProcessor;

$xsl = new DOMDocument;
$xsl->load("books.xsl");
$processor->importStylesheet($xsl);

$xml = new DOMDocument;
$xml->load('books.xml');

$result = $processor->transformToXml($xml);

echo $result;
?>
