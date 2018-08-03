<?php
$parser = new DOMDocument();
$parser->load("books.xml");
processNodes($parser->documentElement);

function processNodes($node) {
	foreach ($node->childNodes as $child) {
		if ($child->nodeType == XML_TEXT_NODE) {
			echo $child->nodeValue;
		}
		elseif ($child->nodeType == XML_ELEMENT_NODE) {
			processNodes($child);
		}
	}
}
?>
