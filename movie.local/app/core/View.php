<?php

namespace app\core;

/**
 * The View class handles rendering pages using templates and data.
 */
class View
{
    /**
     * The default template name.
     * @var string
     */
    private $template = 'main';

    /**
     * Constructor of the class.
     *
     * @param string|null $template - the template name (optional parameter)
     * @return void
     */
    public function __construct($template = null)
    {
        if ($template !== null) {
            $this->template = $template;
        }
    }

    /**
     * Renders a page using the specified template and provided data.
     *
     * @param string $page - the page name
     * @param array $data - an array of data to be passed to the template
     * @return void
     */
    public function render($page, array $data = [])
    {
        extract($data);
        include_once '../views/templates/' . $this->template . '_template.php';
    }
}
