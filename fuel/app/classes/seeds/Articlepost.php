<?php
namespace Seeds;

class Articlepost
{
    public static function seed()
    {
        \DBUtil::truncate_table('articles');
        \DB::insert(
                'articles'
        )->columns(array(
            'title',
            'body',
            'user_id'
                )
        )->values(array(
            'test1',
            'This is test 1',
            '1'
                ), array(
            'test2',
            'This is test 2',
            '1'
                ), array(
            'test3',
            'This is test 3',
            '1'), array(
            'test4',
            'This is test 4',
            '1'), array(
            'test5',
            'This is test 5',
            '1'), array(
            'test6',
            'This is test 6',
            '1')
        )->execute();
    }
}
