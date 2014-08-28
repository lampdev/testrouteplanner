Route Planner Test Assignment
=========

Note that due to the lack of time I did not implement the following

  - autoloader
  - namespaces
  - some logical checks in the classes, e.g. not checking in Route_Planner::calculateRoute() whether the ::_inputCards is initialized
  - magic getters and setters

Testing/Launching
----

In order to test it, just launch testscript.php as follows:

```sh
php testscript.php
```

Feel free to change the number of points in the testscript.php source:

```php
$test = new Test(15);
```

License
----

MIT