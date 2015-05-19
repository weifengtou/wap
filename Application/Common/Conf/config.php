<?php
return array(
	//'配置项'=>'配置值'

	/* 数据缓存设置 */
    'DATA_CACHE_PREFIX' => 'wft_', // 缓存前缀
    'DATA_CACHE_TYPE'   => 'File', // 数据缓存类型

	/* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  '192.168.1.12', // 服务器地址
    'DB_NAME'               =>  'weifengtou',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'wft_',    // 数据库表前缀  

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__SITE__' => __ROOT__ . '/Public/site',
    ),

    /* SESSION 和 COOKIE 配置 */
    'SESSION_PREFIX' => 'wft_home', //session前缀
    'COOKIE_PREFIX'  => 'wft_home_', // Cookie前缀 避免冲突

    'DEFAULT_FILTER' => 'htmlspecialchars', //全局过滤函数

    'HTML_FILE_SUFFIX'  =>  '.html', //设置静态缓存文件后缀

    'SHOW_PAGE_TRACE' =>true,

    
);