<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Product Review Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .main-content {
            margin-top: 80px; /* Sesuaikan dengan tinggi header */
            width: 1000%; /* Ganti lebar sesuai kebutuhan */
            margin-left: auto;
            margin-right: auto;
        }

        .wide-input {
            width: 100%; /* Make the input fields 100% wide */
        }
    </style>
</head>
<body style="background-color: pink">
    <div class="container main-content" width="200">
        <div class="position-absolute top-50 start-50 translate-middle bg-light bg-gradient text-dark rounded" style="box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);">
            <form method="POST" action="/form" class="p-5" enctype="multipart/form-data"> 
                @csrf
                <div class="text-center fw-bold mb-5">
                    BEAUTY PRODUCT REVIEW FORM
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control wide-input" placeholder="Name" aria-describedby="name" id="name" name="name">
                    @error('name')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Email</span>
                    <input type="email" class="form-control wide-input" placeholder="Email" aria-describedby="email" id="email" name="email">
                    @error('email')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Phone Number</span>
                    <input type="text" class="form-control wide-input" placeholder="Phone Number" aria-describedby="phone" id="phone" name="phone">
                    @error('phone')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Product Name</span>
                    <input type="text" class="form-control wide-input" placeholder="Product Name" aria-describedby="product" id="product" name="product">
                    @error('product')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <span class="input-group-image">Upload Product Image (max 2 MB)</span>
                    <input type="file" class="form-control wide-input fs-6" accept="image/" id="image" name="image">
                    @error('image')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mt-3">
                    <span class="input-group-text">Product Rating</span>
                    <input type="float" class="form-control wide-input" placeholder="Between 2.50 and 99.99" aria-describedby="rating" id="rating" name="rating">
                    @error('rating')
                    <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>