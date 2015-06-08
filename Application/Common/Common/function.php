<?php
/**
 * 根据子id获取详细
 * @param  int $child_id 用户子id
 * @param  int $style 用户类型 1:项目人 2:投资人
 * @param int $isprivacy 是否隐私 0否，1是
 * @return array    项目或投资人详细
 */
function get_child_detail($child_id,$style=0)
{
	if ($style==1):
		$info = M("Project")->where("id='$child_id'")->limit("1")->select();
        $x = M("Prdescription")->where("prid='$child_id'")->find();
        $info[0]['prdescription'] = $x['prdescription'];
        // yc_vp($info);
        $info[0][url] = "index.php?s=Home/Project/prdetail&pid=".$info[0][id];
        if($info[0][face_img]):
            $info[0][face_img] = "./Uploads/Album/".$info[0][face_img];
        else:
            $info[0][face_img] = NULL;
        endif;
    elseif($style==2):
        $info = M('Investor')->where("id='$child_id'")->select();
        $info[0][url] = "index.php?s=Home/Invhome/invDisplay&uid=".$info[0][uid];
        if($info[0][privacy]==0):
            if($info[0][sex]==1):
                $info[0][showname] = mb_substr($info[0][realname], 0,1,'utf-8').'先生';
            else:
                $info[0][showname] = mb_substr($info[0][realname], 0,1,'utf-8').'女士';
            endif;
        else:
            $info[0][showname] = $info[0][realname];
        endif;
         if($info[0][face_img]):
            $info[0][face_img] = "./Uploads/Investor/".$info[0][face_img];
        else:
            $info[0][face_img] = NULL;
        endif;
	else:
		$this->error("信息有误！");
	endif;
	return $info;
}