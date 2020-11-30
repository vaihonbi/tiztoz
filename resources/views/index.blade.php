<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <div class="container">
        <div class="mt-4">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form method="post">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>URL TikTok</label>
                                    <input name="url" type="text" class="form-control" placeholder="VD: https://www.tiktok.com/@linhkhunofficial/video/6895569541007412481" />
                                </div>
                                <button type="submit" class="btn btn-primary">Download Now!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
