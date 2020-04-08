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

/* product-list.html */
class __TwigTemplate_24aae1e2412deaf65ff790d9018ae4ad0582fbae3fcecd65373ff3d464eb6f5b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "product-list.html", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Product List";
    }

    // line 6
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "  <h1>";
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "<a href=\"http://localhost/webpro2020/week10/612110172/slim/public/product/add\">Add Product</a>
<table border=\"1\">
  <tr class=\"column\">
    <th>Name</th>
    <th>Categopry</th>
    <th>Price</th>
    <th>Quantity</th>
  </tr>
  ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            echo " <!-- แต่ว่าตรงนี้เราวน data ทีละตัว แล้วแต่ละตัวนั้นใส่ในตัวแปรชื่อ item เราก็เลยใช้ item -->
  <tr>
    <td class=\"product_name\"><a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("product-view", ["id" => twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 21)]), "html", null, true);
            echo "\">
      ";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 22), "html", null, true);
            echo "
    </a></td>
    <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "category", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
    <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 25), 2), "html", null, true);
            echo "</td>
    <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "qty", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
  </tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "product-list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 29,  104 => 26,  100 => 25,  96 => 24,  91 => 22,  87 => 21,  80 => 19,  70 => 11,  66 => 10,  59 => 7,  55 => 6,  48 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "product-list.html", "C:\\xampp\\htdocs\\webpro2020\\week10\\612110172\\slim\\templates\\product-list.html");
    }
}
