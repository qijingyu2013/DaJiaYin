<?php

use Illuminate\Database\Seeder;

class SiderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sider')->delete();
        
        \DB::table('sider')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => '控制面板',
                'kword' => 'operation',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'home',
                'updated_at' => '2016-03-25',
            ),
            1 => 
            array (
                'id' => '2',
                'title' => '关于大家银',
                'kword' => 'about',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'list',
                'updated_at' => '0000-00-00',
            ),
            2 => 
            array (
                'id' => '3',
                'title' => '产品中心',
                'kword' => '',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'globe',
                'updated_at' => '0000-00-00',
            ),
            3 => 
            array (
                'id' => '4',
                'title' => '市场动态',
                'kword' => 'asterisk',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'asterisk',
                'updated_at' => '0000-00-00',
            ),
            4 => 
            array (
                'id' => '5',
                'title' => '直播行情分析',
                'kword' => '',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'paperclip',
                'updated_at' => '0000-00-00',
            ),
            5 => 
            array (
                'id' => '6',
                'title' => '大家银学院',
                'kword' => '',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'leaf',
                'updated_at' => '0000-00-00',
            ),
            6 => 
            array (
                'id' => '7',
                'title' => '交易指南',
                'kword' => '',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'question-sign',
                'updated_at' => '0000-00-00',
            ),
            7 => 
            array (
                'id' => '8',
                'title' => '交易平台',
                'kword' => '',
                'pid' => '0',
                'created_at' => '0000-00-00',
                'ctrl' => 'road',
                'updated_at' => '0000-00-00',
            ),
            8 => 
            array (
                'id' => '9',
                'title' => '侧边栏管理',
                'kword' => 'sider',
                'pid' => '1',
                'created_at' => '0000-00-00',
                'ctrl' => '',
                'updated_at' => '0000-00-00',
            ),
            9 => 
            array (
                'id' => '10',
                'title' => '网站运维',
                'kword' => 'operation',
                'pid' => '1',
                'created_at' => '0000-00-00',
                'ctrl' => '',
                'updated_at' => '0000-00-00',
            ),
            10 => 
            array (
                'id' => '11',
                'title' => '大家银贵金属',
                'kword' => 'aboutMe',
                'pid' => '2',
                'created_at' => '2016-03-18',
                'ctrl' => 'unchecked',
                'updated_at' => '2016-03-28',
            ),
            11 => 
            array (
                'id' => '12',
                'title' => '奖项及其认证',
                'kword' => 'award',
                'pid' => '2',
                'created_at' => '2016-03-23',
                'ctrl' => 'leaf',
                'updated_at' => '2016-03-23',
            ),
            12 => 
            array (
                'id' => '13',
                'title' => '大家银优势',
                'kword' => 'superiority',
                'pid' => '2',
                'created_at' => '2016-03-23',
                'ctrl' => 'thumbs-up',
                'updated_at' => '2016-03-23',
            ),
            13 => 
            array (
                'id' => '14',
                'title' => '大家银最新公告',
                'kword' => 'notice',
                'pid' => '2',
                'created_at' => '2016-03-23',
                'ctrl' => 'exclamation-sign',
                'updated_at' => '2016-03-23',
            ),
            14 => 
            array (
                'id' => '15',
                'title' => '媒体报道',
                'kword' => 'media',
                'pid' => '2',
                'created_at' => '2016-03-23',
                'ctrl' => 'headphones',
                'updated_at' => '2016-03-23',
            ),
            15 => 
            array (
                'id' => '16',
                'title' => '研发团队',
                'kword' => 'team',
                'pid' => '2',
                'created_at' => '2016-03-23',
                'ctrl' => 'hdd',
                'updated_at' => '2016-03-23',
            ),
            16 => 
            array (
                'id' => '17',
                'title' => '联系我们',
                'kword' => 'contact',
                'pid' => '2',
                'created_at' => '2016-03-23',
                'ctrl' => 'phone-alt',
                'updated_at' => '2016-03-23',
            ),
            17 => 
            array (
                'id' => '18',
                'title' => '大圆银泰',
                'kword' => 'jme',
                'pid' => '3',
                'created_at' => '2016-03-24',
                'ctrl' => 'registration-mark',
                'updated_at' => '2016-03-24',
            ),
            18 => 
            array (
                'id' => '19',
                'title' => '湘商商品交易中心',
                'kword' => 'xssp',
                'pid' => '3',
                'created_at' => '2016-03-24',
                'ctrl' => 'retweet',
                'updated_at' => '2016-03-24',
            ),
            19 => 
            array (
                'id' => '20',
                'title' => '金山工业',
                'kword' => 'jsgy',
                'pid' => '3',
                'created_at' => '2016-03-24',
                'ctrl' => 'road',
                'updated_at' => '2016-03-24',
            ),
            20 => 
            array (
                'id' => '21',
                'title' => '大圆沥青',
                'kword' => 'jmeliqin',
                'pid' => '18',
                'created_at' => '2016-03-24',
                'ctrl' => 'hdd',
                'updated_at' => '2016-03-24',
            ),
            21 => 
            array (
                'id' => '22',
                'title' => '大圆普洱',
                'kword' => 'jmepuer',
                'pid' => '18',
                'created_at' => '2016-03-24',
                'ctrl' => 'cutlery',
                'updated_at' => '2016-03-24',
            ),
            22 => 
            array (
                'id' => '23',
                'title' => '大圆银',
                'kword' => 'jmeyin',
                'pid' => '18',
                'created_at' => '2016-03-24',
                'ctrl' => 'certificate',
                'updated_at' => '2016-03-24',
            ),
            23 => 
            array (
                'id' => '24',
                'title' => '大家银课堂',
                'kword' => 'lesson',
                'pid' => '6',
                'created_at' => '2016-03-25',
                'ctrl' => 'road',
                'updated_at' => '2016-03-25',
            ),
            24 => 
            array (
                'id' => '25',
                'title' => '投资百科',
                'kword' => 'wiki',
                'pid' => '6',
                'created_at' => '2016-03-25',
                'ctrl' => 'tint',
                'updated_at' => '2016-03-25',
            ),
            25 => 
            array (
                'id' => '26',
                'title' => '交易问答',
                'kword' => 'question',
                'pid' => '6',
                'created_at' => '2016-03-25',
                'ctrl' => 'filter',
                'updated_at' => '2016-03-25',
            ),
            26 => 
            array (
                'id' => '27',
                'title' => '基础知识',
                'kword' => 'basic',
                'pid' => '24',
                'created_at' => '2016-03-25',
                'ctrl' => 'floppy-disk',
                'updated_at' => '2016-03-25',
            ),
            27 => 
            array (
                'id' => '28',
                'title' => '技术面分析',
                'kword' => 'analysis',
                'pid' => '24',
                'created_at' => '2016-03-25',
                'ctrl' => 'saved',
                'updated_at' => '2016-03-25',
            ),
            28 => 
            array (
                'id' => '29',
                'title' => '视频课程',
                'kword' => 'videolesson',
                'pid' => '24',
                'created_at' => '2016-03-25',
                'ctrl' => 'hd-video',
                'updated_at' => '2016-03-25',
            ),
            29 => 
            array (
                'id' => '30',
                'title' => '财经日历',
                'kword' => 'economiccalendar',
                'pid' => '4',
                'created_at' => '2016-03-25',
                'ctrl' => 'tags',
                'updated_at' => '2016-03-25',
            ),
            30 => 
            array (
                'id' => '31',
                'title' => '大家银日刊',
                'kword' => 'journal',
                'pid' => '4',
                'created_at' => '2016-03-25',
                'ctrl' => 'list-alt',
                'updated_at' => '2016-03-25',
            ),
            31 => 
            array (
                'id' => '32',
                'title' => '当日点评',
                'kword' => 'daycomments',
                'pid' => '4',
                'created_at' => '2016-03-25',
                'ctrl' => 'phone',
                'updated_at' => '2016-03-25',
            ),
            32 => 
            array (
                'id' => '33',
                'title' => '市场最新资讯',
                'kword' => 'marketinformation',
                'pid' => '4',
                'created_at' => '2016-03-25',
                'ctrl' => 'phone',
                'updated_at' => '2016-03-25',
            ),
            33 => 
            array (
                'id' => '34',
                'title' => '专家点评',
                'kword' => 'expertcomments',
                'pid' => '4',
                'created_at' => '2016-03-25',
                'ctrl' => 'phone',
                'updated_at' => '2016-03-25',
            ),
            34 => 
            array (
                'id' => '35',
                'title' => '常见问题',
                'kword' => 'commonproblem',
                'pid' => '7',
                'created_at' => '2016-03-25',
                'ctrl' => 'play',
                'updated_at' => '2016-03-25',
            ),
            35 => 
            array (
                'id' => '36',
                'title' => '账户问题',
                'kword' => 'accountproblem',
                'pid' => '35',
                'created_at' => '2016-03-25',
                'ctrl' => 'play',
                'updated_at' => '2016-03-25',
            ),
            36 => 
            array (
                'id' => '37',
                'title' => '其他问题',
                'kword' => 'otherproblem',
                'pid' => '35',
                'created_at' => '2016-03-25',
                'ctrl' => 'play',
                'updated_at' => '2016-03-25',
            ),
            37 => 
            array (
                'id' => '38',
                'title' => '开户指南',
                'kword' => 'establishguide',
                'pid' => '7',
                'created_at' => '2016-03-25',
                'ctrl' => 'random',
                'updated_at' => '2016-03-25',
            ),
            38 => 
            array (
                'id' => '39',
                'title' => '交易问题',
                'kword' => 'transactionproblem',
                'pid' => '35',
                'created_at' => '2016-03-25',
                'ctrl' => 'road',
                'updated_at' => '2016-03-25',
            ),
            39 => 
            array (
                'id' => '40',
                'title' => '线上开户',
                'kword' => 'onlineaccount',
                'pid' => '38',
                'created_at' => '2016-03-25',
                'ctrl' => 'tower',
                'updated_at' => '2016-03-25',
            ),
            40 => 
            array (
                'id' => '41',
                'title' => '线下开户',
                'kword' => 'offlineaccount',
                'pid' => '38',
                'created_at' => '2016-03-25',
                'ctrl' => 'tower',
                'updated_at' => '2016-03-25',
            ),
            41 => 
            array (
                'id' => '42',
                'title' => '江苏大圆银泰',
                'kword' => 'jmeplatform',
                'pid' => '8',
                'created_at' => '2016-03-25',
                'ctrl' => 'indent-left',
                'updated_at' => '2016-03-25',
            ),
            42 => 
            array (
                'id' => '43',
                'title' => '湘商商品交易中心',
                'kword' => 'xsspplatform',
                'pid' => '8',
                'created_at' => '2016-03-25',
                'ctrl' => 'indent-left',
                'updated_at' => '2016-03-25',
            ),
        ));
        
        
    }
}
