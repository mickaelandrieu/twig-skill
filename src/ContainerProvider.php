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
    public function hydrate(Jarvis $container)
    {
        $container['twig'] = function ($container) {
            $config = array_merge(
                [
                    'auto-reload' => true,
                    'debug' => $container->debug,
                    'strict_variables' => true
                ],
                $container->settings->get('twig', [])
            );

            if (!isset($config['templates_paths'])) {
                throw new \LogicException('Parameter `templates_paths` is missing to configure Twig.');
            }

            $loader = new \Twig_Loader_Filesystem(TWIG_CONFIG['twig']['templates_path'], $config);

            return new \Twig_Environment($loader);
        };

        $container->lock('twig');
    }
}
