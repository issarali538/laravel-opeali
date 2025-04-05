<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    @vite('resources/css/app.css')
    
</head>
<body class="p-3 h-full">

    {{-- star  --}}
    <section class="w-3xl p-3 mx-auto border border-cyan-300 mt-3 rounded-sm shadow-sm">
        {{-- heading  --}}
            <div class="text-center mb-3"><h4 class="text-2xl">GPT Prompt</h4></div>
            {{-- form  --}}
        <div>
            <form action="{{ route('chat') }}" method="POST"  enctype="multipart/form-data" id ="prompt-form">
            @csrf
            @method('POST')
                {{-- input  --}}
            <div class="w-full mb-4">
                <label for="prompt" class="block text-gray-700 text-sm font-bold mb-2">Write Service Prompt</label>
                <textarea class="focus:outline-0 block w-full px-2 py-3 rounded-sm shadow-sm shadow-cyan-300" id="prompt" name="prompt" placeholder="prompt goes here..."></textarea> 
            </div>
            
            {{-- file upload  --}}
            <div class="w-full mb-4">
                <label for="prompt" class="block text-gray-700 text-sm font-bold mb-2">Upload Logo</label>
                <input type="file" class="block w-full px-2 py-3 rounded-sm shadow-sm" id="logo" name="logo" name="prompt" placeholder="prompt goes here..." /> 
            </div>

            {{-- submit button  --}}
            <div class="w-full mb-4">
                <input type="submit" value="Generate" class="bg-blue-500 hover:bg-blue-500 text-white  py-2 px-4 rounded focus:outline-none focus:shadow-outline block w-full" />
            </form>

            <div class="my-5 border border-cyan-300"></div>

            {{-- display response  --}}
            @if(session('message'))
            <div class="border border-cyan-300 p-3 rounded-sm">
                <div class="w-full flex justify-between">
                    <div>
                        @if(session('logo_url'))
                        <img src="{{ session('logo_url') }}" alt="Logo" class="w-20 h-20 rounded-full mx-auto mb-4 object-fill">
                        @endif
                    </div>
                    <div class="text-center mb-3 flex items-center justify-center">
                        <h4 class="text-2xl">Response</h4>
                    </div>
                </div>
                <div class="w-full mb-3" contenteditabl="true">
                    {{ Str::of(session('message'))->toHtmlString(); }}                    
                </div>

                {{-- download button  --}}
                <a href="{{ route('pdf', ['promptId' => session('promptId') ? session('promptId') : '' ]) }}" class="shadow-sm shadow-cyan-300 py-2 px-3 rounded-sm">Download File</a>
            </div>
            @endif
        </div>
    </section>
    {{-- end --}}

    {{-- js  --}}
    <script>
        
        // $(document).ready(function(){
        //     $('#prompt-form').on('submit', function(e){
        //         e.preventDefault();
        //         const formData = new FormData(this);
        //         $.ajax({
        //             type: 'POST',
        //             url: '{{ route('chat') }}',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token here
        //             },
        //             data: formData,
        //             contentType: false,
        //             processData: false,
        //             success: function(response){
        //                 console.log(response);
        //                 $('.border').removeClass('hidden');
        //                 $('.border .w-full').html(response.message);
        //             },
        //             error: function(error){
        //                 console.log(error);
        //             }
        //         });
        //     });
        // });
    </script>
</body>
</html>