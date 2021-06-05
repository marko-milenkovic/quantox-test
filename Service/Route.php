<?php


use FastRoute\Dispatcher;

class Route
{
    public function init()
    {
        $dispatcher = $this->configureRoutes();

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        $this->checkRoute($routeInfo);
    }

    private function configureRoutes(): Dispatcher
    {
        return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $routeCollector) {
            $routeCollector->addRoute('GET', '/quantox-test/', function () {
                (new StudentController())->studentAction();
            });

            $routeCollector->addRoute('POST', '/quantox-test/create-student', function () {
                (new StudentController())->createStudentAction();
            });

            $routeCollector->addRoute('POST', '/quantox-test/add-student-grade', function () {
                (new StudentController())->addGradeAction();
            });
        });
    }

    private function checkRoute($routeInfo)
    {
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                echo 'Route not found.';
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo 'Method not allowed. Allowed methods: ' . implode(',', $allowedMethods);
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
//                $vars = $routeInfo[2];
                $handler->__invoke();
                break;
        }
    }
}