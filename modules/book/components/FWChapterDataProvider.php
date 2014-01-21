<?php
/**
 * Class FWChapterDataProvider
 */
class FWChapterDataProvider extends CActiveDataProvider {

    public function getSort($className='CSort')
    {
        return false;
    }
}