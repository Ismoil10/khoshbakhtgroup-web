<?$menu_data = db::arr_s("SELECT * FROM iblock WHERE TYPE='MENU' AND MAIN_BLOCK_ID='$_SESSION[con_id]'");?>
<?if ($_GET['action']=='create_menu'){$rs= insert::CREATE_MENU($_SESSION['con_id']);LocalRedirect('index.php');}?>


<?
$content_show_add = [
'ajax'=>[
'link'=>'content/show_add_form.php',
'success'=>'content_show_add_form',
'data'=>['ID'=>$menu_data['ID']]]];		

function content_edit_form($iblock_id,$content_id){
$rs = [
'ajax'=>[
'link'=>'content/show_edit_form.php',
'success'=>'content_show_edit_form',
'data'=>['iblock_id'=>$iblock_id,'content_id'=>$content_id]]];		
return $rs;}


function content_view_form($iblock_id,$content_id){
$rs = [
'ajax'=>[
'link'=>'content/show_view_form.php',
'success'=>'content_show_view_form',
'data'=>['iblock_id'=>$iblock_id,'content_id'=>$content_id]]];		
return $rs;}


?>	




<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Settings Menu 
				
					
					
				
					
					
                    <?if ($menu_data=='empty'):?>
					<a href="?action=create_menu">
					<button type="button"  class="btn btn-round btn-default"><i
                                class="fa fa-plus"></i> Create
                    </button>
					</a>
					<?else:?>
					<?
					$ajax_arr = [
                    'ajax'=>[
                    'link'=>'infoblock/show_edit_form.php',
                    'success'=>'show_edit_form',
                    'data'=>['ID'=>$menu_data['ID']]]];					
					?>					
					<button type="button" onclick='<?=action::button($ajax_arr)?>' class="btn btn-round btn-default"><i
                                class="fa fa-pencil"></i>Edit
                    </button>
					<?endif?>
					
					
					
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="view.php?d_tab_show=today">Today</a>
                            </li>
                            <li><a href="view.php?d_tab_show=all">All</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content ">
			
			
		
			
				<?if ($menu_data!='empty'):?>
				<?$menu_fields = json_decode($menu_data['FIELDS_JSON'],TRUE);?>				
				<?foreach ($menu_fields as $k => $v){
                $sort[$k] = $v['sort'];}
				array_multisort($sort, SORT_ASC, $menu_fields);?>				
                <!-- Nav tabs -->
                <ul class="nav">
                    <li class="active pull-left">
                            
						
							<button type="button" onclick='<?=action::button($content_show_add )?>' class="btn btn-round btn-default" >
							<i class="fa fa-plus"></i>
							Add Element                            
                            </button>
                       
                    </li>					
                </ul>                        
                 
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped d_tab">
                                        <thead>
                                        <tr>
										<th>sort</th>
										<?$i=1;?>
										<?foreach ($menu_fields as $v):?>
										<?if ($v['show_table']==1):?>
										<?$field[$i++]=$v['name']?>
                                        <th><?=$v['name']?></th>   
										<?endif?>										
										<?endforeach?>
										<th>active</th>
										<th>View</th>
										<th>Edit</th>
										<th>Delete</th>
										
                                        </tr>
                                        </thead>
                                        <tbody>
										
									
								        <? foreach (view::CONTENT('all',['IBLOCK_ID'=>$menu_data['ID']]) as $k=>$v): ?>
										
                                            <tr>										  
											  
											   <td><?=$v['SORT']?></td> 					
											   <?foreach ($field as $v3):?>
											   <td>
											   <?foreach ($v as $k2=>$v2):?>							   
											   <?if ($v3==$k2):?>										   
                                               <?=$v2?>					
											   <?break;?>	
											   <?endif;?>
											   <?endforeach;?>				
                                                </td>											   
                                               <?endforeach;?>
											   <td><?=$v['ACTIVE']?></td> 
												  
												
                                                <td>                                      
                                                        
                                                <button type="button" class="btn btn-success btn-xs"
                                                onclick='<?=action::button(content_view_form($menu_data['ID'],$v['ID']))?>'><i class="fa fa-eye"></i> View</button>
                                                    
                                                </td>                                                
												
												<td>                                      
                                                        
                                                <button type="button" class="btn btn-primary btn-xs"
                                                onclick='<?=action::button(content_edit_form($menu_data['ID'],$v['ID']))?>'>
                                                <i class="fa fa-pencil"></i> Edit</button>
                                                    
                                                </td>	

												
												<td>                                      
                                                        
                                                <button type="button" class="btn btn-danger btn-xs" onclick="del_content_element('<?=$v['ID']?>')">
                                                <i class="fa fa-trash"></i> Delete </button>
                                                    
                                                </td>
                                            </tr>
											
											<? endforeach; ?>
                                      
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     
                    <?endif?>
                       
          
              
             
            </div>
        </div>
    </div>
</div>


<?require 'menu_modal.php';?>
<?require 'menu_js.php';?>
