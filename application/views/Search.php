<div class="col-md-4">
<div id="searchWrap" class="well">
                    <h4><?php echo $this->lang->line('search'); ?></h4>
                    <div class="input-group">
                        <input id="searchIn" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                        <ul class="serchwrap" id="uels" style="display:none">

                            <li>
                           
                            </li>


                        </ul>
                    </div>
                     <ul id="autocomplate">
                            
                        </ul>
                    <!-- /.input-group -->
                </div>
                </div>
                <script type="text/javascript">
              $('#searchIn').on('click', function(){
                    _html = "";
                   
                  $.get("<?php echo base_url('main/Search') ?>" ,{ Search : $(this).val() }, function(resp){
                        for (var i = 0; i < resp.length; i++) {
                        _html += '<li><a>' + resp[i].fname + ' ' + resp[i].lname + '</a></li>'
                    }
                        $('#autocomplate').html(_html);
                    },'json');
                });

                </script>
