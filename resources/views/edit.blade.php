<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reviewer</title>
</head>
<body class="bg-pink">
    <h1 class="fixed top-0 left-0 right-0 h-20 bg-pink text-center flex justify-center items-center z-50">Edit Page</h1>
    <div class="container mx-auto mt-20 w-full max-w-4xl">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-pink text-dark rounded shadow-md">
            <form method="POST" action="{{ route('admin.edit', $reviewer->id) }}" class="p-5">
                @csrf
                @method('PUT')

                <div class="text-center font-bold mb-5">
                    Edit Reviewer
                </div>

                <div class="mb-3">
                    <label for="name" class="block mb-2">Name:</label>
                    <input type="text" class="w-full py-2 px-3 border rounded" id="name" name="name" value="{{ old('name', $reviewer->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="block mb-2">Phone number:</label>
                    <input type="text" class="w-full py-2 px-3 border rounded" id="phone" name="phone" value="{{ old('phone', $reviewer->phone) }}" required>
                </div>

                <div class="mb-3">
                    <label for="product" class="block mb-2">Product name:</label>
                    <input type="text" class="w-full py-2 px-3 border rounded" id="product" name="product" value="{{ old('product', $reviewer->product) }}" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="rating" class="block mb-2">Product Rating:</label>
                    <input type="float" class="w-full py-2 px-3 border rounded" id="rating" name="rating" value="{{ old('rating', $reviewer->rating) }}" required>
                </div>

                <!-- You can add more input fields for other columns if needed -->

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
