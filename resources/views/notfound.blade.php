<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found</title>


    <style>
        .not-found-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav>
        @include('components.component-name')
    </nav>

    <div class="container not-found-container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">404 Not Found</h1>
                <p class="lead text-danger card-title">{{ session('error') }}</p>
                <a class="btn btn-primary" href="{{ url()->previous() }}">Go back</a>
            </div>
        </div>
    </div>

    <footer >
        @include('components.footer')
    </footer>

</body>
</html>
