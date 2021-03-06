<?PHP // $Id: version.php,v 1.4.10.10 2011/03/15 21:46:18 diml Exp $

/**
* @package mod-scheduler
* @category mod
* @author Valery Fremaux > 1.8
* @updated Andriy Semenets > 2010091800
*/

/////////////////////////////////////////////////////////////////////////////////
///  Code fragment to define the version of scheduler
///  This fragment is called by moodle_needs_upgrading() and /admin/index.php
/////////////////////////////////////////////////////////////////////////////////

$module->version  = 2012093000;  // The current module version (Date: YYYYMMDDXX)
$module->requires = 2004082300;  // Requires this Moodle version
$module->cron     = 60;           // Period for cron to check this module (secs)

?>
