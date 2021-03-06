<?php


namespace fuwu\common\di;

/**
 * Instance represents a reference to a named object in a dependency injection (DI) container or a service locator.
 *
 * You may use [[get()]] to obtain the actual object referenced by [[id]].
 *
 * Instance is mainly used in two places:
 *
 * - When configuring a dependency injection container, you use Instance to reference a class name, interface name
 *   or alias name. The reference can later be resolved into the actual object by the container.
 * - In classes which use service locator to obtain dependent objects.
 *
 * The following example shows how to configure a DI container with Instance:
 *
 * ```php
 * $container = new \yii\di\Container;
 * $container->set('cache', 'yii\caching\DbCache', Instance::of('db'));
 * $container->set('db', [
 *     'class' => 'yii\db\Connection',
 *     'dsn' => 'sqlite:path/to/file.db',
 * ]);
 * ```
 *
 * And the following example shows how a class retrieves a component from a service locator:
 *
 * ```php
 * class DbCache extends Cache
 * {
 *     public $db = 'db';
 *
 *     public function init()
 *     {
 *         parent::init();
 *         $this->db = Instance::ensure($this->db, 'yii\db\Connection');
 *     }
 * }
 * ```
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class Instance
{
    /**
     * @var string the component ID, class name, interface name or alias name.
     */
    public $id;
    
    /**
     * Instance constructor.
     *
     * @param string $id
     */
    protected function __construct($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param string $id the component ID
     *
     * @return static
     */
    public static function of($id)
    {
        return new static($id);
    }
    
    public static function ensure($reference, $type = null, $container = null)
    {
    
    }
    
    /**
     * @param Container $container
     *
     * @return null
     */
    public function get($container = null)
    {
        if ($container) {
            return $container->get($this->id);
        }
        
        return null;
    }
}
