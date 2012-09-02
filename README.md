moodletdmu-mod_scheduler19
==========================

TDMU specail edition of the Appointment Scheduler for Moodle version 1.9

==========================
link: http://moodle.org/mod/data/view.php?d=13&rid=2732
Type: Activity Module
Requires: Moodle 1.9 or later
Status: Contributed
Maintainer(s): Valery Fremaux (Val'EISTI)

The Scheduler 1.9 is a redraw of the Scheduler module, designed for handling physical individual appointment schedule between students and teachers (or any attendant and attendee).

The Scheduler provides interface for defining time slots reserved for appointment, and attendees can apply for a time slot.

The module handles group appointments, allowing a slot to be open for up to some students at a time. Group appointments can be setup using Moodle standard groups within a course.

The scheduler notifyes both teacher and student on changes in the appointement planning, and will send reminders if required.

The appointment can be evaluated, so suitable for internship or project review evaluations. 
==========================
Original readme.txt:
--------------------------------------------------------------------------
Appointment Scheduler for Moodle

This is a completely redrawn scheduler module that allows teachers to publish
appointment slots and students to appoint to these slots.

The redraw features :

Software implementation
- enhanced data model, with better normalization
- complete Model-View-Conroller design pattern
- code splitting and reorganization
- library redraw

Features
- complete backup/restore handling
- appointment grading capabilities
- enhanced slot management API
- volatile control
- more instance parameters
- email notifications for release and hold of slots
- added capability control
- added cross treacher scheduling
- added limiting to more than 1 user
- added guard time control for volatile slots
- added "appoint submanagement when adding/updating slots"
- group scheduling based on Moodle groups
- cross grading allowance when multiple teachers on same scheduler (site wide parameter)

Full compatibility from 1.8 upwards.

Install as usual : deploy in <%%MOODLE%%>/mod and go to the administration 
notifications to finish install. 

<valery.fremaux@club-internet.fr>