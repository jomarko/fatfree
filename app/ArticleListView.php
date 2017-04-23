<?php


class ArticleListView
{
    function display($f3, $params) {
        if($params['id'] != null) {
            $f3->set('articleParts', $f3->get('DB')->exec('SELECT * FROM p_articles_sub WHERE id_category='.$params['id'].' ORDER BY id;'));
        }
        
        $f3->set('content', 'ArticleListView.html');
        echo \Template::instance()->render('layout.htm');

    }
}