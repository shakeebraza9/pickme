<?php

if (isset($_GET['page'])) {
    require(__DIR__ . "/classes/gallery_ajax.class.php");
    $page = $_GET['page'];
    var_dump($page);
    $ajax = new gallery_ajax();
    switch ($page) {
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
            
        case 'update':
            $ajax->update();
            break;
    }
}
