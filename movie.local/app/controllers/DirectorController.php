<?php

namespace app\controllers;

use app\core\TemporaryStorage;
use app\models\DirectorModel;
use JetBrains\PhpStorm\NoReturn;


class DirectorController extends AbstractController
{
    /**
     * 
     */
    protected $director;

    /**
     * Constructor for the DirectorController class.
     * Creates an instance of DirectorModel and assigns it to the $director property.
     */
    public function __construct()
    {
        parent::__construct();

        $this->director = new DirectorModel;
    }

    /**
     * Method index()
     *
     * This method is typically called when accessing the "index" action of the controller.
     * It retrieves a list of directors using the DirectorModel and passes it to the view for rendering.
     *
     * @return void
     */
    public function index()
    {
        $user = TemporaryStorage::check();
        return $this->view->render('task_director', ['directors' => $this->director->getAll(), 'user' => $user]);
    }

    /**
     * Method form()
     *
     * This method is used to display a form for creating or editing a director.
     * It retrieves data related to a director (if provided) and passes it to the view for rendering.
     *
     * @return void
     */
    public function form()
    {
        $data = [];
        $user = TemporaryStorage::check();
        if (isset($_GET['id'])) {
            $data['director'] = $this->director->getById((int)$_GET['id']);
        }
        return $this->view->render('form_directors', ['user' => $user, 'data' => $data]);
    }

    /**
     * Method update()
     *
     * This method is used to update the name of a director in the database.
     * It retrieves the director's ID and new name from the submitted form data,
     * and then calls the DirectorModel's update() method.
     * After updating, it redirects the user to the director list page.
     *
     * @return void
     */
    public function update()
    {
        $directorId = filter_input(INPUT_POST, 'directorId');
        $nameDirector = filter_input(INPUT_POST, 'nameDirector');
        $this->director->update($directorId, $nameDirector);
        header('Location: /director/index');
        exit();
    }

    /**
     * Method store()
     *
     * This method is used to create a new director in the database.
     * It retrieves the name of the director from the submitted form data,
     * and then calls the DirectorModel's add() method.
     * After adding, it redirects the user to the director list page.
     *
     * @return void
     */
    public function store()
    {
        $nameDirector = filter_input(INPUT_POST, 'nameDirector');
        $this->director->add($nameDirector);
        header('Location: /director/index');
        exit();
    }

    /**
     * Method delete()
     *
     * This method is used to delete a director from the database.
     * It retrieves the director's ID from the query parameters and calls the DirectorModel's deleteById() method.
     * After deletion, it redirects the user to the director list page.
     *
     * @return void
     */
    public function delete()
    {
        $id = $_GET['id'];
        $this->director->deleteById($id);
        header('Location: /director/index');
    }
}
