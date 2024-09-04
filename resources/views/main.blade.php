<!DOCTYPE html>
<html>
<head>
    <title>Laravel Node.js Names</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Names List: </h2>
        <ul id="names" class="list-group"></ul>
        <form id="name-form" class="mt-3">
            <input id="name-input" autocomplete="off" class="form-control" placeholder="Enter a name" />
            <button class="btn btn-primary mt-2">Add Name</button>
        </form>
    </div>
    <script src="https://cdn.socket.io/4.7.5/socket.io.min.js" integrity="sha384-2huaZvOR9iDzHqslqwpR87isEmrfxqyWOF7hr7BY6KG0+hVKLoEXMPUJw3ynWuhO" crossorigin="anonymous"></script>
    <script>
        $(function () {

            // var socket = io('http://localhost:3000');
            // $('#name-form').submit(function() {
            //     socket.emit('add name', $('#name-input').val());
            //     $('#name-input').val('');
            //     return false;
            // });

            // socket.on('name added', function(name) {
            //     $('#names').append($('<li class="list-group-item">').text(name.name));
            // });

            // $.get('/names', function(data) {
            //     data.forEach(function(name) {
            //         $('#names').append($('<li class="list-group-item">').text(name.name));
            //     });
            // });
            const socket = io.connect('http://localhost:3000');
                $('#name-form').submit(function() {
                // alert($('#name-input').val());
                // socket.emit('add name', $('#name-input').val());
                // $('#name-input').val('');
                // return false;
                
            });

        });
    </script>
</body>
</html>
