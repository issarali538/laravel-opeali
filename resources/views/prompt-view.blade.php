<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="px-10 py-2 mt-2 bg-white/5 w-7xl mx-auto flex justify-between">
        <div>
            <div class="w-20 h-20 ">
            <img src="{{ $logo }}" alt="Logo" class="w-20 h-20 rounded-full mx-auto mb-4 object-fill">
            </div>
        </div>
        <div class="flex items-center justify-center">
            <button class="border-0 text-sm rounded-sm bg-green-400 py-2 px-3 cursor-pointer" id="printButton">Export To PDF</button>
        </div>
    </div>
    <div class="px-10 py-1 bg-white/5 w-7xl mx-auto" id="print">
        <p class="text-2xl text-center bg-black text-white py-2 mt-2">Service Report</p>
            {{ $message }}
        </p>
    </div>
</body>

<script>
    document.querySelector('#printButton').addEventListener('click', function () {
        const printContent = document.getElementById('print').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    });
</script>