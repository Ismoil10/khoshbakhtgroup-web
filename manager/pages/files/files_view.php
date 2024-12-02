

<? //echo "<pre>"; print_r($_SESSION['iblock_id']); echo "</pre>";  ?>


<? //echo "<pre>"; print_r($_POST); echo "</pre>";  ?>
<? //echo "<pre>"; print_r($_FILES); echo "</pre>";  ?>


<?$data = db::arr_s("SELECT * FROM IBLOCK WHERE ID='$_SESSION[iblock_id]'");?>


<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Files									
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
			
			
						
                <!-- Nav tabs -->
                <ul class="nav">
                    <li class="active pull-left">
                            
													
							
							<button type="button"  data-target="#file_add_form_modal" data-toggle="modal" class="btn btn-round btn-default" >
							<i class="fa fa-plus"></i>
							Add Element                            
                            </button>
                       
                    </li>					
                </ul><br><br>                        
                 
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped d_tab_desc">
                                        <thead>
                                        <tr>
											
										<th>ID</th>
										<th>Name</th>
										<th>URL</th>
										<th>Image</th>
										<th>Size</th>
										<th>View</th>
										<th>Edit</th>
										<th>Delete</th>
										
                                        </tr>
                                        </thead>
                                        <tbody>
										<?
										$files = db::arr("SELECT * FROM files ");
										if ($files=='empty'){$files=array();}
										?>
								        <? foreach ( $files as $k=>$v): ?>
										
                                            <tr height="80px;">									  
											  
											    <td><?=$v['ID']?></td>
											    <td><?=$v['NAME']?></td>
											    <td><?=$v['URL']?></td>
											   <td width="100px;">
												<img src="<?=$v['URL']?>" alt="..." class="img-thumbinal" width="100%;">			
												</td>
											    <td><?=$v['SIZE']?></td>
												
                                                <td>                                      
                                                        
                                                <button type="button" class="btn btn-success btn-xs" 
												onclick="file_view('<?=$v['URL']?>')"><i class="fa fa-eye"></i> View</button>
                                                    
                                                </td>                                                
												
												<td>                                      
                                                        
                                                <button type="button" class="btn btn-primary btn-xs"
                                                onclick="file_edit('<?=$v['ID']?>','<?=$v['URL']?>')"><i class="fa fa-pencil"></i>Edit</button>
                                                    
                                                </td>	

												
												<td>                                      
                                                        
                                                <button type="button" class="btn btn-danger btn-xs"
                                                onclick="file_del('<?=$v['ID']?>','<?=$v['URL']?>')"><i class="fa fa-trash"></i>Delete</button>
                                                    
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


<?require 'files_modal.php';?>
<?require 'files_js.php';?>





