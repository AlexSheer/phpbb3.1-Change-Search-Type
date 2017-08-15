<?php
/**
*
* @package phpBB Extension - Change search type
* @copyright (c) 2016 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace sheer\change_search_type\migrations;

class change_search_type_1_0_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['change_search_type_version']) && version_compare($this->config['change_search_type_version'], '1.0.1', '>=');
	}

	static public function depends_on()
	{
		return array('\sheer\change_search_type\migrations\change_search_type_1_0_0');
	}

	public function update_schema()
	{
		return array(
		);
	}

	public function revert_schema()
	{
		return array(
		);
	}

	public function update_data()
	{
		return array(
			// Update configs
			array('config.update', array('change_search_type_version', '1.0.1')),
		);
	}
}
