<?php

$pages = [
    'home' => [
        'title' => 'Home page title',
        'route' => ''
    ],
];

foreach($pages as $name => $page) {
    $route = isset($page['route']) ? $page['route'] : $name;
    $app->get('/' . $route, function ($request, $response) use($name, $route, $page) {
        return $this->view->render($response, $name .'.twig', [
            'name' => $name,
            'meta_title' => $page['title'] ? $page['title'] : null,
            'meta_description' => $page['description'] ? $page['description'] : null,
            'current_route' => $request->getUri()->getPath()
        ]);
    })->setName($name);
}
