<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="p-3">
   <div class="w-7xl mx-auto h-screen flex px-50  flex-col bg-gray-100 py-3 rounded-sm border-1 border-blue-300" style="justify-content: center; align-items: center;">
    <div style="display: flex; justify-content: center; align-items: center;">
        <div>
            <img src="https://static-00.iconduck.com/assets.00/openai-icon-2021x2048-4rpe5x7n.png" alt="Logo" class="w-10 h-10 rounded-full mx-auto mb-4 object-fill" />
        </div>
        <div>
            <h1 class="text-3xl pt-4">Open AI Form with <span class="italic">GPT-4o-mini</span></h1>
        </div>
    </div>
    <form class="block w-full" method="POST" action="{{ route('chat') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        {{-- prompt  --}}
        <div class="mb-4 w-full">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Write Serivce Prompt</label>
            <textarea id="prompt" name="prompt" class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-1 border-blue-200" required></textarea>
        </div>

        {{-- logo  --}}
        <div class="mb-4 w-full">
            <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo</label>
            <input id="logo" type="file" name="logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-blue-200" required />
        </div>

        {{-- image  --}}
        <div class="w-full">
        <input type="submit" value="Generate" class="bg-blue-500 hover:bg-blue-500 text-white  py-2 px-4 rounded focus:outline-none focus:shadow-outline block w-full" />
        </div>
        </form>    
   </div>
</body>
</html>