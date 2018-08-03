<html>
<head>
  <title>私の書庫</title>
</head>

<body>
<?php
class bookList
{
  const FIELD_TYPE_SINGLE = 1;
  const FIELD_TYPE_ARRAY = 2;
  const FIELD_TYPE_CONTAINER = 3;

  var $parser;
  var $record;
  var $currentField = '';
  var $fieldType;
  var $endsRecord;
  var $records;

  function __construct($filename)
  {
    $this->parser = xml_parser_create();
    xml_set_object($this->parser, $this);
    xml_set_element_handler($this->parser, "elementStarted", "elementEnded");
    xml_set_character_data_handler($this->parser, "handleCdata");

    $this->fieldType = array(
      'title' => self::FIELD_TYPE_SINGLE,
      'author' => self::FIELD_TYPE_ARRAY,
      'isbn' => self::FIELD_TYPE_SINGLE,
      'comment' => self::FIELD_TYPE_SINGLE,
    );

    $this->endsRecord = array('book' => true);

    $xml = join('', file($filename));
    xml_parse($this->parser, $xml);

    xml_parser_free($this->parser);
  }

  function elementStarted($parser, $element, &$attributes)
  {
    $element = strtolower($element);

    if (isset($this->fieldType[$element]) && $this->fieldType[$element] != 0) {
      $this->currentField = $element;
    }
    else {
      $this->currentField = '';
    }
  }

  function elementEnded($parser, $element)
  {
    $element = strtolower($element);

    if (isset($this->endsRecord[$element])) {
      $this->records[] = $this->record;
      $this->record = array();
    }

    $this->currentField = '';
  }

  function handleCdata($parser, $text)
  {
    if (isset($this->fieldType[$this->currentField]) && $this->fieldType[$this->currentField] == self::FIELD_TYPE_SINGLE) {
      isset($this->record[$this->currentField]) ? $this->record[$this->currentField] .= $text : $this->record[$this->currentField] = $text;
    }
    elseif (isset($this->fieldType[$this->currentField]) && $this->fieldType[$this->currentField] == self::FIELD_TYPE_ARRAY) {
      $this->record[$this->currentField][] = $text;
    }
  }


  function showMenu()
  {
    echo "<table border=\"1\">\n";

    foreach ($this->records as $book) {
      echo "<tr>";
      echo "<th><a href=\"{$_SERVER['PHP_SELF']}?isbn={$book['isbn']}\">";
      echo "{$book['title']}</a></th>";
      echo "<td>" . join(', ', $book['author']) . "</td>\n";
      echo "</tr>\n";
    }

    echo "</table>\n";
  }

  function showBook($isbn)
  {
    foreach ($this->records as $book) {
      if ($book['isbn'] !== $isbn) {
        continue;
      }

    echo "<p><b>{$book['title']}</b> by " . join(', ', $book['author']) . "<br />";
    echo "ISBN： {$book['isbn']}<br />";
    echo "コメント： {$book['comment']}</p>\n";
    }

    echo "<p><a href=\"{$_SERVER['PHP_SELF']}\">一覧</a>に戻る</p>";
  }
}

$library = new BookList("books.xml");

if (isset($_GET['isbn'])) {
  //詳細情報をかえす
  $library->showBook($_GET['isbn']);
}
else {
  //メニューをかえす
  $library->showMenu();
} ?>

</body>

</html>
