<?php
/**
 * 区块管理
 * Class ListController
 */
class ListController extends FWModuleAdminController
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
    	if($type == 'custom'){
    		$this->redirect(array('admin/list/custom/','bid'=>$bid));exit;
    	}
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
            	$this->novel_block_update($model);
            	
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
	public function actionCustom($bid){
		$vars = array();
        if(null == $bid){
        	$model = new Block;
        }else{
        	$model = Block::model()->findByPk($bid);
        }
		

        if(isset($_POST['Block']))
        {
        	$_POST['Block']['vars'] = '';
            $model->attributes = $_POST['Block'];
			$attributes = array(
				'blockname','content','vars','blocktype','sequence','status','cachetime','template'
			);
            if($model->save(true, $attributes)){
            	//生成区块设置数据文件
            	$this->custom_block_update($model);
            	
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        Yii::import('book.models.*');
        $this->render('self',array(
            'model'=>$model,'type'=>'custom',
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
			$block_file_path = FW_ROOT_PATH.DS.runtime.DS.blocks.DS;
			$block_file = $block_file_path.'block_'.$id.'.tpl';
			unlink($block_file);
			$block_config_path = $block_file_path.DS.'block_'.$id.'.conf';
			unlink($block_config_path);
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect($_POST['returnUrl']);
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	public function actionExport(){
		$results = Block::model()->findAll();
		foreach($results as $v){
			$r['bid'] = $v->bid;
			$r['blockname'] = $v->blockname;
			$r['content'] = $v->content;
			$r['template'] = $v->template;
			$r['vars'] = $v->vars;
			$r['blocktype'] = $v->blocktype;
			$r['sequence'] = $v->sequence;
			$r['status'] = $v->status;
			$r['cachetime'] = $v->cachetime;
			$s[] = $r;
		}

		$data = base64_encode(json_encode($s));
		$file_path = FW_ROOT_PATH.DS.'runtime'.DS.'blocks'.DS.'dbbackup';
		if(!file_exists($file_path)){
            $this->dmkdir($file_path);
        }
        $date = date('Y-m-d',time());
        $filename = $file_path.DS.'block'.$date.'.txt';
        file_put_contents($filename,$data);
        header("Content-type: application/octet-stream");
	    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	    header("Content-Length: ". filesize($filename));
	    readfile($filename);
        Yii::app()->user->setFlash('actionInfo','导出区块数据成功,文件同时保存在'.$filename);
        $this->redirect(array('admin/list/index'));
	}
	public function actionInsert(){
		if($_FILES){
			$data = file_get_contents($_FILES['insertdata']['tmp_name']);
			$data = json_decode(base64_decode($data));
			$sql = 'TRUNCATE TABLE block';
			Yii::app()->db->createCommand($sql)->query();
			foreach($data as $v){
				$model = new Block();
				$model->bid = $v->bid;
				$model->blockname = $v->blockname;
				$model->content = $v->content;
				$model->template = $v->template;
				$model->vars = $v->vars;
				$model->blocktype = $v->blocktype;
				$model->sequence = $v->sequence;
				$model->status = $v->status;
				$model->cachetime = $v->cachetime;
				$model->save();
			}
			Yii::app()->user->setFlash('actionInfo','导入区块数据成功,请更新区块数据');
        	$this->redirect(array('admin/list/index'));
		}
		$this->render('insert');
	}
	/**
	 * 更新全部区块数据
	 * @param unknown_type $id
	 */
	public function actionUpdateall(){
		$model = Block::model()->findAll();
		if(null != $model){
			foreach($model as $v){
				if($v->blocktype == 'novel'){
					$this->novel_block_update($v);
				}else{
					$this->custom_block_update($v);
				}
			}
		}
		Yii::app()->user->setFlash('actionInfo','全部区块数据更新成功');
		$this->redirect(array('admin/list/index'));
	}
	private function novel_block_update($data){
		list($sort_id,$sort_type,$sort_order,$nums,$self_number) = explode('|',$data->vars);
		//生成区块设置数据文件
            	$block_file_path = FW_ROOT_PATH.DS.runtime.DS.blocks.DS;
            	if(!file_exists($block_file_path)){
            		$this->dmkdir($block_file_path);
            	}
            	$str = '{novel_book ';
            	if(empty($self_number)){
	            	if($sort_id != 0){
	            		$str .= 'cid=\''.$sort_id.'\'';
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
	            		case 14:
	            			$ordername = 'flag';break;
	            		default:
	            			$ordername = 'allclicks';
	             	}
	             	if($sort_order == 1){
	             		$str .= ' order="'.$ordername.' asc"';
	             	}else{
	             		$str .= ' order="'.$ordername.' desc"';
	             	}
            	}else{
            		$str .= ' id=\''.$self_number.'\'';
            	}
            	$str .= '}';
            	
            	$block_file = $block_file_path.'block_'.$data->bid.'.tpl';
                $content = str_replace('{$blockname}',$data->blockname,$data->template);
            	$content = str_replace('{$block}',$str.$data->content.'{/novel_book}',$content);
            	file_put_contents($block_file,$content);
            	//生成区块设置数据
            	$block_config_path = $block_file_path.DS.'block_'.$data->bid.'.conf';
         	
            	$block_config = json_encode(array(
            		'status'=>$data->status,
            		'cachetime'=>$data->cachetime,
            		'blockname'=>$data->blockname,
            		'blocktype'=>$data->blocktype,
            		'sequence'=>$data->sequence,
            		'vars'=>$data->vars,
            	));
            	file_put_contents($block_config_path,$block_config);
	}
	private function custom_block_update($data){
			$block_file_path = FW_ROOT_PATH.DS.'runtime'.DS.'blocks'.DS;
            if(!file_exists($block_file_path)){
            	$this->dmkdir($block_file_path);
            }
            
            $block_file = $block_file_path.'block_'.$data->bid.'.tpl';
                $content = str_replace('{$blockname}',$data->blockname,$data->template);
            $content = str_replace('{$block}',$data->content,$content);
            file_put_contents($block_file,$content);
            //生成区块设置数据
            $block_config_path = $block_file_path.DS.'block_'.$data->bid.'.conf';
         
            $block_config = json_encode(array(
            	'status'=>$data->status,
            	'cachetime'=>$data->cachetime,
            	'blockname'=>$data->blockname,
            	'blocktype'=>$data->blocktype,
            	'sequence'=>$data->sequence,
            	'vars'=>$data->vars,
            ));
            file_put_contents($block_config_path,$block_config);
	}
    public function loadModel($id)
    {
        $model = Block::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}