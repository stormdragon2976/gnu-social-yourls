<?php
/**
 * GNU Social, the distributed open-source microblogging tool
 *
 * Plugin to add URL shortening using yourls
 *
 * PHP version 7
 *
 * LICENCE: This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Plugin
 * @package   GNU Social
 * @author    Storm Dragon <stormdragon2976@gmail.com>
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 */

if (!defined('GNUSOCIAL')) {
    exit(1);
}

class YourlsPlugin extends UrlShortenerPlugin
{
    public $shortenerName = "Yourls";
    public $yourlsDomain;
    public $yourlsKEY;

    function onInitializePlugin(){
        parent::onInitializePlugin();
        if(!isset($this->yourlsDomain))
{
            // TRANS: Exception thrown when the TightUrl plugin has been configured incorrectly.
            throw new Exception(_m('You must specify a yourlsDomain and yourlsKey.'));
        }
    }

    protected function shorten($url)
    {
        $response = $this->http_get($this->yourlsDomain . "/yourls-api.php?action=shorturl&format=text&signature=" . $this->yourlsKey . "&url=" . urlencode($url));
        return $response;
    }

    function onPluginVersion(array &$versions)
    {
        $versions[] = array('name' => sprintf('Yourls (%s)', $this->shortenerName),
                            'version' => GNUSOCIAL_VERSION,
                            'author' => 'Storm Dragon',
                            'homepage' => 'https://social.stormdragon.tk',
                            'rawdescription' =>
                            // TRANS: Plugin description. %s is the shortener name.
                            sprintf(_m('Uses <a href="http://%1$s/">%1$s</a> URL-shortener service.'),
                                    $this->shortenerName));
        return true;
    }
}
