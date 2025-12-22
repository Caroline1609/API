<?php // /index.php


function main()
{
    // Utilisez les entrées suivantes pour déterminer
    // $_SERVER['REQUEST_METHOD']
    // $_SERVER['REQUEST_URI']
    // Pour lire le corps de la requête, file_get_contents doit être utilisé avec un fichier spécial

 header('Content-type: application/json');

    $path = explode('/', $_SERVER['REQUEST_URI']);
 if('' !== $path[0])
 {
  header('HTTP/1.1 400 Bad Request');
  die('Pas bon');
 }

 array_shift($path);
 $entry_point = array_shift($path);
 if(!in_array($entry_point,  ["bookmarks"], true))
 {
  header('HTTP/1.1 404 Not Found');
  die(json_encode([ 'error' // XXX security
   => sprintf('Entry point \'%s\' not found', $entry_point)
  ], true));
 }

 die (json_encode(($path)));

 $source = new bookmarks;
 $all = $source->all();
 echo json_encode($all, true);
}

class bookmark implements jsonserializable
{
 public function __construct(
  public string $url = '',
  public ?string $title = null
 )
 {
 }

 public function jsonSerialize(): mixed // : array
 {
  return [ 'URL' => $this->url
   , 'Title' => $this->title
  ];
 }
}

interface bookmark_collection
{
    function all(): array;
 /*
    function get_one(int $id): bookmark;
    function delete_one(int $id): bool;
    function add_one(bookmark $b): bool;
  */
}

class bookmarks implements bookmark_collection
{
 function all(): array
 {
  return [
   new bookmark(title: 'toto'), // exemple
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
   new bookmark,
  ];
 }
}

main();
 