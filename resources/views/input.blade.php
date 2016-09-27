<!DOCTYPE html>
<html>

    <head>
        <title>Comments String Inspector</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
        <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            .clean_comments {
                display:inline-block;
                width: 500px;
                height: 250px;
                border: 5px solid #008000;
                padding: 15px;
                margin: 15px;
                overflow-y: scroll;
            }

        </style>
    </head>
    <body>

        <div class="container">

                <form action="{{URL::to('getMessage')}}" method="GET">
                <div class="form-group">
                   <h5> <label for="sub_num">Submission Number:</label></h5>
                <input class="form-group" type="text" name="sub_num" id="sub_num">

                <input class="btn btn-success btn-md"type="submit" value="submit">
                    </div>
                </form>

                <hr class="divider">
                @if($status==1)
                         <b>Submission Number:</b><label for="clean_comments" id="sub_num">{{$sub_num}}</label>
                <hr class="divider">
                <div class="clean_comments" id="clean_comments" data-pk="{{$sub_num}}">{{$clean}}</div>
                @endif

        </div>
    </body>
<script>

        //edit form style - popup or inline
        $.fn.editable.defaults.mode = 'popup';
        $('.clean_comments').editable({
            validate: function(value) {
                if($.trim(value) == '')
                    return 'Value is required.';
            },
            type: 'textarea',
            url:'{{URL::to("postMessage")}}',
            title: 'Edit Comments',
            id:"clean_comments",
            placement: 'top',
            send:'always',
            ajaxOptions: {
                dataType: 'json'
            },
            success: function(data) {
                $('#clean_comments').val('data.clean'); //update backbone model
                console.log(data);

            }
        });

</script>
</html>
