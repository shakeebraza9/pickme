<?php
if (isset($_GET['page'])) {
    require_once(__DIR__ . "/classes/imagesproduct_ajax.class.php");
     $page = $_GET['page'];
    // var_dump($page);
   
    $ajax = new news_ajax();
    switch ($page) {
        case 'deleteassign':
            $ajax->deleteAssign();
            break;
          case 'albumEditImageDel':
            $ajax->albumEditImageDel();
            break;

        case 'albumAltUpdate':
            $ajax->albumAltUpdate();
            break;

        case 'sortAlbumImage':
            $ajax->sortAlbumImage();
            break;

        case 'activeAlbums':
            $ajax->activeAlbums();
            break;

        case 'deleteAlbum':
            $ajax->deleteAlbum();
            break;
    }
}
