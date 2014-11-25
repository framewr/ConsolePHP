<?php

class parseFactory
{
    public static function Create()
  {
     return new Article( $id );
  }
}
$ao = ArticleFactory::Create( 1 );
echo( $ao->getTitle()."\n" );

?>
