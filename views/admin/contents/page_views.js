// Page Views Object
function PageViews(wrapper_id, page_views_json)
{
    var _this = this;
    this.wrapper_id = wrapper_id;
    this.views = page_views_json || [];
    this.view_delete_service = "";

    this.view_html_model =
        '<div class="view #view_id# row">' +
          '<input type="hidden" name="view_id[]" value="#view_id#" />' +
          '<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">' +
              '<input type="text" name="view_slug[]" value="#view_slug#" placeholder="Slug" class="form-control" />' +
          '</div>' +
          '<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">' +
              '<input type="text" name="view_position[]" value="#view_position#" placeholder="Position" class="form-control" />' +
          '</div>' +
          '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' +
              '<button class="btn btn-danger btn_remove_view" data-view_id="#view_id#" data-index="#index#">' +
                '<span class="glyphicon glyphicon-remove"></span>' +
              '</button>' +
          '</div>' +
        '</div><br/>';

    this.add_button_html_model =
        '<div class="form-group">' +
          '<button class="btn btn-info" id="btn_add_view">' +
              '<span class="glyphicon glyphicon-plus"></span>' +
          '</button>' +
        '</div>';

    this.draw = function()
    {
        var html = "";
        for(var i=0; i<this.views.length; i++){
            //var view_html = jQuery("#page_view_html_model").html();
            html += this.view_html_model
                  .replace(/#index#/g, i)
                  .replace(/#view_id#/g, this.views[i].view_id)
                  .replace(/#view_slug#/g, this.views[i].view_slug)
                  .replace(/#view_position#/g, this.views[i].view_position)
                  .replace(/#fk_page_id#/g, this.views[i].fk_page_id);
        }
        jQuery(this.wrapper_id).html(html);
        jQuery(this.wrapper_id).append(this.add_button_html_model);
    };

    this.addView = function(fk_page_id, view_id, view_slug, view_position)
    {
        fk_page_id = fk_page_id || "";
        view_id = view_id || "";
        view_slug = view_slug || "";
        view_position = view_position || "";

        this.views.push({
          "fk_page_id": fk_page_id,
          "view_id": view_id,
          "view_slug": view_slug,
          "view_position": view_position
        });

        this.draw();
    };

    this.remView = function(sender)
    {
        var _view_id = jQuery(sender).attr("data-view_id");
        var index   = jQuery(sender).attr("data-index");

        jQuery.post(this.view_delete_service, {
            view_id: _view_id
        }).done(function(_response){
            var response = JSON.parse(_response);
            if(response.status){
                _this.views.splice(index, 1);
                _this.draw();
            }else{
                // Service Fail
                console.log(response);
            }

        }).fail(function(_response){
            var response = JSON.parse(_response);
            console.log(response);
        });

    };


    /* ==============================================================
      Events Handlers
     ============================================================== */
    jQuery(this.wrapper_id).on("click", "#btn_add_view", function(e){
        e.preventDefault();
        _this.addView();
    });
    jQuery(this.wrapper_id).on("click", ".btn_remove_view", function(e){
        e.preventDefault();
        _this.remView(this);
    });
}
