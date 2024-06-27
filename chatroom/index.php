<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .input-group {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Input area with Claim Room button -->
    <div class="container mt-4">
        <div class="input-group">
            <input type="text" class="form-control" name="room" form="claimRoomForm" placeholder="enzone.in/chatroom/">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" form="claimRoomForm">Claim Room</button>
            </div>
        </div>
        <form id="claimRoomForm" action="claim.php" method="post"></form>
    </div>

    <!-- Buttons linked with links -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-6 col-md-3 mb-2">
                <a href="https://www.example.com" class="btn btn-secondary btn-block">Link 1</a>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <a href="https://www.example.com" class="btn btn-secondary btn-block">Link 2</a>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <a href="https://www.example.com" class="btn btn-secondary btn-block">Link 3</a>
            </div>
            <div class="col-6 col-md-3 mb-2">
                <a href="https://www.example.com" class="btn btn-secondary btn-block">Link 4</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>