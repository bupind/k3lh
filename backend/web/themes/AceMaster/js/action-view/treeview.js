jQuery(document).ready(function () {
    var baseUrl = $('#baseurl').val();
    var data = initiateData();//see below

    $('#tree-main-office').ace_tree({
        dataSource: data['mainOffice'] ,
        loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
        'open-icon' : 'ace-icon fa fa-folder-open',
        'close-icon' : 'ace-icon fa fa-folder',
        'selectable' : false,
        multiSelect: false,
        'selected-icon' : null,
        'unselected-icon' : null
    });

    $('#tree-sector').ace_tree({
        dataSource: data['sector'] ,
        loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
        'open-icon' : 'ace-icon fa fa-folder-open',
        'close-icon' : 'ace-icon fa fa-folder',
        'selectable' : false,
        multiSelect: false,
        'selected-icon' : null,
        'unselected-icon' : null
    });

    function initiateData(){
        var mainOffice = function(options, callback){
            var $data = null;
            if(!("text" in options) && !("type" in options)){
                $.ajax({
                    'type': 'get',
                    'url': baseUrl + '/site/tree-main-office',
                    'dataType': 'json',
                    success: function (data) {
                        $('#spinner1').hide();
                        $data = data;//the root tree
                        callback({ data: $data });
                    }
                });

                return;
            }
            else if("type" in options && options.type == "folder") {
                if("additionalParameters" in options && "children" in options.additionalParameters)
                    $data = options.additionalParameters.children || {};
                else $data = {};//no data
            }

            if($data != null)//this setTimeout is only for mimicking some random delay
                setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);
        };

        var sector = function(options, callback){
            var $data = null;
            if(!("text" in options) && !("type" in options)){
                $.ajax({
                    'type': 'get',
                    'url': baseUrl + '/site/tree-sector',
                    'dataType': 'json',
                    success: function (data) {
                        $('#spinner2').hide();
                        $data = data;//the root tree
                        callback({ data: $data });
                    }
                });

                return;
            }
            else if("type" in options && options.type == "folder") {
                if("additionalParameters" in options && "children" in options.additionalParameters)
                    $data = options.additionalParameters.children || {};
                else $data = {};//no data
            }

            if($data != null)//this setTimeout is only for mimicking some random delay
                setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);
        };

        return {'mainOffice': mainOffice, 'sector' : sector}
    }
});