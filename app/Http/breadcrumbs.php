<?php
// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > Blog
Breadcrumbs::register('blog', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});