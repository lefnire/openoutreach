<?php
/**
 * $event
 *   An array with the following information about each event:
 *
 *   $event['uid'] - a unique id for the event (usually the url).
 *   $event['summary'] - the name of the event.
 *   $event['start'] - the formatted start date of the event.
 *   $event['end'] - the formatted end date of the event.
 *   $event['rrule'] - the RRULE of the event, if any.
 *   $event['timezone'] - the formatted timezone name of the event, if any.
 *   $event['url'] - the url for the event.
 *   $event['location'] - the name of the event location, or a vvenue location id.
 *   $event['description'] - a description of the event.
 *   $event['alarm'] - an optional array of alarm values.
 *    @see date-valarm.tpl.php.
 *
 * If you are editing this file, remember that all output lines generated by it
 * must end with DOS-style \r\n line endings, and not Unix-style \n, in order to
 * be compliant with the iCal spec (see http://tools.ietf.org/html/rfc5545#section-3.1)
 **/
$date = date_now('UTC');
$current_date = !empty($event['current_date']) ? $event['current_date'] : $date->format(DATE_FORMAT_ICAL);
print "BEGIN:VEVENT\r\n";
print "UID:" . $event['uid'] . "\r\n";
print "SUMMARY:" . $event['summary'] . "\r\n";
print "DTSTAMP:" . $current_date . "Z\r\n";
print "DTSTART:" . $event['start'] . "Z\r\n";
if (!empty($event['end'])) {
  print "DTEND:" . $event['end'] . "Z\r\n";
}
if (!empty($event['rrule'])) {
  print $event['rrule'] . "\r\n";
}
if (!empty($event['url'])) {
  print "URL;VALUE=URI:" . $event['url'] . "\r\n";
}
if (!empty($event['location'])) {
  print "LOCATION:" . $event['location'] . "\r\n";
}
if (!empty($event['description'])) {
  print "DESCRIPTION:" . $event['description'] . "\r\n";
}
print "END:VEVENT\r\n";
