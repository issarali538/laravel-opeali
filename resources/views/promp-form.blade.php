<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body>
   <div class="w-7xl mx-auto h-screen flex px-50  flex-col bg-gray-100 py-3" style="justify-content: center; align-items: center;">
    <div class="mb-4"><h1 class="text-2xl pt-4">Open AI Form</h1></div>
    <form class="block w-full" method="POST" action="{{ route('chat') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        {{-- prompt  --}}
        <div class="mb-4 w-full">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Write Serivce Prompt</label>
            <textarea id="prompt" name="prompt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>

        {{-- logo  --}}
        <div class="mb-4 w-full">
            <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo</label>
            <input id="logo" type="file" name="logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
        </div>

        {{-- image  --}}
        <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" />
        </form>    
   </div>
</body>
</html>