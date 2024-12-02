<!-- <div class="clearfix"></div> -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Orders
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped d_tab">
                            <thead>
                                <tr>

                                    <th>Date</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Tour Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <? $status = ["draft"=>"В процессе", "paid"=>"Оплаченный","cash"=>"Оплата наличными"];
                                $files = db::arr("SELECT ol.*, ct.DATA_JSON AS TOUR FROM `order_list` AS ol INNER JOIN `content` AS ct ON ct.ID=ol.TOUR_ID");
                                if ($files == 'empty') {
                                    $files = array();
                                }
                                ?>
                                <? foreach ($files as $k => $v) : 
                                    $tour_arr = json_decode($v["TOUR"], true);    
                                    $detial = ["id"=>$v["ID"],"name"=>$v["USERNAME"], "email"=>$v["EMAIL"],"phone"=>$v["PHONE"],"status"=>$v["STATUS"],"tour"=>$v["TOUR_ID"]];
                                ?>

                                    <tr height="80px;">

                                        <td><?=date("d.m.Y (H:i)", strtotime($v['CREATED_DATE']))?></td>
                                        <td><?=$v['USERNAME']?></td>
                                        <td><?=$v['EMAIL']?></td>
                                        <td><?=$v['PHONE']?></td>
                                        <td><?=$status[$v['STATUS']]?></td>
                                        <td><?= $tour_arr['title'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" value="<?=htmlspecialchars(json_encode($detial))?>" onclick="editModal(JSON.stringify(value))">
                                                <i class="fa fa-pencil"></i> Edit</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="deleteModal('<?= $v['ID'] ?>')"><i class="fa fa-trash"></i> Delete</button>
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
<?require 'site_orders_modal.php'; ?>
<?require 'site_orders_js.php'; ?>