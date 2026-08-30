<?php

/**
 * Serverless entrypoint for deployment with Vercel (vercel-php runtime).
 * Serves compiled public assets and boots the Laravel application.
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

if ($uri !== '/' && file_exists($file = __DIR__ . '/public' . $uri)) {
    header('Content-type: ' . get_mime_type($file) . '; charset: UTF-8;');
    echo require $file;
} else {
    require_once __DIR__ . '/public/index.php';
}

function get_mime_type($filename)
{
    $extension = strtolower(pathinfo($filename)['extension'] ?? '');

    $mimes = [
        'txt' => 'text/plain',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'webp' => 'image/webp',
        'gif' => 'image/gif',
        'bmp' => 'image/vnd.microsoft.icon',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'ttf' => 'application/x-font-ttf',
        'woff' => 'application/x-woff',
        'woff2' => 'font/woff2',
        'otf' => 'font/otf',
    ];

    return $mimes[$extension] ?? 'application/octet-stream';
}
