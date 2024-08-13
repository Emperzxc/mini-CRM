<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Company Created</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">A New Company Has Been Created!</h1>
            </div>
            <div class="card-body">
                <p class="lead">We are excited to inform you that a new company has been added to our system.</p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Company Name</th>
                            <td>{{ $companyName }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $companyEmail }}</td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td><a href="{{ $companyWebsite }}" class="btn btn-primary" target="_blank">{{ $companyWebsite }}</a></td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-muted">Thank you for your attention.</p>
            </div>
            <div class="card-footer text-muted">
                <small>Sent from Your Application</small>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
