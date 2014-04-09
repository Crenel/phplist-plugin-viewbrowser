<?php
/**
 * ViewBrowserPlugin for phplist
 * 
 * This file is a part of ViewBrowserPlugin.
 *
 * This plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * @category  phplist
 * @package   ViewBrowserPlugin
 * @author    Duncan Cameron
 * @copyright 2014 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * DAO class providing access to the message table
 * 
 */
class ViewBrowserPlugin_DAO extends CommonPlugin_DAO_User
{
    public function messageData($id)
    {
        $sql = sprintf('
            SELECT subject, message, t.template
            FROM %s AS m
            LEFT JOIN %s AS t ON t.id = m.template
            WHERE m.id = %d',
            $this->tables['message'], $this->tables['template'], $id
        );

        return $this->dbCommand->queryRow($sql);
    }
}