<?php
/**
 * 会员功能
 * Class DoController
 */
class MemberController extends FWFrontController
{


    private $member = null;


    /**
     * 检查是否登录
     */
    public function init()
    {
        parent::init();

        if(Yii::app()->user->isGuest&&$this->id!=='site'){
            Yii::app()->user->setFlash('actionInfo','您尚未登录系统！');
            $this->redirect(array('/member/do/login'));
        }

        $this->member =  Yii::app()->user->info;
    }

    public function getMember()
    {
        return $this->member;
    }
}