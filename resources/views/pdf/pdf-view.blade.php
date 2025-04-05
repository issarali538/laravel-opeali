<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full bg-gray-100 p-3">
    <div class="border border-cyan-300 p-3 rounded-sm">
        <div class="w-full flex justify-between">
            <div class="text-center mb-3 flex items-center justify-center">
                <h4 class="text-2xl">Response</h4>
            </div>
        </div>
        <div class="w-full mb-3" contenteditabl="true">
            <p>
                {{ Str::of($content)->toHtmlString(); }}                    
            </p>
        </div>
    </div>
</body>
</html>
