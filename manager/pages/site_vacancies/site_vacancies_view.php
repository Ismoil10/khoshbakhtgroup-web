
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Кардидаты									
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="view.php?d_tab_show=today">Сегодня</a>
                            </li>
                            <li><a href="view.php?d_tab_show=all">Все</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content ">
			
			
						
                <!-- Nav tabs -->
                <ul class="nav">
                    <li class="active pull-left">
                            
													
							<!--
							<button type="button"  data-target="#file_add_form_modal" data-toggle="modal" class="btn btn-round btn-default" >
							<i class="fa fa-plus"></i>
							Добавить Элемент                            
                            </button>
							-->
                       
                    </li>					
                </ul><br><br>                        
                 
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped d_tab_desc">
                                        <thead>
                                        <tr>
										<th>ID</th>	
										<th>Name</th>
										<th>Phone</th>
										<th>Message</th>									
										<th>File</th>
										
										<!--<th>Просмотр</th>-->
										<!--<th>Изменить</th>-->
										<th>Удалить</th>
										
                                        </tr>
                                        </thead>
                                        <tbody>
										<?
										
										
										
										
										$files = db::arr("SELECT * FROM vacancies ORDER BY ID DESC");
										
										/*
										echo '<pre>';
										print_r($files);
										echo '</pre>';
										*/
										
										if ($files=='empty'){$files=array();}
										?>
								        <? foreach ( $files as $k=>$v): ?>
										
                                            <tr height="80px;">									  
												<td><?=$v['ID']?></td>
											    <td><?=$v['NAME']?></td>
											    <td><?=$v['PHONE']?></td>
											    <td><?=$v['TEXT']?></td>
												<td><?=$v['FILE']?></td>
											
											   	
												  
												 <!-- 
                                                 <td>       
                                                <button type="button" class="btn btn-success btn-xs" 
												onclick="file_view('<?=$v['URL']?>')"><i class="fa fa-eye"></i> Просмотр</button>                                                    
                                                </td> 
-->												
<?
$ajax = [
'ajax'=>[
'link'=>'news/news_edit_form.php',
'success'=>'news_edit_form',
'data'=>['news_id'=>$v['ID']]]];	

?>
<!--
												
												<td>                                                       
                                                <button type="button" class="btn btn-primary btn-xs"
                                                onclick='<?//=action::button($ajax)?>'>
                                                <i class="fa fa-pencil"></i> Изменить</button>                                        
                                                </td>

-->												
												
												<td>                                      
                                                        
                                                <button type="button" class="btn btn-danger btn-xs"
                                                onclick="file_del('<?=$v['ID']?>','<?=$v['URL']?>')"><i class="fa fa-trash"></i> Удалить</button>
                                                    
                                                </td>
                                            </tr>
											
											<? endforeach; ?>
                                      
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     
             
                       
          
              
             
            </div>
        </div>
    </div>
</div>


<?require 'site_vacancies_modal.php';?>
<?require 'site_vacancies_js.php';?>





