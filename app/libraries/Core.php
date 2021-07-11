<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core {

    private $currentController = 'Index';
    private $currentMethod = 'index';
    private $params = [];

    /**
     * Construct: Processes the app by parsing the URL and sets the controller, 
     * method and method parameters.
     * @access public
     */
    public function __construct(){
        $this->parseUrl();

        try{
            $this->getController();
            $this->getMethod();
            $this->getParams();
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    /**
     * getController: Checks if the first URL element is set, 
     * replace the default controller class string if the given class exists.
     * If the class exists, said string is replaced with a new instance of it.
     * @access private
     * @return void
     */
    private function getController(){
        if(isset($this->params[0])){
            if(file_exists('../app/controllers/' . ucwords($this->params[0]) . '.php')){
                $this->currentController = ucwords($this->params[0]);
                unset($this->params[0]);
            }
        }
        require '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;
    }

    /**
     * getMethod: Checks if the second URL element is set, 
     * replace the default method string if the given method exists inside the 
     * controller.
     * @access private
     * @return void
     */
    private function getMethod(){
        if(isset($this->params[1])){
            if(method_exists($this->currentController, $this->params[1])){
                $this->currentMethod = $this->params[1];
                unset($this->params[1]);
            }
        } 
    }

    /**
     * getParams: Checks if the URL has any remaining elements, setting the 
     * parameters as a rebase of it if true or an empty array if false.
     * @access private
     * @return void
     */
    private function getParams(){
        $this->params = $this->params ? array_values($this->params): [];
    }

    /**
     * Parse URL: Gets the different parts of the URL string.
     * @access private
     * @return void
     */
    private function parseUrl(){
        if(isset($_GET['url'])){
            $this->params = rtrim($_GET['url'], '/');
            $this->params = filter_var($this->params, FILTER_SANITIZE_URL);
            $this->params = explode('/', $this->params);
        }
    }

    /**
     * Run: Calls the controller class and method with parameters.
     * @access public
     * @return void
     */
    public function run(){
         call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
}