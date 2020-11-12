<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <div id="container">

    </div>

    <button id="btnLoad">Load Data</button>

    <script>
        $('#btnLoad').click(function() {
            $.ajax({
                url : 'get_user.php',
                method: 'POST',
                data : {
                    first_name : 'Claire',
                    last_name: 'Wang'
                },
                success : function(res) {
                    $('#container').html(res.name)
                },
                error : function(err) {
                    $('#container').html('error')
                }

            })
        })
    </script>
</body>
</html>