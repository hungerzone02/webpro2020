<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout.html */
class __TwigTemplate_ee4d9176cbf8c759aca8cd136832f9fe670bd7f7b8f95fde0098403766b30676 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 10
        echo "  </head>
  <body>
    <div id=\"header\">
<!-- START: header -->
";
        // line 14
        $this->displayBlock('header', $context, $blocks);
        // line 15
        echo "<!-- END: header -->
    </div>
    <div id=\"content\">
<!-- START: content -->
";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "<!-- END: content -->
    </div>
</body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <meta charset=\"UTF-8\" />
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" type=\"text/css\"
      href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->getBasePath(), "html", null, true);
        echo "/css/app.css\" />
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 14
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 19
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  102 => 19,  96 => 14,  90 => 6,  84 => 8,  79 => 6,  76 => 5,  72 => 4,  64 => 20,  62 => 19,  56 => 15,  54 => 14,  48 => 10,  46 => 4,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html", "C:\\xampp\\htdocs\\webpro2020\\week10\\612110172\\slim\\templates\\layout.html");
    }
}
