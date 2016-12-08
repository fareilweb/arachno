<div class="form-info-request">
    <div class="box">
        <h2><?=Lang::$info_request?></h2>

        <form name="form_info_request" id="form_info_request">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="<?=Lang::$name;?>" class="form-control" />
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" name="surname" placeholder="<?=Lang::$surname;?>*" class="form-control" />
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="<?=Lang::$phone;?>" class="form-control" />
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="<?=Lang::$email;?>*" class="form-control" />
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" name="specialization" placeholder="<?=Lang::$specialization;?>*" class="form-control" />
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <textarea name="message" placeholder="<?=Lang::$message;?>" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <button id="form_info_request_submit" class="btn btn-lg">
                            <?=Lang::$send;?>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
jQuery(document).ready(function(){

    jQuery("#form_info_request_submit").click(function(event){
        event.preventDefault();

        jQuery.post("<?=Config::$web_path;?>/Messaging/sendFormInfoRequest", {
            form_data: jQuery("#form_info_request").serialize(),
            sender_url: "<?=$this->current_url;?>" 
        }).done(function(response){
            var response = JSON.parse(response);
            if(response.status==0){
                swal({
                    title: "OPS!",
                    text: "Invio Messaggio Fallito!<br/>" + response.message,
                    type: "warning",
                    html: true
                });
            }else{
                swal({
                    title: "Fantastico!",
                    text: "Il Messaggio &egrave; Stato Inviato.",
                    type: "success",
                    html: true
                });
            }

        }).fail(function(response){
            var response = JSON.parse(response);
            swal({
                title: "OPS!",
                text: "Invio Messaggio Fallito!",
                type: "warning",
                html: true
            });
            console.log(response);
        });

    });
    
});
</script>