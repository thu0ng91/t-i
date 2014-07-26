<?php
/**
 * 区块管理
 * Class ListController
 */
class ListController extends FWAdminController
{
    /**
     * 区块列表
     */
    public function actionIndex()
    {
      $criteria=new CDbCriteria();
      $dataProvider=new CActiveDataProvider('Block',array(
          'criteria'=>$criteria,
          'pagination'=>array(
              'pageSize'=> $this->module['admin']['list_count'],
          ),
          'sort'=>array(
              'defaultOrder'=>array(
                  'bid' => CSort::SORT_DESC,
              ),
          ),
      ));
      $this->render('index',array(
          'dataProvider'=>$dataProvider,
//          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
          'model' => Block::model(),
      ));
    }

    /**
     * 区块创建
     */
    public function actionCreate()
    {
    	$type = Yii::app()->request->getParam('type',null);
    	if(null == $type || !isset(Yii::app()->controller->module['blocktype'][$type])){//如果区块类型为空或者不存在，重置类型为小说类型
    		$type = 'novel';
    	}
		$bid = Yii::app()->request->getParam('bid',null);
		$vars = array();
        if(null == $bid){
        	$model = new Block;
        }else{
        	$model = Block::model()->findByPk($bid);
        	$vars = explode('|',$model->vars);
        }
		

        if(isset($_POST['Block']))
        {
        	if($_POST['Block']['blocktype'] == 'novel'){
        		$sort_id = intval($_POST['sort_id']);
        		$sort_type = intval($_POST['sort_type']);
        		$sort_order = intval($_POST['sort_order']);
        		$self_number = $_POST['self_number'];
        		$nums = intval($_POST['nums']);
        		$_POST['Block']['vars'] = $sort_id.'|'.$sort_type.'|'.$sort_order.'|'.$nums.'|'.$self_number;
        	}
            $model->attributes = $_POST['Block'];
			$attributes = array(
				'blockname','content','vars','blocktype','sequence','status','cachetime','template'
			);
            if($model->save(true, $attributes)){
            	//生成区块设置数据文件
            	$block_file_path = Yii::app()->basePath.'/../../runtime/blocks/';
            	if(!file_exists($block_file_path)){
            		$this->dmkdir($block_file_path);
            	}
            	$str = '{novel_book ';
            	if(empty($self_number)){
	            	if($sort_id == 0){
	            		$str .= 'cid=[0]';
	            	}else{
	            		$str .= 'cid=['.$sort_id.']';
	            	}
	            	
					$str .= ' limit='.$nums;
	            	switch ($sort_type){
	            		case 1:
	            			$ordername = 'allclicks';break;
	            		case 2:
	            			$ordername = 'monthclicks';break;
	            		case 3:
	            			$ordername = 'weekclicks';break;
	            		case 4:
	            			$ordername = 'dayclicks';break;
	            		case 5:
	            			$ordername = 'alllikenum';break;
	            		case 6:
	            			$ordername = 'monthlikenum';break;
	            		case 7:
	            			$ordername = 'weeklikenum';break;
	            		case 8:
	            			$ordername = 'daylikenum';break;
	            		case 9:
	            			$ordername = 'createtime';break;
	            		case 10:
	            			$ordername = 'favoritenum';break;
	            		case 11:
	            			$ordername = 'wordcount';break;
	            		case 12:
	            			$ordername = 'lastchaptertime';break;
	            		case 13:
	            			$ordername = 'recommendlevel';break;
	            		default:
	            			$ordername = 'allclicks';
	             	}
	             	if($sort_order == 1){
	             		$str .= ' order="'.$ordername.' asc"';
	             	}else{
	             		$str .= ' order="'.$ordername.' desc"';
	             	}
            	}else{
            		$str .= ' id=['.$self_number.']';
            	}
            	$str .= '}';
            	
            	$block_file = $block_file_path.'block_'.$model->bid.'.tpl';
                $content = str_replace('{$blockname}',$model->blockname,$model->template);
            	$content = str_replace('{$block}',$str.$model->content.'{/novel_book}',$content);
            	file_put_contents($block_file,$content);
            	//生成区块设置数据
            	$block_config_path = $block_file_path.'/block_'.$model->bid.'.conf';
         	
            	$block_config = json_encode(array(
            		'status'=>$model->status,
            		'cachetime'=>$model->cachetime,
            		'blockname'=>$model->blockname,
            		'blocktype'=>$model->blocktype,
            		'sequence'=>$model->sequence,
            		'vars'=>$model->vars,
            	));
            	file_put_contents($block_config_path,$block_config);
            	
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        Yii::import('book.models.*');
        $this->render('create',array(
            'model'=>$model,'categories'=>Category::model()->showAllSelectCategory(Category::ALL_CATEGORY),'type'=>$type,'vars'=>$vars
        ));
    }

	public function actionDelete(){
		$id = intval(Yii::app()->request->getParam('bid',null));
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			if($this->loadModel($id)->delete()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['deleteSuccess']);
			}else {
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['deleteFail']);
			}
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect($_POST['returnUrl']);
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
    public function loadModel($id)
    {
        $model = Block::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}