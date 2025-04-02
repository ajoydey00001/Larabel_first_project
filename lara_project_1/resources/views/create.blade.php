<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <style type="text/tailwindcss">
        @layer utilities{
            .container{
                @apply px-10 mx-auto;
            }
        }
    </style>
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500" style="text-align: left;">Create</h2>
        <a href = "/" class = "bg-green-600 text-white">Back to home</a>
        </div>
   </div>

    <div>
        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-5">
                <label for="">Name</label>
                <input type="text" class="border-2 border-gray-300 rounded-md p-2" placeholder="Enter your name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-red-500 text-sm">
                   <p class="text-red-500"> {{ $message }}</p>
                </div>
                @enderror
                <label for="">Description</label>
                <input type="text" class="border-2 border-gray-300 rounded-md p-2" placeholder="Enter your description" name="description" value="{{ old('description') }}">
                @error('description')
                <div class="text-red-500 text-sm">
                   <p class="text-red-500"> {{ $message }}</p>  
                </div>
                @enderror
                <label for="">Image</label>
                <input type="file" name="image" class="border-2 border-gray-300 rounded-md p-2">
                @error('image')
                <div class="text-red-500 text-sm">
                   <p class="text-red-500"> {{ $message }}</p>
                </div>
                @enderror
                <div>
                    <input type="submit" value="Submit" class="bg-blue-500 text-white p-2 rounded-md">
                </div>
            </div>
        </form>

    </div>
    

</body>
</html>