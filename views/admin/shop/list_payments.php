<div class="container-fluid list_payments">
    
    <h2>
        <?=Lang::$payments;?>
        <a href="<?=Config::$web_path;?>/Admin/editPayments" class="btn btn-info">
            <span class="glyphicon glyphicon-plus"></span>
            <?=Lang::$add;?>
        </a>
    </h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table>
                    <tbody>
                        <tr>
                            <th>
                                <?=Lang::$id;?>
                            </th>
                            <th>
                                <?=Lang::$name;?>
                            </th>
                            <th>
                                <?=Lang::$price;?>
                            </th>
                            <th>
                                <?=Lang::$status;?>
                            </th>
                            <th>
                                <?=Lang::$details;?>
                            </th>
                            <th>
                                <?=Lang::$actions;?>
                            </th>
                        </tr>
                        
                        <?php foreach($this->pay_methods as $pay_key=>$pay_val):?>
                        <tr>
                            <td>
                                <?=$pay_val->payment_id;?>
                            </td>
                            <td>
                                <?=$pay_val->payment_name;?>
                            </td>
                            <td>
                                <?=$pay_val->payment_cost;?>
                            </td>
                            <td>
                                <?=$pay_val->payment_status;?>
                            </td>
                            <td>
                                <?=$pay_val->payment_details;?>
                            </td>
                            <td>
                                <a href="<?=Config::$web_path;?>/Admin/editPayment/<?=$pay_val->payment_id;?>" class="btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    <?=Lang::$edit;?>
                                </a>
                                
                                <a href="<?=Config::$web_path;?>/Admin/removePayment/<?=$pay_val->payment_id;?>/redirect/<?=$this->get['url'];?>" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove-sign"></span>
                                    <?=Lang::$delete;?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        
                    </tbody>
                </table>
            
            
        </div>
    </div>
    
    
</div>