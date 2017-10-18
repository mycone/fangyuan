<?php
/**
 * 模块列表
 * @author chenhao
 * @since  1.0
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '模块设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <!-- <a class="btn btn-sm btn-primary" href="<?php echo Url::to(['default/create'])?>"><i class="fa fa-cube"></i> 创建模块</a>-->
            </div> 
            <div class="box-body pad">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <table class="table table-striped table-bordered table-advance table-hover dataTable">
                        <thead>
                            <tr>
                                <th width="90px">标识</th>
                                <th width="250px">名称</th>
                                <th>描述</th>
                                <th width="150px"></th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php $index=-1;
                                  foreach ($modules as $module): 
                                      $index+=1;
                                      ?>
                    
                            <tr data-key="<?php echo $module['id']?>" class="<?if($index%2===0){echo 'odd';}else{echo 'even';}?>">
                               
                                <td><?php echo $module['id']?></td>
                            <?php if($module['instance']===null):?>
                                <td></td>
                                <td>error</td>
                                <td class="da-icon-column"></td>
                            <?php else:?>
                                <td><?php echo $module['instance']->name?></td>
                                <td><?php echo $module['instance']->description?></td>
                                <td class="da-icon-column">
                                    <?php 
                                                    if($module['instance']->is_system)
                                                    {
                                                        echo '系统内置';
                                                    }
                                                    else if($module['can_install']){
                                                        echo Html::a('安装',['install','id'=>$module['id']]);
                                                    }
                                                    else 
                                                    {
                                                        if($module['has_admin'])
                                                        {
                                                            if($module['can_active_admin'])
                                                            {
                                                                echo Html::a('启用后台',['active','id'=>$module['id'],'is_admin'=>1]).'&nbsp;&nbsp;';
                                                            }
                                                            else
                                                            {
                                                                echo Html::a('关闭后台',['deactive','id'=>$module['id'],'is_admin'=>1]).'&nbsp;&nbsp;';
                                                            }
                                                        }
                                                        if($module['has_home'])
                                                        {
                                                            if($module['can_active_home'])
                                                            {
                                                                echo Html::a('启用前台',['active','id'=>$module['id']]).'&nbsp;&nbsp;';
                                                            }
                                                            else
                                                            {
                                                                echo Html::a('关闭前台',['deactive','id'=>$module['id']]).'&nbsp;&nbsp;';
                                                            }
                                                        }
                                                        
                                                        if($module['can_uninstall'])
                                                        {
                                                            echo Html::a('卸载',['uninstall','id'=>$module['id']]);
                                                        }
                                                    }
                                                    
                                                    
                                                 ?>
                                </td>
                            <?php endif;?>
                            </tr>
                            <?php endforeach;?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>