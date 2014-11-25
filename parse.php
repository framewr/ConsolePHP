<?php

//Подключаем файл интерфейсов
require_once('interface.php');

class Parse implements IHandler
{
    public function __construct( $id ) { }
    public function getTitle()
    {
        return "Blog Article";
    }
}


class ArticleFactory
{
  public static function Create( $id )
  {
     return new Article( $id );
  }
}
$ao = ArticleFactory::Create( 1 );
echo( $ao->getTitle()."\n" );

?>
