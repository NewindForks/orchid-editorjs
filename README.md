# Orchid Editorjs Field

[![GitHub Workflow Status](https://github.com/AlexSabur/orchid-editorjs-field/workflows/Run%20tests/badge.svg)](https://github.com/AlexSabur/orchid-editorjs-field/actions)
[![styleci](https://styleci.io/repos/188413486/shield)](https://styleci.io/repos/188413486)

[![Packagist](https://img.shields.io/packagist/v/AlexSabur/orchid-editorjs-field.svg)](https://packagist.org/packages/AlexSabur/orchid-editorjs-field)
[![Packagist](https://poser.pugx.org/AlexSabur/orchid-editorjs-field/d/total.svg)](https://packagist.org/packages/AlexSabur/orchid-editorjs-field)
[![Packagist](https://img.shields.io/packagist/l/AlexSabur/orchid-editorjs-field.svg)](https://packagist.org/packages/AlexSabur/orchid-editorjs-field)

Package description: Work in process

## Installation

Install via composer
```bash
composer require newindforks/orchid-editorjs
```

## Usage

```php

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                EditorJS::make('mydata')->tools([
                    MarkerTool::make('marker'),
                    ImageTool::make('picture')
                    HeaderTool::make('header')
                ])
            ]),
        ];
    }

```

### Register new tool

```bash
php artisan orchid:editorjs:tool MySuperTool
```

And in js
```js

class MySuperTool {
    //code
}

window.editorJSTools = window.editorJSTools || [];
window.editorJSTools['MySuperTool'] = MySuperTool;

```

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
