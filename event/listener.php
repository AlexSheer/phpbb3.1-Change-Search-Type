<?php
/**
*
* @package phpBB Extension - Change search type
* @copyright (c) 2015 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace sheer\change_search_type\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
/**
* Assign functions defined in this class to event listeners in the core
*
* @return array
* @static
* @access public
*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'	=> 'page_header_after',
			'core.user_setup'			=> 'load_language_on_setup',
		);
	}

	/** @var \phpbb	emplate	emplate */
	protected $template;

	/**
	* Constructor
	*/
	public function __construct(\phpbb\template\template $template)
	{
		$this->template = $template;
	}

	public function page_header_after($event)
	{
		$pattern = array('http://', 'https://');
		$replacement = array('', '');
		$this->template->assign_vars(array(
			'S_CHANGE_SEARCH_TYPE'			=> true,
			'S_SITE_SEARCHED_NAME'			=> str_replace($pattern, $replacement, generate_board_url()),
		));
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'sheer/change_search_type',
			'lang_set' => 'change_search_type',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
}
