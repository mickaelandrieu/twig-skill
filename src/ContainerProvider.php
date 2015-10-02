<?php
namespace Jarvis\Skill\Twig;
use Jarvis\Jarvis;
use Jarvis\Skill\DependencyInjection\ContainerProviderInterface;
/**
 * @author Mickaël Andrieu <andrieu.travail@gmail.com>
 */
class ContainerProvider implements ContainerProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(Jarvis $jarvis)
    {
        $jarvis['twig'] = function () {
            $loader = new \Twig_Loader_Filesystem(TWIG_CONFIG['twig']['templates_path']);

            return new \Twig_Environment($loader);
        };

        $jarvis->lock('twig');
    }
}
