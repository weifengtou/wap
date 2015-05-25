<?php
namespace Home\Model;
use Think\Model;

class HomeuserModel extends Model{
	protected $_validate = array(
        array('username','require','用户名必填！'),
        array('username','','账号名称已存在！',0,'unique',1),  //验证用户名唯一
        array('username','/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/','用户名不符合要求。'),  //验证账号，字母开头，允许 5-16 
        array('email','require','邮箱必填！'),
        array('email','','邮箱已存在！',0,'unique',1),  
        array('email','email','邮箱不符合要求。'),  
        // array('mobile','/^1\d{10}$/','手机号格式不正确！'),    //手机号以‘1’开头，共11位
        array('password','require','密码必填！'),        //密码必填
        array('repassword','password','确认密码不正确！',0,'confirm'),   //两次密码是否一致
		);
    protected $_auto = array(
    	array('style','3'),  
        array('status','0'), 
        array('password','md5',3,'function'),  //对password字段在新增和编辑的时候使md5函数处理
        array('reg_time','time',1,'function'),   //新增时，写入注册时间
        array('update_time','time',3,'function'), // 对update_time字段在更新的时候写入当前时间戳
    	);
}

?>