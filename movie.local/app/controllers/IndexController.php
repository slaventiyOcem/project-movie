<?php

namespace app\controllers;

use app\core\TemporaryStorage;
use app\controllers\AbstractController;
use app\models\MovieModel;


class IndexController extends AbstractController
{
    /**
     * 
     */
    private MovieModel $movie;

    /**
     * Constructor for the MovieController class.
     * Creates an instance of MovieModel and assigns it to the $movie property.
     */
    public function __construct()
    {
        parent::__construct();
        $this->movie = new MovieModel();
    }

    /**
     * Method index()
     *
     * This method is typically called when accessing the "index" action of the controller.
     * It renders the default index page with user data.
     *
     * @return void
     */
    public function index()
    {
        $user = TemporaryStorage::check();
        $this->view->render('index_index', ['user' => $user]);
    }

    /**
     * Method searchIndex()
     *
     * This method is used to search and display movies with pagination.
     * It retrieves the current page number from the query parameters and uses the MovieModel
     * to fetch movies with an offset and limit. It also calculates the total number of pages for pagination.
     * Finally, it renders the index page with the retrieved data.
     *
     * @return void
     */
    public function serchIndex()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = $this->movie->getWithOffset($page);
        
        $totalPages = $this->movie->totalPage();
        $user = TemporaryStorage::check();
        $this->view->render('index_index', [
            'data' => $data,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'user' => $user
        ]);
    }
}
