<?php

/**
* @package mod-scheduler
* @category mod
* @author Valery Fremaux > 1.8
*
* This is a controller for major teacher side use cases
*
* @usecase addappointed
* @usecase updateappointed
* @usecase doremoveappointed
* @usecase doaddappointed
*/

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from view.php in mod/scheduler
}

switch($subaction){
	/**************************** Make form for adding a student for appointment *************************************/
    case 'addappointed':
        get_slot_data($form);
        $form->what = $action;
        $form->appointments = unserialize(stripslashes(required_param('appointments', PARAM_RAW)));
        $form->subaction = 'doaddappointed';
        $form->studentid = 0;
        $form->attended = 0;
        $form->grade = '';
        $form->slotid = optional_param('slotid', -1, PARAM_INT);

        print_heading(get_string('appointingstudent', 'scheduler'), 'center', 3);
        print_simple_box_start('center', '', '');
        include_once('appoint.html');
        print_simple_box_end();
        echo '<br />';

        // return code for include
        return -1;

	/**************************** Make form for updating an appointed student *************************************/
    case 'updateappointed':
        $studentid = required_param('studentid', PARAM_INT);
        $form->what = $action;
    
        get_slot_data($form);
        $form->appointments = unserialize(stripslashes(optional_param('appointments', '', PARAM_RAW)));
        $form->appointmentssaved = unserialize(stripslashes(optional_param('appointments', '', PARAM_RAW)));
        $form->studentid = $studentid;
        $form->slotid = optional_param('slotid', 0, PARAM_INT);
        $form->attended = $form->appointments[$studentid]->attended;
        $form->grade = $form->appointments[$studentid]->grade;
        $form->appointmentnote = $form->appointments[$studentid]->appointmentnote;
    
        // play again this appointment
        unset($form->appointments[$studentid]);
    
        print_heading(get_string('updatingappointment', 'scheduler'), 'center', 3);
        print_simple_box_start('center', '', '');
        include_once('appoint.html');
        print_simple_box_end();
        echo '<br />';
        
        // return code for include
        return -1;
        
	/**************************** Removes an appointed student from list *************************************/
    case 'doremoveappointed':
        unset($erroritem);
        $erroritem->message = get_string('dontforgetsaveadvice', 'scheduler');
        $erroritem->on = '';
        $errors[] = $erroritem;

        get_slot_data($form);
        $form->what = 'doaddupdateslot';
        $form->studentid = optional_param('studentid', '', PARAM_INT);
        if (!empty($form->studentid)){
            $form->appointments = unserialize(stripslashes(optional_param('appointments', '', PARAM_RAW)));
            unset($form->appointments[$form->studentid]);
        }        
        $form->availableslots = scheduler_get_available_slots($form->studentid, $scheduler->id);            
        $form->slotid = optional_param('slotid', -1, PARAM_INT);
        break;
    
	/**************************** Adds a student to appointed list *************************************/
    case 'doaddappointed':
        unset($erroritem);
        $erroritem->message = get_string('dontforgetsaveadvice', 'scheduler');
        $erroritem->on = '';
        $errors[] = $erroritem;

        get_slot_data($form);
        $form->what = 'doaddupdateslot';
        $form->appointments = unserialize(stripslashes(required_param('appointments', PARAM_RAW)));
        $form->slotid = optional_param('slotid', -1, PARAM_INT);
        
        $form->studentid = $appointment->studentid = required_param('studenttoadd', PARAM_INT);
        $form->availableslots = scheduler_get_available_slots($form->studentid, $scheduler->id);            
        $appointment->attended = optional_param('attended', 0, PARAM_INT);
        $appointment->appointmentnote = optional_param('appointmentnote', '', PARAM_TEXT);
        $appointment->grade = optional_param('grade', 0, PARAM_CLEAN);
        $appointment->timecreated = time();
        $appointment->timemodified = time();
        $form->appointments[$appointment->studentid] = $appointment;
        break;
}
?>