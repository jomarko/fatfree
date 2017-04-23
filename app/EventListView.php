<?php


class EventListView
{
    function display($f3) {
        $f3->set('result',$f3->get('DB')->exec('SELECT * FROM p_actions WHERE datefrom >= CURRENT_DATE ORDER BY datefrom ASC;'));
        $f3->set('content', 'EventListView.html');
        echo \Template::instance()->render('layout.htm');

    }

    function displayPast($f3) {
        $f3->set('result',$f3->get('DB')->exec('SELECT * FROM p_actions WHERE datefrom < CURRENT_DATE AND kronika=1 ORDER BY datefrom DESC;'));
        $f3->set('content', 'EventListView.html');
        echo \Template::instance()->render('layout.htm');

    }
}