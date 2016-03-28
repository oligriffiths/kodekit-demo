<?php
/**
 * Kodekit Platform - http://www.timble.net/kodekit
 *
 * @copyright	Copyright (C) 2011 - 2016 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		MPL v2.0 <https://www.mozilla.org/en-US/MPL/2.0>
 * @link		https://github.com/timble/kodekit-platform for the canonical source repository
 */

namespace Kodekit\Platform\Foo;

use Kodekit\Library;

/**
 * Foo Dispatcher
 *
 * @author  Johan Janssens <http://github.com/johanjanssens>
 * @package Kodekit\Platform\Foo
 */
class Dispatcher extends Library\DispatcherAbstract
{
    /**
     * Ensure foo is dispatchable
     * @return bool
     */
    public function canDispatch()
    {
        return true;
    }
}
