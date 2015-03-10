JavaScript-Variables
============
Send variables into JavaScript. Can be used standalone or with a Laravel service provider.

### Installation
Add to your composer.json file
```json
"dowilcox/knp-menu-laravel": "dev-master"
```

```php
$jsVar = new Dowilcox\JsVar\JsVar('namespace');
```

### Installation (Laravel)

In config/app.php add the service provider and alias.

```php
'Dowilcox\JsVar\JsVarServiceProvider',
```

```php
'JsVar' => 'Dowilcox\JsVar\Facades\JsVar',
```

### Example

```php
$jsVar->add('key', 'value');

echo $jsVar->dump();
```

Will output:
```javascript
window.namespace = window.namespace || {key: 'value'};
```
