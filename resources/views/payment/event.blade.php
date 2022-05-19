<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Instamojo Payment Gateway Integration - NiceSnippets.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ url('pay') }}" method="POST" name="laravel_instamojo">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Name</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Mobile Number</strong>
                                        <input type="text" name="mobile_number" class="form-control"
                                            placeholder="Enter Mobile Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Email Id</strong>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Enter Email id" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Event Fees</strong>
                                        <input type="text" name="amount" class="form-control" placeholder=""
                                            value="200" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
