﻿<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Блог
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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



                        <button type="button" data-target="#file_add_form_modal" data-toggle="modal" class="btn btn-round btn-default">
                            <i class="fa fa-plus"></i>
                            Добавить Элемент
                        </button>
                    </li>
                </ul><br><br>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped d_tab">
                            <thead>
                                <tr>

                                    <th>Sort</th>
                                    <th>Lang</th>
                                    <th>TITLE_SHORT</th>
                                    <th>TEXT_SHORT</th>
                                    <th>IMG</th>
                                    <th>Data</th>
                                    <th>SECTION</th>
                                    <th>READ</th>

                                    <!--<th>Просмотр</th>-->
                                    <th>Изменить</th>
                                    <th>Удалить</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?
                                $files = db::arr("SELECT * FROM news");
                                if ($files == 'empty') {
                                    $files = array();
                                }
                                ?>
                                <? foreach ($files as $k => $v) : ?>

                                    <tr height="80px;">

                                        <td><?= $v['SORT'] ?></td>
                                        <td><?= $v['LANG'] ?></td>
                                        <td><?= $v['TITLE_SHORT'] ?></td>
                                        <td><?= $v['TEXT_SHORT'] ?></td>
                                        <td width="100px;">
                                            <img src="<?= $v['IMG'] ?>" alt="..." class="img-thumbinal" width="100%;">
                                        </td>
                                        <td><?= $v['DATE_CREATED'] ?></td>
                                        <td><?= $v['SECTION'] ?></td>
                                        <td><?= $v['READ'] ?></td>
                                        <?
                                        $ajax = [
                                            'ajax' => [
                                                'link' => 'news/news_edit_form.php',
                                                'success' => 'news_edit_form',
                                                'data' => ['news_id' => $v['ID']]
                                            ]
                                        ];
                                            
                                        

                                        ?>


                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" onclick='<?= action::button($ajax) ?>'>
                                                <i class="fa fa-pencil"></i> Изменить</button>
                                        </td>

                                        <td>

                                            <button type="button" class="btn btn-danger btn-xs" onclick="file_del('<?= $v['ID'] ?>','<?= $v['URL'] ?>')"><i class="fa fa-trash"></i> Удалить</button>

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


<? require 'site_news_modal.php'; ?>
<? require 'site_news_js.php'; ?>