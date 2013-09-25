<?php

// Settings
@include_once __DIR__ . '/settings.php';

!defined('DOC_PATH') && define('DOC_PATH', __DIR__ . '/data/docs/');
!defined('HT_PATH') && define('HT_PATH', '/');


// Bootstrap

require_once __DIR__ . '/vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path'    => __DIR__ . '/templates/',
    'mode'              => $_SERVER['APPLICATION_ENV'],
));

$app->notFound(function() use ($app) {
    $app->render('err_404.phtml', array(
        'title'     => 'Could not find the document..',
        'content'   => "I'm sorry, but the document you're searching for could not be found.",
    ));
});


// Front controller rules

$app->get('/:area/?', function($area) use ($app) {
    $doc_dir = DOC_PATH . $area . '/';
    if (!file_exists($doc_dir)) {
        $app->notFound();
    }

    if (!file_exists($doc_dir . '_settings.json') &&
        !file_exists($doc_dir . '_index.md'))
    {
        $app->notFound();
    }

    $page = new \Content\Page($doc_dir);
    $page
        ->setHtPath(HT_PATH)
        ->setArea($area)
        ->setContentFile('_index.md')
        ->setSidebarFile('_sidebar.md');

    try {
        $content = $page->getContent();
    } catch (\Content\NotFoundException $e) {
        $content = null;
    }

    $app->render('page.phtml', array(
        'title'     => $page->getTitle(),
        'content'   => $content,
        'sidebar'   => $page->getSidebarContent(),
        'root'      => HT_PATH . $area,
    ));
});

$app->get('/:area/:path+', function($area, $path) use ($app) {

    // Make sure the document directory is available for the area.
    $doc_dir = DOC_PATH . $area . '/';
    if (!file_exists($doc_dir)) {
        $app->notFound();
    }

    // Clean the path
    $orig_path = realpath($doc_dir . implode('/', $path));
    foreach ($path as $i => &$t) {
        $t = str_replace('.', '', $t);
        if (empty($t)) {
            unset($path[$i]);
        }
    }

    // Comprise the path to the markdown file
    $doc_file = implode('/', $path) . '.md';
    if ($doc_file[0] === '_') {
        $app->notFound();
    }

    $page = new \Content\Page($doc_dir);
    $page
        ->setHtPath(HT_PATH)
        ->setArea($area)
        ->setContentFile($doc_file)
        ->setSidebarFile('_sidebar.md');

    try {
        $content = $page->getContent();
    } catch (\Content\NotFoundException $e) {
        if (!file_exists($orig_path)) {
            $app->notFound();
        }

        if (empty($orig_path) || strpos($orig_path, DOC_PATH) === false) {
            $app->notFound();
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $orig_path);
        finfo_close($finfo);

        header("Content-type: $mime_type");
        readfile($orig_path);
        exit;
    }

    $app->render('page.phtml', array(
        'title'     => $page->getTitle(),
        'content'   => $content,
        'sidebar'   => $page->getSidebarContent(),
        'root'      => HT_PATH . $area,
    ));
});

$app->run();
