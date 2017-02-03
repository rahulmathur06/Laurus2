<?php
/**
 * Created by PhpStorm.
 * User: ekontiki89
 * Date: 09/10/15
 * Time: 1:38 PM
 */

namespace App\Presenters;

use Pingpong\Menus\Presenters\Presenter;

class SidebarMenuPresenter extends Presenter
{
    /**
     * {@inheritdoc }
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL .'<ul class="sidebar-menu">'. PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL.'</ul>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return '<li'.$this->getActiveState($item).'><a href="'. $item->getUrl() .'">'
        .$item->getIcon().' <span>'.$item->title.'</span></a></li>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }
     */
    public function getActiveState($item)
    {
        return \Request::is($item->getRequest()) ? ' class="active"' : null;
    }
    /*
      public function getActiveState($item, $state = ' class="active"')
    {
        return $item->isActive() ? $state : null;
    }
     */
    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'active')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }
     */
    public function getDividerWrapper()
    {
        return '<li class="divider"></li>';
    }

    /**
     * {@inheritdoc }
     */
    public function getMenuWithDropDownWrapper($item)
    {

        return '<li class="treeview'.$this->getActiveStateOnChild($item, ' active').'">
                <a href="#">
                     ' . $item->getIcon() . '

                     <span>'.$item->title.'</span>

                     <i class="fa fa-angle-left pull-right"></i>
                </a>
                    <ul class="treeview-menu">
                      '.$this->getChildMenuItems($item).'
                    </ul>
              </li>' . PHP_EOL;

    }

    /**
     * Get multilevel menu wrapper.
     *
     * @param \Pingpong\Menus\MenuItem $item
     *
     * @return string`
     */
    public function getMultiLevelDropdownWrapper($item)
    {


        return $this->getMenuWithDropDownWrapper($item);
    }




}

