<?php
/**
 * Class FWChapterDataProvider
 */
class FWChapterDataProvider extends CActiveDataProvider {

    public function getSort($className='CSort')
    {
        return false;
    }

    /**
     * Fetches the data from the persistent data storage.
     * @return array list of data items
     */
    protected function fetchData()
    {
        $criteria=clone $this->getCriteria();

        if(($pagination=$this->getPagination())!==false)
        {
            $pagination->setItemCount($this->getTotalItemCount());
            $pagination->applyLimit($criteria);
        }

        $baseCriteria=$this->model->getDbCriteria(true);

//        if(($sort=$this->getSort())!==false)
//        {
//            // set model criteria so that CSort can use its table alias setting
//            if($baseCriteria!==null)
//            {
//                $c=clone $baseCriteria;
//                $c->mergeWith($criteria);
//                $this->model->setDbCriteria($c);
//            }
//            else
//                $this->model->setDbCriteria($criteria);
//            $sort->applyOrder($criteria);
//        }
        if($baseCriteria!==null) {
            $baseCriteria->order ="chapterorder asc";
        }

        $this->model->setDbCriteria($baseCriteria!==null ? clone $baseCriteria : null);
        $data=$this->model->findAll($criteria);
        $this->model->setDbCriteria($baseCriteria);  // restore original criteria
        return $data;
    }
}