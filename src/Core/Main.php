<?php

namespace App\Core;

use App\Enum\ControllerDefaultMethods;
use App\Enum\HTTPMethod;
use App\Enum\HTTPStatus;
use App\Exception\MethodNotFound;
use App\Interfaces\ControllerInterface;
use App\Interfaces\View;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

class Main
{
    private Router $router;
    private Mustache_Engine $engine;
    private Request $request;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->setRouter($router);
        $this->configureEngine();
        $this->configureRequest();
    }

    public function run(): void
    {
        // Busca a rota registrada
        $matchingRoute = $this->getRouter()->getMatchingRoute();

        // Dispara erro caso a rota não seja encontrada
        if (!$matchingRoute) {
            die('No routes found');
        }

        // Verifica qual o tipo de rota está sendo tratada
        if ($matchingRoute->getDestination() instanceof ControllerInterface) {
            /** @var ControllerInterface $controller */
            $controller = $matchingRoute->getDestination();

            $response = new Response();
            switch ($matchingRoute->getControllerMethod()) {
                case ControllerDefaultMethods::INDEX->value:
                    $indexResponse = $controller->index();

                    if ($indexResponse instanceof View) {
                        /** @var View $indexResponse */
                        $this->getEngine()->render($indexResponse->getTemplateName(), $indexResponse->getData());
                    } else {
                        /** @var array $indexResponse */
                        $response->code = HTTPStatus::OK->value;
                        $response->setResult($indexResponse);
                    }
                    break;
                case ControllerDefaultMethods::GET_BY_ID->value:
                    $response = $controller->getById();
                    break;
                case ControllerDefaultMethods::UPDATE->value:
                    $response = $controller->update();
                    break;
                case ControllerDefaultMethods::DELETE->value:
                    $response = $controller->delete();
                    break;
                default:
                    // WARNING: insecure method being called
                    if (method_exists($controller, $matchingRoute->getControllerMethod())) {
                        /** @var Response $response */
                        $response = call_user_func_array([$controller, $matchingRoute->getControllerMethod()], []);
                        if (!$response instanceof Response) {
                            die('The response of the method must return an instance of ['.Response::class.']');
                        }
                    }
            }
            $this->returnResponse($response);
        } elseif ($matchingRoute->getDestination() instanceof View) {
            $view = $matchingRoute->getDestination();
            echo $this->getEngine()->render($view->getTemplateName(), $view->getData());
        } else {
            echo 'unknown route';
        }
    }

    private function returnResponse(Response $response): void
    {
        header('Content-type: application/json');
        echo json_encode($response);
    }

    private function configureRequest(): void
    {
        // Controle dos parâmetros enviados para a aplicação
        try {
            $this->request = new Request();
            $this->request->setBodyParams($_REQUEST);
            $this->request->setUrlParams($_GET);
            $this->request->setMethod(HTTPMethod::from($_SERVER['REQUEST_METHOD']));
        } catch (MethodNotFound $e) {
            http_response_code(HTTPStatus::METHOD_NOT_ALLOWED->value);
            die($e);
        }
    }

    /**
     * Configura o motor de apresentação de dados
     */
    private function configureEngine(): void
    {
        $this->engine = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(
                '../src/Template',
                ['extension' => '.html']
            )
        ]);
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @param Router $router
     */
    public function setRouter(Router $router): void
    {
        $this->router = $router;
    }

    /**
     * @return Mustache_Engine
     */
    public function getEngine(): Mustache_Engine
    {
        return $this->engine;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}