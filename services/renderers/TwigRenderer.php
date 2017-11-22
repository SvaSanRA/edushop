<?php
/**
 * Created by PhpStorm.
 * User: svasan
 * Date: 08.11.17
 * Time: 7:31
 */

namespace app\services\renderers;


use app\services\renderers\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $templateDir;
    protected $templater;

    public function __construct()
    {
        $this->templateDir = ROOT_DIR . "/views/twig";
        $loader = new \Twig_Loader_Filesystem($this->templateDir);
        $this->templater =new \Twig_Environment($loader);
    }


    public function render($template, $params = [])
    {
        $template = "{$template}.twig";
        $template = $this->templater->loadTemplate($template);
        return $template->render($params);
    }
}