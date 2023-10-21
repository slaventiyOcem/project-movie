<?php

namespace app\controllers;

use app\controllers\AbstractController;
use app\core\TemporaryStorage;
use app\models\DirectorModel;
use app\models\MovieModel;

class MovieController extends AbstractController
{

    /**
     * @var MovieModel $movie
     *
     * Variable representing a movie model object.
     */
    private $movie;

    /**
     * @var DirectorModel $director
     *
     * Variable representing a director model object.
     */
    private $director;


    /**
     * Constructor for the MovieController class.
     * Creates instances of MovieModel and DirectorModel and assigns them to the respective properties.
     */
    public function __construct()
    {
        parent::__construct();
        $this->movie = new MovieModel();
        $this->director = new DirectorModel();
    }

    /**
     * Method index()
     *
     * This method is typically called when accessing the "index" action of the controller.
     * It retrieves the user data, fetches all movies, and renders the "task_movie" view.
     *
     * @return void
     */
    public function index()
    {
        $user = TemporaryStorage::check();
        return $this->view->render('task_movie', ['movies' => $this->movie->getAll(), 'user' => $user]);
    }

    /**
     * Method form()
     *
     * This method is used to display a form for creating or editing a movie.
     * It retrieves user data and the list of directors from DirectorModel and passes them to the view.
     * If an "id" parameter is present in the query string, it fetches the movie with that ID and passes it to the view.
     *
     * @return void
     */

    public function form()
    {
        $user = TemporaryStorage::check();
        $data = [
            'directors' => $this->director->getAll(),
            'user' => $user
        ];

        if ($id = $_GET['id'] ?? false) {
            $data['movie'] = $this->movie->getById($id);
        }
        return $this->view->render('form_movie', $data);
    }


    /**
     * Save new movie
     */
    public function store()
    {

        $directorid = filter_input(INPUT_POST, 'directorId');

        $nameMovie = filter_input(INPUT_POST, 'nameMovie');
        $decs = filter_input(INPUT_POST, 'desc');
        $dateMovie = filter_input(INPUT_POST, 'date');
        $this->movie->add($directorid, $nameMovie, $decs, $dateMovie);
        header('Location: /movie/index');
        exit();
    }

    /**
     * Save updated movie data
     */
    public function update()
    {

        $id = filter_input(INPUT_POST, 'movieId');
        $directorid = filter_input(INPUT_POST, 'directorId');

        $nameMovie = filter_input(INPUT_POST, 'nameMovie');
        $decs = filter_input(INPUT_POST, 'desc');
        $dateMovie = filter_input(INPUT_POST, 'date');
        $this->movie->update($id, $directorid, $nameMovie, $decs, $dateMovie);

        header('Location: /movie/index');
        exit();
    }


    /**
     * Method delete movie by ID
     */
    public function delete()
    {
        $id = $_GET['id'];
        $this->movie->destroy($id);
        header('Location: /movie/index');
        exit();
    }

    /**
     * Renders the index view with a list of directors.
     *
     * Retrieves a list of directors, processes the data, and renders the 'task_index' view.
     */
    public function renderIndex()
    {
        $directors = $this->director->getAll();
        $result = array_map(function ($item) {
            return $item[0] = $item[1];
        }, $directors);
        $this->view->render('task_index', ['directors' => $result]);
    }
}
