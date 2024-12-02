<? //echo "<pre>"; print_r($_SESSION); echo "</pre>";  ?>




<? //echo "<pre>"; print_r(); echo "</pre>";  ?>




<?

/*
1. MENU
2. STATIC DATA


*/

?>







<? //echo "<pre>"; print_r($_SESSION['iblock_id']); echo "</pre>";  ?>




<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Content								
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
							Create content                            
                            </button>
                       
                    </li>					
                </ul><br><br>                        
                 
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped d_tab">
                                        <thead>
                                        <tr>
											
										<th>id</th>
										<th>name</th>
										<th>description</th>										
										<th>view</th>
										<th>edit</th>
										<th>delete</th>
										
                                        </tr>
                                        </thead>
                                        <tbody>
										<?
										$data = db::arr("SELECT * FROM MAINBLOCK");
										if ($data=='empty'){$data=array();}
										?>
								        <? foreach ( $data as $k=>$v): ?>
										
                                            <tr>										  
											  
											    <td><?=$v['ID']?></td>
											    <td><?=$v['NAME']?></td>
											    <td><?=$v['DESCRIPTION']?></td>
											
                                                <td>                                      
                                                        
                                                        <button type="button" class="btn btn-success btn-xs"
                                                                value="<?=$v['ID']?>" onclick="edit_request(value)">
                                                            <i class="fa fa-eye"></i> View
                                                        </button>
                                                    
                                                </td>                                                
												
												<td>                                      
                                                        
                                                        <button type="button" class="btn btn-primary btn-xs"
                                                                value="<?=$v['ID']?>" onclick="edit_request(value)">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </button>
                                                    
                                                </td>	

												
												<td>                                      
                                                        
                                                        <button type="button" class="btn btn-danger btn-xs"
                                                                value="<?=$v['ID']?>" onclick="edit_request(value)">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    
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


<?//require 'files_modal.php';?>
<?//require 'files_js.php';?>







