Shortens urls using yourls with an api key.
yourls: https://github.com/YOURLS/YOURLS 
Storm Dragon https://social.stormdragon.tk/storm

Installation
Place this directory un the plugins directory of your GNU Social installation.
You will need to change the name from gnu-social-yourls to Yourls. 
Add the plugin with your yourls domain and apikey to the bottom of your config.php file:

Example

addPlugin('Yourls', array(
    'yourlsDomain' => 'http://example.org',
    'yourlsKey' => 'abcdefg'
));

